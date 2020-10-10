@extends('layouts.app')

@section('content')
<div class="body1">
    <div class="imagemFluxo">
        <img src="/img/routeBar-confirmation.png">
    </div>
    <a class="title10">Assinatura Realizada!</a>
    <div class="subscriptionFields">
        @if ($charge_code != null)
        <p>Código de barras:</p>
            <p>{{ $charge_code }}</p>
            <div class="downloadBoleto">
                <a href="{{ route('charge.create') }}">Download Boleto</a>
            </div>
        @endif
    <a href="{{ route('home') }}" class="retornarHome">Me leve à pagina príncipal</a>
</div>
@endsection