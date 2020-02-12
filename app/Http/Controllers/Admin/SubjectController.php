<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SON\Http\Controllers\Controller;
use SON\Models\Subjects;

class SubjectController extends Controller
{
    public function index(){
        $dados = Subjects::all();

        $users = DB::table('Subjects')->paginate(10);

        return view('admin.subjects.index',['dados' => $users], compact('dados'));
    }

    public function create(){
        return view('admin.subjects.create');
    }

    public function salvar(Request $request){
        try{
            $data = $request->all();

            Subjects::create($data);
            \Session::flash('mensagem',['msg'=>'Disciplina salva com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.disciplina.index');

        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao salvar disciplina.!','class'=>'alert-danger']);
            return redirect()->route('admin.disciplina.index');
        }
    }

    public function editar($id){
        $dados = Subjects::find($id);

        return view('admin.subjects.edit', compact('dados'));
    }

    public function atualizar(Request $request,$id){
        try{
            $data = $request->all();
            $model = Subjects::find($id);

            $model['name'] = $data['name'];

            $model->save($data);
            \Session::flash('mensagem',['msg'=>'Disciplina atualizada com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.disciplina.index');

        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao atualizar disciplina!','class'=>'alert-danger']);
            return redirect()->route('admin.disciplina.index');
        }
    }

    public function verDisciplina($id){
        $data = Subjects::find($id);

        return view('admin.subjects.show_detals', compact('data'));
    }

    public function excluir($id){
        try{
            $data = Subjects::find($id);
            $data->delete();

            \Session::flash('mensagem',['msg'=>'Disciplina excluida com Sucesso!','class'=>'alert-success']);
            return redirect()->route('admin.disciplina.index');
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao excluir disciplina!','class'=>'alert-danger']);
            return redirect()->route('admin.disciplina.index');
        }
    }
}
