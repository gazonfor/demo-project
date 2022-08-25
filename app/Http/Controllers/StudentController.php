<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    public function create(){
        $students = Student::all();
        return view('student',['students'=>$students,'layout'=>'create']);
    }

    public function store(Request $request){
        $student = new Student();
        $student->regno=$request->input('regno');
        $student->first_name=$request->input('first_name');
        $student->last_name=$request->input('last_name');
        $student->age=$request->input('age');
        $student->father_name=$request->input('father_name');
        $student->speciality=$request->input('speciality');
        $student->save();
        return redirect('/');
        
    }

    public function show($id){
        $student= Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'show']);
    }

    public function edit($id){
        $student= Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'edit']);
    }

    public function update(Request $request,$id){
        $student= Student::find($id);
        $student->regno=$request->input('regno');
        $student->first_name=$request->input('first_name');
        $student->last_name=$request->input('last_name');
        $student->age=$request->input('age');
        $student->father_name=$request->input('father_name');
        $student->speciality=$request->input('speciality');
        $student->save();
        return redirect('/');
        
    }

    public function delete($id){
        $student= Student::find($id);
        $student-> delete();
        return redirect('/');
    }
}
