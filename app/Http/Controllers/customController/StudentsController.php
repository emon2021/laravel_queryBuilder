<?php

namespace App\Http\Controllers\customController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    // required auth middleware confirmation
    public function __construct()
    {
        $this->middleware('auth');
    }

    //viewing all students
    public function index()
    {
        $bal['students'] = DB::table('students')->join('classes','students.class_id','classes.id')->orderBy('roll','asc')->paginate(4);
        return view('admin.students.allStudents',$bal);
    }
    public function view()
    {
        $class_name = DB::table('classes')->get();
        return view('admin.students.addStudents',compact('class_name'));
    }
    //data storing
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|max:50',
            'class_id' => 'required',
            'roll' => 'required',
            'registration' => 'required',
            'email' => 'required',
        ]);
        $data = array(
            'student_name' => $request->student_name,
            'class_id' => $request->class_id,
            'roll' => $request->roll,
            'registration' => $request->registration,
            'email' => $request->email,
        );
        DB::table('students')->insert($data);
        return redirect()->back()->with('success','Student added successfully!');
    }

    
}
