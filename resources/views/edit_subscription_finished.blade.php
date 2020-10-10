@extends('layouts.app')

@section('content')
<div class="body1">

    <a class="title10">Pagamento Alterado!</a>
    <div class="subscriptionFields">
        @if (isset($charge_code))
        <p>Código de barras:</p>
        <p>{{ $charge_code }}</p>
        <div class="downloadBoleto">
            <a href="{{ route('charge.create') }}">Download Boleto</a>
        </div>
        @endif
    </div>

    <form method="GET">
        @csrf
        <input type=submit class="voltarBoleto" value="Voltar para assinaturas" formaction="{{ route('subscription.index') }}">
    </form>
</div>
@endsection