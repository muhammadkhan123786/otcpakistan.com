<?php

namespace App\Http\Controllers\Frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Classes;
use App\Models\Schools;
use App\Models\SchoolsRegisteration;

class StudentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:1');

    }
    public function index()
    {
        $user= \Auth::user();
        $students=Students::query()->where([
            ['student_isdeleted','=',false],
            ['user_id','=',$user->user_id]
        ])->paginate(10);

        return view('dashboard.students.studentIndex',compact('students'));
    }

    public function addStudent()
    {

        $classes = Classes::select('class_id','class_name')->where('class_isdeleted',false)->get();
        $schools = Schools::select('school_id','school_name','school_address')->where('school_isdeleted',false)->get();

        return view('dashboard.students.StudentRegisteration',compact('classes','schools'));

    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'StudentName' => 'required',
            'StudentClass' => 'required',

        ]);
        $user= \Auth::user();
        $student= new Students;

         if($request->StudentSchool=='others')
         {
            //new school
            $school= new Schools;
            $school->school_name= $request->newschoolname;
            $school->school_address = $request->newschooladdress;
            $school->school_isdeleted =false;
            $school->school_isActive = true;
            $school->save();

            $school_register=new SchoolsRegisteration;
            $school_register->school_id= $school->school_id;
            $school_register->user_id = $user->user_id;
            $school_register->school_register_isDeleted=false;
            $school_register->school_register_isActive= true;
            $school_register->save();

            $student->student_name=$request->StudentName;
            $student->class_id=$request->StudentClass;
            $student->school_id=$school->school_id;
            $student->student_isSubcribed=true;
            $student->student_isdeleted=false;
            $student->user_id=$user->user_id;
            $student->save();
         }
         else
         {

            $student->student_name=$request->StudentName;
            $student->class_id=$request->StudentClass;
            $student->school_id=$request->StudentSchool;
            $student->student_isSubcribed=true;
            $student->student_isdeleted=false;
            $student->user_id=$user->user_id;
            $student->save();

         }

         return redirect()->back()->with('message', $student->student_name.' student has been added successfully.');

    }


   public function destroy($id)
   {
            $user = \Auth::user();
            $student = Students::where('user_id',$user->user_id)->findOrFail($id);
            if (!empty($student)) {
                $student->student_isdeleted=true;
                $student->save();
                return response()->json([
                    'flag' => true,
                    'message' => 'The student '.$student->student_name.' has been deleted successfully.'
                        ], 200);


            }
            else {
                return response()->json([
                            'flag' => false,
                            'message' => 'Data Not Found'
                ]);
            }


   }

    public function Edit($id)
    {
        $user = \Auth::user();
        $student = Students::where('user_id',$user->user_id)->findOrFail($id);
        if(empty($student))
        {
           abort('Un-authorized access, please check.');
        }
        $classes = Classes::select('class_id','class_name')->where('class_isdeleted',false)->get();
        $schools = Schools::select('school_id','school_name','school_address')->where('school_isdeleted',false)->get();
        return view('dashboard.students.StudentEdit',compact('classes','schools','student'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'StudentName' => 'required',
            'StudentClass' => 'required',

        ]);
        $user = \Auth::user();
        $student = Students::where('user_id',$user->user_id)->findOrFail($id);
        if($request->StudentSchool=='others')
        {
           //new school
           $school= new Schools;
           $school->school_name= $request->newschoolname;
           $school->school_address = $request->newschooladdress;
           $school->school_isdeleted =false;
           $school->school_isActive = true;
           $school->save();

           $student->student_name=$request->StudentName;
           $student->class_id=$request->StudentClass;
           $student->school_id=$school->school_id;
           $student->student_isSubcribed=true;
           $student->student_isdeleted=false;
           $student->user_id=$user->user_id;
           $student->save();
        }
        else
        {

           $student->student_name=$request->StudentName;
           $student->class_id=$request->StudentClass;
           $student->school_id=$request->StudentSchool;
           $student->student_isSubcribed=true;
           $student->student_isdeleted=false;
           $student->user_id=$user->user_id;
           $student->save();

        }

        return redirect()->route('student.index')->with('message', $student->student_name.' student has been updated successfully.');




    }

}
