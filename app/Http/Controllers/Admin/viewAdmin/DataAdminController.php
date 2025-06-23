<?php

namespace App\Http\Controllers\Admin\viewAdmin;

use App\Models\Information;
use App\Models\Skill;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        if (!empty($request->input('skill'))) {
            $will_insert = [];
            foreach ($skills = $request->input('skill') as $key => $value) {
                array_push($will_insert, ['skill' => $value]);
            }
            DB::table('skills')->insert($will_insert);
        } else {
            $skills = '';
        }

        $data = $request->all();

        $rules = [
            "information_id" => "required",
            "admin_id" => "required"
        ];

        $skill = new Skill;
        $skill->admin_id = $admin->id;
        $skill->skill = $skills;
        $skill->save();

        $information = new Information;
        $information->address = $data['address'];
        $information->telpon = $data['telpon'];
        $information->email = $data['email'];
        $information->instagram = $data['instagram'];
        $information->birthday = $data['birthday'];
        $information->gender = $data['gender'];
        $information->save();

        $update = $request->validate($rules);

        Admin::where('id', $admin->id)
            ->update($update);


        return redirect('/admin/admin')->with('status', 'Update Data Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        //
    }
}
