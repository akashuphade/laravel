<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all students
        $students = Student::get();
        return response()->json($students);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'class' => 'required'
        ]);

        if ($validator->fails()) {
            return ['response'=>$validator->messages(), 'success'=>false];
        }

        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->class = $request->input('class');
        $student->save();
        return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'class' => 'required'
        ]);

        if ($validator->fails()) {
            return ['response'=>$validator->messages(), 'success'=>false];
        }

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->class = $request->input('class');
        $student->save();
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the specified student record
        $student = Student::find($id);
        $student->delete();

        return ['response'=>'student record deleted', 'success'=>true];
    }
}
