<div class="row">
    <div class="col">
        <label for="formGroupExampleInput">Data Inicio</label>
        <input type="date" name="date_start" value="{{ isset($data['date_start']) ? $data['date_start']->format('Y-m-d') : '' }}" class="form-control">
    </div>
    <div class="col">
        <label for="formGroupExampleInput">Data Fim</label>
        <input type="date" name="date_end" value="{{ isset($data['date_end']) ? $data['date_end']->format('Y-m-d') : '' }}" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="formGroupExampleInput">Ciclo</label>
        <input type="text" name="cycle" value="{{ isset($data['cycle']) ? $data['cycle'] : '' }}" class="form-control">
    </div>
    <div class="col">
        <label for="formGroupExampleInput">Sub-divisão</label>
        <input type="text" name="subdivision"  value="{{ isset($data['subdivision']) ? $data['subdivision'] : '' }}" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="formGroupExampleInput">Semestre</label>
        <input type="text" name="semester" value="{{ isset($data['semester']) ? $data['semester'] : '' }}" class="form-control">
    </div>
    <div class="col">
        <label for="formGroupExampleInput">Ano</label>
        <input type="text" name="year" value="{{ isset($data['year']) ? $data['year'] : '' }}"  class="form-control">
    </div>
</div>
