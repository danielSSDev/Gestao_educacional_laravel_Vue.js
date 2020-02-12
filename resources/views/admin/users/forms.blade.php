    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="username" class="form-control" name="name" value="{{ isset($user['name']) ? $user['name'] : '' }}" placeholder="Nome">
    </div>

     <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email" value="{{ isset($user['email']) ? $user['email'] : '' }}" placeholder="E-mail">
     </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Tipo de Usuário</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="{{ \SON\Models\User::ROLE_ADMIN }}">Administrador</option>
            <option value="{{ \SON\Models\User::ROLE_TEACHER }}">Professor</option>
            <option value="{{ \SON\Models\User::ROLE_STUDENT }}">Aluno</option>
        </select>
    </div>

    <div class="form-group form-check">
        <input type="checkbox" name="send_mail" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Enviar e-mail de boas-vindas</label>
    </div>

  {{-- <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" placeholder="Senha">
  </div> --}}
