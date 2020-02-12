<div class="form-group">
    <label for="exampleInput">Endereço</label>
    <input type="text" class="form-control" name="address" value="{{ isset($user->profile['address']) ? $user->profile['address'] : '' }}" placeholder="Endereço">
</div>

<div class="form-group">
    <label for="exampleInput">CEP</label>
    <input type="text" class="form-control" name="cep" maxlength="8" value="{{ isset($user->profile['cep']) ? $user->profile['cep'] : '' }}" placeholder="CEP">
</div>

<div class="form-group">
    <label for="exampleInput">Número</label>
    <input type="text" class="form-control" name="number" value="{{ isset($user->profile['number']) ? $user->profile['number'] : '' }}" placeholder="Numero">
</div>

<div class="form-group">
    <label for="exampleInput">Complemento</label>
    <input type="text" class="form-control" name="complement" value="{{ isset($user->profile['complement']) ? $user->profile['complement'] : '' }}" placeholder="Complemento">
</div>

<div class="form-group">
    <label for="exampleInput">Cidade</label>
    <input type="text" class="form-control" name="city" value="{{ isset($user->profile['city']) ? $user->profile['city'] : '' }}" placeholder="Cidade">
</div>

<div class="form-group">
    <label for="exampleInput">Bairro</label>
    <input type="text" class="form-control" name="neighborhood" value="{{ isset($user->profile['neighborhood']) ? $user->profile['neighborhood'] : '' }}" placeholder="Bairro">
</div>

<div class="form-group">
    <label for="exampleInput">Estado</label>
    <input type="text" class="form-control" name="state" value="{{ isset($user->profile['state']) ? $user->profile['state'] : '' }}" maxlength="2" placeholder="Estado">
</div>
