@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $("#cep").mask("00000-000");
</script>

<div class="body1">
    <a class="title10">Novo Endereço</a>

        <form class="addressForm" method="POST" action="{{ route('address.store') }}">
            @csrf
            <input required type="text" name="client_id" id="client_id" value="{{ Auth::user()->id }}" hidden>
            <input required type="text" name="street" id="street" placeholder="Rua">
            <input required type="text" name="street_number" id="street_number" placeholder="Número">
            <input type="text" name="complement" id="complement" placeholder="Complemento">
            <input required type="text" name="neighborhood" id="neighborhood" placeholder="Bairro">
            <input required type="text" name="cep" id="cep" placeholder="CEP">
            <input required type="text" name="city" id="city" placeholder="Cidade">
            <input required type="text" name="state" id="state" placeholder="Estado">
            <input required type="text" name="country" id="country" placeholder="País">

            <input type="submit" class="atualizarEndereco" value="Cadastrar Endereço">
        </form>

        @if (session('back_url'))
        <form>
            <div class="navegacao">
                <input type=submit class="voltarEditarEndereco" value="Voltar"
            formaction="{{ session('back_url') }}">
            </div>
        </form>

        @else 
        <form>
            <div class="navegacao">
                <input type=submit class="voltarEditarEndereco" value="Voltar"
            formaction="{{ route('address.index') }}">
            </div>
        </form>
    @endif


    

    <img class="generic-background" src="/img/generic-background.png">
</div>
@endsection