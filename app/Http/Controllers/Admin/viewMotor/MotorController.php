<?php

namespace App\Http\Controllers\Admin\viewMotor;

use App\Models\Motor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.create-motor.view', [
            'title' => 'motor-data',
            'motor' => Motor::latest()->filter(request(['search']))->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-motor.create', [
            'title' => 'motor-create',
            'motor' => Motor::all()
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

        // $validatedata= $request->validate([

        //     "name" => "required|alpha_dash",
        //     "merk" => "required|alpha_dash",
        //     "year" => "required|min:4",
        //     "image" => "required",
        //     "transmition" => "required|alpha_dash",
        //     "engine" => "required|min:4",
        //     "fuel" => "required|alpha_dash",
        //     "helm" => "required|alpha_dash|min:2",
        //     "coat" => "required|alpha_dash|min:2",
        //     "price" => "required|alpha_dash"
        // ]);

        // $name = $validatedata['name'];
        // $merk = $validatedata['merk'];
        // $year = $validatedata['year'];
        // $image = $validatedata['image'];
        // $transmition = $validatedata['transmition'];
        // $engine = $validatedata['engine'];
        // $fuel = $validatedata['fuel'];
        // $helm = $validatedata['helm'];
        // $coat = $validatedata['coat'];
        // $price = $validatedata['price'];

        if ($request->file('image')) {
            $image = $request->file('image')->store('post-images');
        }

        Motor::create([
            'name' => $request->name,
            'merk' => $request->merk,
            'year' => $request->year,
            'transmition' => $request->transmition,
            'engine' => $request->engine,
            'fuel' => $request->fuel,
            'helm' => $request->helm,
            'coat' => $request->coat,
            'stok' => $request->stok,
            'price' => $request->price,
            'image' => $image

        ]);

        return redirect('/admin/motor/create')->with('status', 'Input data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function edit(Motor $motor)
    {
        return view('admin.create-motor.edit', [
            'title' => 'motor-edit',
            'motor' => $motor,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Motor $motor)
    {
        $rules = [
            "name" => "required",
            "merk" => "required",
            "year" => "required",
            "transmition" => "required",
            "engine" => "required",
            "stok" => "required",
            "price" => "required",
            "image" => "image|file|max:1024",
        ];

        // if($request->username != $motor->username){
        //     $rules['username'] = 'required|alpha_dash|unique:users';
        // }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Motor::where('id', $motor->id)
            ->update($validateData);

        return redirect('/admin/motor')->with('update', 'Update Data Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor)
    {
        if ($motor->image) {
            Storage::delete($motor->image);
        }
        Motor::destroy($motor->id);
        return redirect('/admin/motor')->with('delete', 'Delete data success!');
    }
}
