<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SON\Http\Controllers\Controller;
use SON\Models\ClassInformation;

class ClassStudentsController extends Controller
{
    public function index(ClassInformation $class_information){
        return view('admin.class_informations.index', compact('class_information'));
    }

    public function criar(Request $request){
        //
    }

    public function excluir($id){
        //
    }
}
