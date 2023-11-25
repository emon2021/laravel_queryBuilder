<?php

namespace App\Http\Controllers\customController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
   //auth check middleware require
   public function __construct()
   {
       $this->middleware('auth');
   }
   //index
   public function index()
   {
        $classes = DB::table('classes')->get();
        return view('admin.classes.allClass',compact('classes'));
   }
   //add class form showing
   public function addClass()
   {
        return view('admin.classes.addClasses');
   }
//____class insertion
   public function store(Request $request)
   {
        $request->validate([
            'class_name' => 'required|max:100',

        ]);
        $classes = DB::table('classes')->get();
        foreach($classes as $row){
            if($row->class_name === $request->class_name){
                return redirect()->back()->with('exist','This name is already exist!');
            }
        }
        $data = array(
            'class_name' => $request->class_name,
        );
        DB::table('classes')->insert($data);
        return redirect()->back()->with('success','Class added successfully!');
   }
   //class edit and update
   public function edit($id)
   {
        
        $class = DB::table('classes')->where('id',$id)->get();
       return view('admin.classes.editClasses',compact('class'));
   }
   
   public function update(Request $request,$id)
   {
        
        $request->validate([
            'class_name'=>'required|max:20',
        ]);
        $data = array(
            'class_name'=>$request->class_name,
        );
        DB::table('classes')->where('id',$id)->update($data);
       return redirect()->route('all.class')->with('success','Class updated successfully!');
   }
//delete classes
   public function delete(Request $request)
   {
        DB::table('classes')->where('id',$request->hidden_id)->delete();
        return redirect()->back()->with('dlt_success','Class deleted successfully!');
   }

}
