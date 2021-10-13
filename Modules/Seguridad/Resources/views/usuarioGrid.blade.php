@extends("layouts.principal")
@section("nombreModulo")
    Usuarios
@stop
@section("scripts")
    <script type="text/javascript">
        $(function(){
            configurarDataTable("usuario-table");
        });
    </script>
@endsection
@section("contenido")
<div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="table-responsive">
            <table id="usuario-table" class="table table-hover table-sm asgard-grid">
                <thead class="bg-info text-light">
                    <tr>
                        <th style="width: 150px;" data-orderable="false">
                            @if($permisos["adicionarRolOpcion"])
                            <a class="btn btn-info btn-sm text-light" href="{!!URL::to('/seguridad/usuario' , ['create'])!!}">
                                <i class="fa fa-plus"></i>
                            </a>
                            @endif
                            <button id="btnLimpiarFiltros" class="btn btn-info btn-sm text-light" >
                                <i class="fas fa-broom"></i>
                            </button>
                            <button id="btnRecargar" class="btn btn-info btn-sm text-light">
                                <i class="fas fa-redo-alt"></i>
                            </button>
                        </th>
                        <th>Id</th>
                        <th>Nombre de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuario as $usuarioreg)
                        <tr class="{{$usuarioreg->active == '0' ? 'text-danger': '' }}">
                            <td>
                                <div class="btn-group" usuarioe="group" aria-label="Acciones">
                                    @if($permisos['modificarRolOpcion'])
                                        <a class="btn btn-success btn-sm" href="{!!URL::to('/seguridad/usuario' , [$usuarioreg->id , 'edit'])!!}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>{{$usuarioreg->id}}</td>
                            <td>{{$usuarioreg->login}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection