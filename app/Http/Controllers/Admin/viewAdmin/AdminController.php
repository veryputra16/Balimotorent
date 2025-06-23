<?php

namespace App\Http\Controllers\Admin\viewAdmin;

use App\Models\Admin;
use App\Models\Education;
use App\Models\Information;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\AsEncryptedCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.create-admin.view', [
            'title' => 'admin-data',
            'admin' => Admin::all(),
            'skill' => Skill::all(),
            'information' => Information::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-admin.create', [
            'title' => 'admin-create',
            'admins' => Admin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->file('image')) {
            $image = $request->file('image')->store('admin-images');
        }
        $data = $request->all();
        
        Admin::create([
            'name' => $request->name,
            'username' => $request -> username,
            'password'=> $request -> password,
            'status' => $request -> status,
            'country' => $request -> country,
            'information_id' => $request -> information_id,
            'skill_id' => $request -> skill_id,
            'education_id' => $request -> education_id,
            'image' => $image
        ]);

        // $admin = new Admin;
        // $admin->name = $data['name'];
        // $admin->username = $data['username'];
        // $admin->password = $data['password'];
        // $admin->status = $data['status'];
        // $admin->country = $data['country'];
        // $admin->image = $image;
        // $admin->save();

        // $information = new Information;
        // $information->address = $data['address'];
        // $information->telpon = $data['telpon'];
        // $information->email = $data['email'];
        // $information->instagram = $data['instagram'];
        // $information->birthday = $data['birthday'];
        // $information->gender = $data['gender'];
        // $information->save();


        // $education = new Education;
        // $education->admin_id = $admin->id;
        // $education->education = $data['education'];
        // $education->save();

       


        return redirect('/admin/admin/create')->with('status', 'Input data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Admin $admin)
    {
        // if (!empty($request->input('skill'))) {
        //     $will_insert = [];
        //     foreach ($skills = $request->input('skill') as $key => $value) {
        //         array_push($will_insert, ['skill' => $value]);
        //     }
        // }

        $data = $request->all();

        $rules = [
            "information_id" => "required",
        ];

        if ($admin->information_id == '') {
            foreach ($request->skill as $key => $skill) {
                $insert = [
                    'admin_id' => $request->admin_id,
                    'skill' => $request->skill[$key]
                ];
                DB::table('skills')->insert($insert);
            }

            foreach ($request->education as $keys => $education) {
                $insert = [
                    'admin_id' => $request->admin_id,
                    'education' => $request->education[$keys]
                ];
                DB::table('education')->insert($insert);
            }

            $information = new Information;
            $information->address = $data['address'];
            $information->telpon = $data['telpon'];
            $information->email = $data['email'];
            $information->instagram = $data['instagram'];
            $information->birthday = $data['birthday'];
            $information->gender = $data['gender'];
            $information->save();
        } else {
            Information::where('id', $request->id_information)->update([
                "address" => $data['address'],
                "telpon" => $data['telpon'],
                "email" => $data['email'],
                "instagram" => $data['instagram'],
                "birthday" => $data['birthday'],
                "gender" => $data['gender'],
            ]);
        }


        $update = $request->validate($rules);

        Admin::where('id', $admin->id)
            ->update($update);

        return redirect('/admin/admin')->with('status', 'Update Data Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, Education $education, Skill $skill, Information $information)
    {
        if ($admin->image) {
            Storage::delete($admin->image);
        }
        // Information::destroy($information->id);
        // Education::destroy($education->admin_id);
        // Skill::destroy($skill->admin_id);
        Admin::destroy($admin->id);
        return redirect('/admin/admin')->with('delete', 'Delete data success!');
    }
}
