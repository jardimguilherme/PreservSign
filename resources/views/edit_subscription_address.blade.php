@extends('layouts.app')

@section('content')
<?php $i = 0;?>
<div class="body1">
    
    <div class="addressFields">
        <a class="title10">Endereço</a>


        {{-- MENSAGEM DE ERRO PARA SELEÇÃO DO MESMO ENDEREÇO --}}

        @if (isset($error)!= null)
            <a>{{ $error }}</a>
        @endif

        {{-- MENSAGEM DE ERRO PARA SELEÇÃO DO MESMO ENDEREÇO --}}

        <div class="enderecosBoxesExample">
            
            
            @foreach ($addresses as $address)
            <div class="boxEnderecoExample">
                <div class="box-endereco-textExample">
                <a><?=strtoupper( $address->street). ", " . strtoupper($address->street_number) ?>
                    @if(isset($address->complement)) <br> {{ strtoupper($address->complement) }} @endif <?="<br>". strtoupper($address->city) . ', ' .  strtoupper($address->state) .  "<br>" .
                    strtoupper($address->country) ."<br>".  strtoupper($address->cep) ?></a>
                </div>
                <div class="actionsSelectAddress">
                    
                    <form action="{{ route('subscription.address.update') }}" onsubmit="confirmation{{ $i }}()" method="POST">
                        @csrf
                        <input hidden name="subscription_id" value="{{ $subscription_id }}">
                        <input hidden name="address_id" value="{{ $address->address_id }}">
                        <input type="submit" class="selecionarEndereco" name="submit" value="Selecionar">
                    </form>               
                </div>
            </div>

            <script>
                function confirmation{{ $i++ }} (){
                    if(confirm('Você tem certeza que deseja alterar seu endereço para {{ $address->street }}?'))
                    return true; 
                    else 
                    event.preventDefault()
                    return false
                }
            </script>


            @endforeach
        </div>
        
        

    </div>
    <form class="plansForm" method="POST" action="{{ route('subscription.edit') }}">
        @csrf
        <div class="navegacao">
            <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
            <input type=submit class="cancelar" value="Cancelar">
        </div>
    </form>
</div>
@endsection