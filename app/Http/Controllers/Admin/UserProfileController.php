<?php

namespace SON\Http\Controllers\Admin;

use SON\Models\User;
use Illuminate\Http\Request;
use SON\Http\Controllers\Controller;
use SON\Models\UserProfile;

class UserProfileController extends Controller
{
    public function edit(User $user){
        return view('admin.users.profile.edit', compact('user'));
    }

    public function update(Request $request ,User $user){
        try{
            $dados = $user->all();
            $data = $request->all();

            $dada['user_id'] = $user->id;

            ($user->profile == null)?
                $user->profile()->create($data):
                $user->profile()->update([
                    'address'       => $data['address'],
                    'cep'           => $data['cep'],
                    'number'        => $data['number'],
                    'complement'    => $data['complement'],
                    'city'          => $data['city'],
                    'neighborhood'  => $data['neighborhood'],
                    'state'         => $data['state']
                ]);

            \Session::flash('mensagem',['msg'=>'Usuario atualizado com Sucesso!','class'=>'alert-success']);

            return view('admin.users.index', compact( 'dados'));
        }catch(\Exception $e){
            \Session::flash('mensagem',['msg'=>'Erro ao atualizar cadastro de usuario!','class'=>'alert-danger']);
            return view('admin.users.profile.edit', compact('user'));
        }

    }
}
