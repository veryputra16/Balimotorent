<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use App\Mail\LoanEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login', [
            'title' => 'Login',
            'slug' => 'login-page'
        ]);
    }

    public function register(){
        return view('login', [
            'title' => 'Register',
            'slug' => 'register-page'
        ]);
    }

    public function register_post(Request $request){
        
        $validateData = $request->validate([
            
            "username" => "required|alpha_dash|unique:users",
            "password" => "required|alpha_num|min:8",
            "email" => "required|unique:users|email:dns"
        ]);
        
        $validateData['password'] = Hash::make($validateData['password']);

        $username = $validateData['username'];
        $password = $validateData['password'];
        $email = $validateData['email'];

        User::create([
            'name' => '',
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'tgl_lahir' => '',
            'j_kelamin' => '',
            'telpon' => '',
            'image' => ''
        ]);
        $request->session()->flash('success', 'Register successfuly!');

        return redirect('/signup');
        
    }

    // Block dari sini

    // public function authenticate(Request $request){
        
    //     $user = $request->validate([
    //         "usernameLogin" => "required",
    //         "passwordLogin" => "required"
    //     ]);

    //     $remember = $request['remember'];

    //     $credentials = [
    //         "username" => $user['usernameLogin'],
    //         "password" => $user['passwordLogin']
    //     ];
    //         $user_id = User::query()->selectRaw('id, email')->where('username', $credentials['username'])->get();
    //         $user_loan = Loan::where('user_id',$user_id[0]->id)->get();
    //         $date_now = Carbon::now()->setTimezone('Asia/Ujung_Pandang')->format('Y-m-d');
    //         $return_date = "";

    //     if(Auth::attempt($credentials, $remember)){

    //         foreach($user_loan as $loan){
    //             $return_date = $loan->return_date;
    //             if($date_now >= $return_date){    
    //                 $data = [
    //                     'title' => 'Pengembalian Sepeda Motor',
    //                     'body' => 'Hello Galkarent User, your loan is in the process of returning, please visit our website again, for the motorcycle return process, it can be returned quickly'
    //                 ];
    //                 Mail::to($user_id[0]->email)->send(new LoanEmail($data));
    //                 $request->session()->regenerate();
    //                 return redirect()->intended('/user/'.$credentials["username"].'/dashboard')->with('graceLoan', 'Rented Time Is Ended')->withCookie('remember', $remember);
    //             } else{
    //                 $request->session()->regenerate();
    //                 return redirect()->intended('/')->withCookie('remember', $remember);
    //             }
    //         }

    //     }

    //     return back()->with('errorLogin', 'Login Failed!');
        
    // }

    public function authenticate(Request $request){
        $user = $request->validate([
            "usernameLogin" => "required",
            "passwordLogin" => "required"
        ]);
    
        $remember = $request['remember'];
    
        $credentials = [
            "username" => $user['usernameLogin'],
            "password" => $user['passwordLogin']
        ];
    
        // Coba login sebagai user
        if(Auth::attempt($credentials, $remember)){
            return $this->handleUserLogin($request, $credentials);
        }
    
        // Jika tidak ditemukan di users, coba di tabel admins
        $admin = \App\Models\Admin::where('username', $credentials['username'])->first();
    
        if($admin && Hash::check($credentials['password'], $admin->password)){
            Auth::guard('admin')->login($admin, $remember);
            return redirect()->intended('/admin/home')->withCookie('remember', $remember);
        }
    
        return back()->with('errorLogin', 'Login Failed!');
    }
    
    /**
     * Handle user login logic after successful authentication.
     */
    private function handleUserLogin($request, $credentials) {
        $user = User::where('username', $credentials['username'])->first();
        $user_loans = Loan::where('user_id', $user->id)->get();
        $date_now = Carbon::now()->setTimezone('Asia/Ujung_Pandang')->format('Y-m-d');
    
        foreach ($user_loans as $loan) {
            if ($date_now >= $loan->return_date) {    
                $data = [
                    'title' => 'Pengembalian Sepeda Motor',
                    'body' => 'Hello Galkarent User, your loan is in the process of returning, please visit our website again, for the motorcycle return process, it can be returned quickly'
                ];
                Mail::to($user->email)->send(new LoanEmail($data));
                $request->session()->regenerate();
                return redirect()->intended('/user/'.$credentials["username"].'/dashboard')
                    ->with('graceLoan', 'Rented Time Is Ended')
                    ->withCookie('remember', $request['remember']);
            }
        }
    
        $request->session()->regenerate();
        return redirect()->intended('/')->withCookie('remember', $request['remember']);
    }
    

}
