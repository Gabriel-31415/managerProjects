<form method="GET" action={{ route($rota) }}>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2 ">
            <div class="grid grid-cols-3 gap-4">
                <div class="">
                    <input type="checkbox" name="nome_check" id="nome_check_input" onclick="mostrarFiltro(this, 'nome_check')" @if($request->nome_check != null && $request->nome_check) checked @endif>
                    <label>By name</label>
                </div>
                <div class="">
                    <input type="checkbox" name="data_check" id="data_check_input" onclick="mostrarFiltro(this, 'data_check')" @if($request->data_check != null && $request->data_check) checked @endif>
                    <label>By date de creation</label>
                </div>
                <div class="">
                    <input type="checkbox" name="mes_check" id="mes_check_input" onclick="mostrarFiltro(this, 'mes_check')" @if($request->mes_check != null && $request->mes_check) checked @endif>
                    <label>By month</label>
                </div>
                <div class="">
                    <input type="checkbox" name="dose_check" id="dose_check_input" onclick="mostrarFiltro(this, 'dose_check')" @if($request->dose_check != null && $request->dose_check) checked @endif>
                    <label>By status</label>
                </div>
                <div class="">
                    <input type="checkbox" name="project_check" id="project_check_input" @if($request->project_check != null && $request->project_check) checked @endif onclick="mostrarFiltro(this, 'project_check')">
                    <label>Project</label>
                </div>
                <div id="nome_check" class="" style="@if($request->nome_check != null && $request->nome_check) display: block; @else display: none; @endif">
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome" @if($request->nome != null) value="{{$request->nome}}" @endif>
                </div>
                <div id="sus_check" class="" style="@if($request->sus_check != null && $request->sus_check) display: block; @else display: none; @endif">
                    <input type="text" class="form-control sus" name="sus" id="sus" placeholder="Digite o SUS"  @if($request->sus != null) value="{{$request->sus}}" @endif>
                </div>
                <div id="data_check" class="" style="@if($request->data_check != null && $request->data_check) display: block; @else display: none; @endif">
                    <input type="date" class="form-control" name="data" id="data" @if($request->data != null) value="{{$request->data}}" @endif>
                </div>
                <div id="mes_check" class="" style="@if($request->mes_check != null && $request->mes_check) display: block; @else display: none; @endif">
                    <input type="month" class="form-control" name="mes" id="mes" @if($request->mes != null) value="{{$request->mes}}" @endif>
                </div>
                <div id="dose_check" class="" style="@if($request->dose_check != null && $request->dose_check) display: block; @else display: none; @endif">
                    <select id="dose" name="dose" class="form-control">
                        <option value="">-- Status --</option>
                        <option @if($request->status == 'todo') selected @endif value="todo">{{'todo'}}</option>
                        <option @if($request->status == 'doing') selected @endif value="doing">{{'doing'}}</option>
                        <option @if($request->status == 'done') selected @endif value="done">{{'done'}}</option>
                    </select>
                </div>
                <div id="project_check" class="" @if($request->project_check != null && $request->project_check) style="display: block;" @else style="display:none;" @endif>
                    <select id="project" name="project" class="form-control">
                        <option value="">-- Project --</option>
                        @foreach ($projects as $project)
                            <option @if($request->project == $project->id) selected @endif value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <div class="grid grid-rows-2 gap-4">
                <div class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" style="margin-bottom: 5px;">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Filtrar</button>
                </div>
                <div class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    <a href={{ route($rota) }}><button type="button" class="btn btn-secondary" style="width: 100%;">Limpar filtros</button></a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function mostrarFiltro(check, id) {
        if(check.checked) {
            document.getElementById(id).style.display = "block";
        } else {
            document.getElementById(id).style.display = "none";
        }
    }
</script>