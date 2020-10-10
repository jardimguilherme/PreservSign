@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $("#cep").mask("00000-000");
</script>


<div class="body1">
    <a class="title10">Editar Endereço</a>

    @foreach ($addresses as $address)

    <form class="addressForm" method="POST" action="{{ route('address.update')}}">
        @csrf
        <input type="text" name="address_id" id="address_id" value="{{ $address->address_id }}" hidden>
        <input type="text" name="street" id="street" value="{{ $address->street }}">
        <input type="text" name="street_number" id="street_number" value="{{ $address->street_number }}">
        <input type="text" name="complement" id="complement" value="{{ $address->complement }}">
        <input type="text" name="neighborhood" id="neighborhood" value="{{ $address->neighborhood }}">
        <input type="text" name="cep" id="cep" value="{{ $address->cep }}">
        <input type="text" name="city" id="city" value="{{ $address->city }}">
        <input type="text" name="state" id="state" value="{{ $address->state }}">
        <input type="text" name="country" id="country" value="{{ $address->country }}">
        <input type="submit" class="atualizarEndereco" value="Atualizar Endereço">
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
    @endforeach

</div>
@endsection
