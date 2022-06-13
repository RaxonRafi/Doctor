<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use Intervention\Image\ImageManagerStatic as Image;


class DoctorController extends Controller
{
    public function index(){

    return view('index');
    }
    public function store(Request $request){

        $request->validate([
            'name' =>  'required',
            'phone' => 'required|digits:11',
            'email' => 'required|indisposable',
            'picture' => 'required',
        ]);

             $new_name = Str::random(4)."". $request->file('picture')->getClientOriginalExtension();
             $save_link = base_path("public/uploads/photo/").$new_name;
             Image::make($request->file('picture'))->resize(300,300)->save($save_link);


               doctor::insert([
                'name'=> $request->name,
                'phone'=> $request->phone,
                'email'=> $request->email,
                'picture'=> $new_name,

                ]);
        return back()->with('success','Registration Complete!');


    }

  public function table(){
      $lists = doctor::all();
      return view('registationlist', compact('lists'));
  }

  public function doctordelete($doctor_id){

     doctor::find($doctor_id)->delete();
     return back()->with('delete','doctor info deleted successfully');
  }
  public function doctoredit($doctor_id){

     return view('update',[
        'doctor_info'=> doctor::find($doctor_id)
     ]);

  }
  public function doctorinfoupdate(Request $request,$doctor_id){

         doctor::find($doctor_id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,

        ]);
        if($request->hasFile('picture')){

            $new_name = Str::random(4) . "" . $request->file('picture')->getClientOriginalExtension();
            $save_link = base_path("public/uploads/photo/") . $new_name;
            Image::make($request->file('picture'))->resize(300, 300)->save($save_link);

            doctor::find($doctor_id)->update([
                'picture' => $new_name

            ]);

        }


        return back()->with('success', 'info Updated successfully!');


  }
}
