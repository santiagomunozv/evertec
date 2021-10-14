@extends("layouts.principal")
@section('nombreModulo')
    @if (isset($pedido->id))
        Resumen pedido: {{$pedido->code}}
    @else
        Pedido
    @endif
@stop
@section('scripts')
    {{ Html::script('modules/transacciones/js/pedidoForm.js') }}
@endsection
@section('contenido')
    @if (isset($pedido->id))
        {!! Form::model($pedido, ['route' => ['pedido.update', $pedido->id], 'method' => 'PUT', 'id' => 'form-pedido', 'onsubmit' => 'return false;']) !!}
    @else
        {!! Form::model($pedido, ['route' => ['pedido.store', $pedido->id], 'method' => 'POST', 'id' => 'form-pedido', 'onsubmit' => 'return false;']) !!}
    @endif
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

            {!! Form::hidden('id', null, ['id' => 'id']) !!}
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        {!! Form::label('date', 'Fecha', ['class' => 'control-label']) !!}
                        {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Fecha', 'readonly']) !!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        {!! Form::label('code', 'Código', ['class' => 'control-label']) !!}
                        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('product_id', 'Producto', ['class' => 'control-label required']) !!}
                        {!! Form::select('product_id', $productos, null, ['class' => 'form-control chosen-select', 'placeholder' => 'Selecciona el producto', 'onchange' => 'searchPriceProduct(this.value)']) !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('price', 'Precio', ['class' => 'control-label required']) !!}
                        {!! Form::text('price', null, ['id' => 'price', 'class' => 'form-control', 'placeholder' => '0', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('document_type', 'Tipo de documento', ['class' => 'control-label required']) !!}
                        {!! Form::select('document_type', ['CC' => 'Cédula de ciudadanía', 'CE' => 'Cedula extranjería', 'NIT' => 'NIT'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un tipo de documento']) !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('document_number', 'Número de documento', ['class' => 'control-label required']) !!}
                        {!! Form::number('document_number', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu número de documento']) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('customer_name', 'Nombre(s)', ['class' => 'control-label required']) !!}
                        {!! Form::text('customer_name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu nombre']) !!}
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('customer_last_name', 'Apellidos', ['class' => 'control-label required']) !!}
                        {!! Form::text('customer_last_name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu apellido']) !!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        {!! Form::label('customer_email', 'Correo', ['class' => 'control-label required']) !!}
                        {!! Form::email('customer_email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu correo electrónico']) !!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        {!! Form::label('customer_mobile', 'Teléfono', ['class' => 'control-label required']) !!}
                        {!! Form::number('customer_mobile', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu número']) !!}
                    </div>
                </div>
            </div>

            @if (isset($pedido->id))
                {!! Form::button('Pagar', ['type' => 'button', 'class' => 'btn btn-primary', 'onclick' => 'pagar()']) !!}
                {!! Form::button('Cancelar pedido', ['type' => 'button', 'class' => 'btn btn-secondary', 'onclick' => 'cancelOrder()']) !!}
            @else
                {!! Form::button('Comprar', ['type' => 'button', 'class' => 'btn btn-info', 'onclick' => 'comprar()']) !!}
                {!! Form::button('Cancelar', ['type' => 'button', 'class' => 'btn btn-secondary', 'onclick' => 'clearForm("form-pedido")']) !!}
            @endif
            {!! Form::close() !!}
        </div>
    </div>
@endsection
