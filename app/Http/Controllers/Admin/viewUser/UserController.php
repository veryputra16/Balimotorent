<?php

namespace App\Http\Controllers\Admin\viewUser;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.create-user.view', [
            'title' => 'user-data',
            'user' => User::all()
            // 'user' => User::latest()->filter(request(['search_user']))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.create-user.edit', [
            'user' => $user,
            // 'user' => User::all(),
            'title' => 'user-edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            "name" => "required",
            "tgl_lahir" => "required",
            "j_kelamin" => "required",
            "telpon" => "required",
        ];

        
        if($request->username != $user->username){
            $rules['username'] = 'required|alpha_dash|unique:users';
        }
        
        $validateData = $request->validate($rules);
        
            User::where('id', $user->id)
            -> update($validateData);

        return redirect('/admin/user')->with('status', 'Update Data Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::destroy($request->id);
        return redirect('/admin/user')->with('status', 'Delete data success!');
    }
}
