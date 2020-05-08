<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Board;

class StudentsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::groupBy('class')->selectRaw('count(1) as student_count, class')->get();
        return view('classes')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boards = Board::all();
    
        return view('student/create')->with('boards', $boards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate the information
        $this->validate($request, 
            [
                'fname' => 'required|max:30',
                'mname' => 'max:30',
                'lname' => 'required|max:30',
                'class' => 'required',
                'board' => 'required',
                'bdate' => 'required|date|before_or_equal:today',
                'joiningDate' => 'required|date|before_or_equal:today'
            ]
        );

        $student = new Student();

        $student->firstname = $request->input('fname');
        $student->middlename = $request->input('mname');
        $student->lastname = $request->input('lname');
        $student->class = $request->input('class');
        $student->board_id = $request->input('board');
        $student->birth_date = $request->input('bdate');
        $student->joining_date = $request->input('joiningDate');
        $student->active = 1;

        $student->save();

        return redirect('/home')->with('success', 'Student added successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::where('class', $id)->get();
        $boards = Board::all();
        return view('student/view')->with(['students'=>$students, 'boards'=>$boards]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $boards = Board::all();
        return view('student/edit')->with(['student'=> $student, 'boards' => $boards]);
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
        //validate the information
        $this->validate($request, 
            [
                'fname' => 'required|max:30',
                'mname' => 'max:30',
                'lname' => 'required|max:30',
                'class' => 'required',
                'board' => 'required',
                'bdate' => 'required|date|before_or_equal:today',
                'joiningDate' => 'required|date|before_or_equal:today'
            ]
        );

        $student = Student::find($id);

        $student->firstname = $request->input('fname');
        $student->middlename = $request->input('mname');
        $student->lastname = $request->input('lname');
        $student->class = $request->input('class');
        $student->board_id = $request->input('board');
        $student->birth_date = $request->input('bdate');
        $student->joining_date = $request->input('joiningDate');
        $student->active = 1;

        $student->save();

        return redirect('/home')->with('success', 'Student updated successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the record
        $student = Student::find($id);
        
        //Get the class of the student
        $class = $student->class;

        $student->delete();

        $students = Student::where('class', $class)->get();
        return redirect('/student/view')->with(['students' => $students, 'success'=>'Record deleted successfully!!' ]);
    }
}
