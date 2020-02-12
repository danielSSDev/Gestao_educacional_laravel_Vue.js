<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use SON\Models\User;
use Illuminate\Http\Request;
use SON\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = User::all();

        $users = DB::table('Users')->paginate(10);

        return view('admin.users.index',['dados' => $users] , compact('dados'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        try{
            $data = $request->all();

            $result = User::createFully($data);
            \Session::flash('mensagem',['msg'=>'Usuario salvo com Sucesso!','class'=>'alert-success']);
            $request->session()->flash('user_created', ['id' => $result->id, 'password' => $result->password]);

            return redirect()->route('admin.users.show_details');
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao criar usuario!','class'=>'alert-danger']);
            return redirect()->route('admin.users.index');
        }
    }

    public function showDetails(){
        $userData = session('user_created');
        $user = User::findOrFail($userData['id']);
        $user->password = $userData['password'];
        return view('admin.users.show_details', compact('user'));
    }

    public function show(User $user)
    {
        $dados = $user;
        return view('admin.users.veruser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $id = $user->id;
        $registro = User::find($id);;
        $dados = $request->all();

        $registro->name = $dados['name'];
        $registro->email = $dados['email'];
        $registro->save($dados);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        $dados = $user;
        return view('admin.users.edit', compact('user'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Usuario excluido com Sucesso!','class'=>'alert-success']);

        return redirect()->route('admin.users.index');
    }
}
