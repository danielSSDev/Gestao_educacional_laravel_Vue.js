<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SON\Http\Controllers\Controller;
use SON\Http\Requests\ClassStudentRequest;
use SON\Models\ClassInformation;
use SON\Models\Student;

class ClassStudentsController extends Controller
{
    public function index(Request $request, ClassInformation $class_information){
        if(!$request->ajax()){
            return view('admin.class_informations.index', compact('class_information'));
        }else{
            return $class_information->students()->get();
        }
    }

    public function store(Request $request, ClassInformation $class_information){
        $student = Student::find($request->get('student_id'));

        if(DB::table('class_information_student')->where('student_id', '=', $student->id)){

            return $class_information->students()->find($student);

        }

        $class_information->students()->save($student);
        return $student;
    }

    public function destroy(ClassInformation $class_information, Student $student){
        $class_information->students()->detach([$student->id]);
        return response()->json([], 204);
    }
}
