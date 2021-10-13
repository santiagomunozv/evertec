@extends("layouts.principal")
@section("nombreModulo")
    Productos
@stop
@section("scripts")
    <script type="text/javascript">
        $(function(){
            configurarDataTable("producto-table");
        });
    </script>
@endsection
@section("contenido")
<div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="table-responsive">
            <table id="producto-table" class="table table-hover table-sm asgard-grid">
                <thead class="bg-info text-light">
                    <tr>
                        <th style="width: 150px;" data-orderable="false">
                            @if($permisos["adicionarRolOpcion"])
                            <a class="btn btn-info btn-sm text-light" href="{!!URL::to('/general/producto' , ['create'])!!}">
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
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producto as $productoreg)
                        <tr>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones">
                                    @if($permisos['modificarRolOpcion'])
                                        <a class="btn btn-success btn-sm" href="{!!URL::to('/general/producto' , [$productoreg->id , 'edit'])!!}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td>{{$productoreg->id}}</td>
                            <td>{{$productoreg->code}}</td>
                            <td>{{$productoreg->name}}</td>
                            <td>{{$productoreg->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection