@extends("layouts.principal")
@section('nombreModulo')
    Usuarios
@stop
@section('scripts')
    {{ Html::script('modules/seguridad/js/usuarioForm.js') }}
@endsection
@section('contenido')
    @if (isset($usuario->id))
        {!! Form::model($usuario, ['route' => ['usuario.update', $usuario->id], 'method' => 'PUT', 'id' => 'form-usuario', 'onsubmit' => 'return false;']) !!}
    @else
        {!! Form::model($usuario, ['route' => ['usuario.store', $usuario->id], 'method' => 'POST', 'id' => 'form-usuario', 'onsubmit' => 'return false;']) !!}
    @endif
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

            {!! Form::hidden('id', null, ['id' => 'id']) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('login', 'Nombre de usuario', ['class' => 'control-label required']) !!}
                        {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre de usuario']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña', ['class' => 'control-label required']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingresa una contraseña', 'autocomplete' => 'off']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('role_id', 'Rol', ['class' => 'control-label']) !!}
                        {!! Form::select('role_id', $rol, null, ['class' => 'form-control chosen-select', 'placeholder' => 'Ingresa el estado']) !!}
                    </div>
                </div>
            </div>
            
            @if (isset($usuario->id))
                {!! Form::button('Modificar', ['type' => 'button', 'class' => 'btn btn-primary', 'onclick' => 'grabar()']) !!}
            @else
                {!! Form::button('Adicionar', ['type' => 'button', 'class' => 'btn btn-info', 'onclick' => 'grabar()']) !!}
            @endif
            {!! Form::button('Cancelar', ['type' => 'button', 'class' => 'btn btn-secondary', 'onclick' => 'retornarToGrid("seguridad", "usuario")']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
