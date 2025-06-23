<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\User;
use App\Models\Motor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //

    function index(User $user){

        $user_loan = Loan::where('user_id',auth()->user()->id)->get();
        $date_now = Carbon::now()->setTimezone('Asia/Ujung_Pandang')->format('Y-m-d');
        $return_date = "";

        foreach($user_loan as $loan){
            $return_date = $loan->return_date;
            $date_tommorow = $return_date.strtotime("+1 days").date_default_timezone_set('Asia/Ujung_Pandang');
            if($date_now >= $date_tommorow){    
                Loan::destroy($loan->id);
            }
        }

        $dateNow = Carbon::now()->setTimezone('Asia/Ujung_Pandang')->format('Y-m-d');
        return view('user.dashboard', [
            "title" => "Dashboard",
            "user" => $user,
            "dateNow" => $dateNow,
            "data" => Loan::where("user_id", $user->id)->get(),
            'loanFinish' => Loan::query()->selectRaw('*')->where('user_id', '=', $user->id)->whereRaw('now() > return_date')->get()    
        ]);
    }

    function destroy(Request $request){
        if($request->image) {
            Storage::delete($request->image);
        }
        Loan::destroy($request->id);
        return redirect('/user/'.auth()->user()->username.'/dashboard');
    }
}
