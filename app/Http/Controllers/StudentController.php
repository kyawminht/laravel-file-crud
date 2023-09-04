<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $students=DB::table('students')->get();
        $students=Student::all();
        return view('student.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('student.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:students',
            'age'=>'required|integer|min:0|max:150',
            'image'=>'required',
        ]);
//        $students= DB::table('students')->insert([
//             'name'=>$request->name,
//             'email'=>$request->email,
//             'age'=>$request->age,
//
//         ]);
        //handle the upload and save to storage
        if ($request->hasFile('image')){
            $image_path=$request->file('image')->store('images','public');
        }
        $students=new Student();
        $students->name=$request->name;
        $students->email=$request->email;
        $students->age=$request->age;
        $students->image=$image_path;
        $students->save();

         return to_route('student.index')->with('success','New student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        $student=DB::table('students')->find($id);
        $student=Student::find($id);
        return view('student.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        $student=DB::table('students')->find($id);
        $student=Student::find($id);
        return view('student.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:students',
            'age'=>'required|integer|min:0|max:150',
            'image'=>'required',
        ]);
//        DB::table('students')->where('id',$id)->update([
//            'name'=>$request->name,
//            'email'=>$request->email,
//            'age'=>$request->age,
//        ]);

        $students=Student::find($id);
        //handle the upload and save to storage
        if ($request->hasFile('image')){
            //delete old image
            Storage::disk('public')->delete($students->image);
            //store new image and save its path
            $image_path=$request->file('image')->store('images','public');

        }
        $students->name=$request->name;
        $students->email=$request->email;
        $students->age=$request->age;
        $students->image=$image_path;
        $students->save();

        return to_route('student.index')->with('success','update student successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        DB::table('students')->where('id',$id)->delete();
        $student=Student::find($id);
        //delete image
        Storage::disk('public')->delete($student->image);
        $student->delete();
        return to_route('student.index')->with('success','delete student successfully');
    }
}
