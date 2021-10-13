@extends("layouts.principal")
@section('nombreModulo')
    Productos
@stop
@section('scripts')
    {{ Html::script('modules/general/js/productoForm.js') }}
@endsection
@section('contenido')
    @if (isset($producto->id))
        {!! Form::model($producto, ['route' => ['producto.update', $producto->id], 'method' => 'PUT', 'id' => 'form-producto', 'onsubmit' => 'return false;']) !!}
    @else
        {!! Form::model($producto, ['route' => ['producto.store', $producto->id], 'method' => 'POST', 'id' => 'form-producto', 'onsubmit' => 'return false;']) !!}
    @endif
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

            {!! Form::hidden('id', null, ['id' => 'id']) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('code', 'Código', ['class' => 'control-label required']) !!}
                        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el código del producto']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre', ['class' => 'control-label required']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del producto']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('price', 'Precio', ['class' => 'control-label']) !!}
                        {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Ingresa valor del producto']) !!}
                    </div>
                </div>
            </div>
            
            @if (isset($producto->id))
                {!! Form::button('Modificar', ['type' => 'button', 'class' => 'btn btn-primary', 'onclick' => 'grabar()']) !!}
            @else
                {!! Form::button('Adicionar', ['type' => 'button', 'class' => 'btn btn-info', 'onclick' => 'grabar()']) !!}
            @endif
            {!! Form::button('Cancelar', ['type' => 'button', 'class' => 'btn btn-secondary', 'onclick' => 'retornarToGrid("general", "producto")']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
