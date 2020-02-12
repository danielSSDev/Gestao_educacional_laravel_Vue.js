<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SON\Http\Controllers\Controller;
use SON\Models\ClassInformation;

class ClassInformationController extends Controller
{
    public function index(){
        $dados = ClassInformation::all();

//        $users = DB::table('class_information')->paginate(1);

        return view('admin.turma.index',compact('dados'));
    }

    public function create(){
        return view('admin.turma.create');
    }

    public function salvar(Request $request){
        try{
            $data = $request->all();
            ClassInformation::create($data);

            \Session::flash('mensagem',['msg'=>'Turma salva com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.turma.index');
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao salvar turma!','class'=>'alert-danger']);
            return redirect()->route('admin.turma.index');
        }
    }

    public function editar($id){
        $data = ClassInformation::find($id);

        return view('admin.turma.edit', compact('data'));
    }

    public function atualizar(Request $request, $id){
        try{
            $data = $request->all();
            $model = ClassInformation::find($id);

            $model['date_start'] = $data['date_start'];
            $model['date_end'] = $data['date_end'];
            $model['cycle'] = $data['cycle'];
            $model['subdivision'] = $data['subdivision'];
            $model['semester'] = $data['semester'];
            $model['year'] = $data['year'];

            $model->save($data);

            \Session::flash('mensagem',['msg'=>'Turma atualizada com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.turma.index');
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao atualizar turma!','class'=>'alert-danger']);
            return redirect()->route('admin.turma.index');
        }

    }

    public function verTurma($id){
        $data = ClassInformation::find($id);

        return view('admin.turma.show_detals', compact('data'));
    }

    public function excluir($id){
        try{
            $model = ClassInformation::find($id);
            $model->delete();

            \Session::flash('mensagem',['msg'=>'Turma excluida com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.turma.index');
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao excluir turma!','class'=>'alert-danger']);
            return redirect()->route('admin.turma.index');
        }
    }

    public function getValueForHeader(){

    }
}
