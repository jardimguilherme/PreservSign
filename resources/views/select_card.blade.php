@extends('layouts.app')

@section('content')

<script type="text/javascript">

$(document).ready(function () {

$("form").on("click", "#doit", function () {
    var snumber = document.getElementById("security_number-typed").value;
    var sreal = document.getElementById("security_number").value;
    if(snumber == "")
    {
        document.getElementById('error_cvv').innerHTML = "Por favor, preecha o CVV!";
        event.preventDefault();
        return false;
    }
    if(snumber != sreal){
        document.getElementById('error_cvv').innerHTML = "CVV inválido!";
        event.preventDefault();
        return false;
    }
    return true;
});
});
</script>

<script>
    function confirmation(){
        if(confirm('Tem certeza de que deseja finalizar pagamento?'))
        return true; 
        else 
        event.preventDefault()
        return false
    }
</script>

<div class="body1">
    <div class="imagemFluxo">
        <img src="/img/routeBar-payment.png">
    </div>
    <div class="cardBoxes">
        @if ( $credit_cards != null )
            <div class="boxCard">
                <div class="box-card-icone">
                    <i class="fa fa-cc-visa" aria-hidden="true"></i>
                </div>
                <div class="box-card-text">

                    <a><?= $credit_cards->card_number . "<br/>" . strtoupper($credit_cards->card_name) .  "<br/>". 
                    date('m', strtotime($credit_cards->expires_date)). '/'. date('y', strtotime($credit_cards->expires_date)) ?></a>
                </div>
            </div>    
    </div>  
    <div class="cardFields">
        <form method="POST" action="{{ route('credit_card.create') }}">
            @csrf
            <div class="addCard">
                <input hidden name="plan_id" value="{{ $plan_id }}">
                <input hidden name="address_id" value="{{ $address_id }}">
                <input type="submit" value="Alterar Cartão">
            </div>
        </form>
    </div>
        @else 
        <div class="cardFields">

            <form method="POST" action="{{ route('credit_card.create') }}">
                @csrf
                <div class="addCard">
                    <input hidden name="plan_id" value="{{ $plan_id }}">
                    <input hidden name="address_id" value="{{ $address_id }}">
                    <input type="submit" value="Adicionar Cartão">
                </div>
            </form>
        </div>
        @endif
            
            <form name="confirm_form" id="confirm_form" class="cardForm" method="POST">
                @csrf                
                    @if ( $credit_cards != null )
                        <input hidden name="plan_id" value="{{ $plan_id }}">
                        <input hidden name="address_id" value="{{ $address_id }}">
                        <input hidden type="text" name="card_number" id="card_number" value="{{ $credit_cards->card_number }}">
                        <input hidden type="text" name="security_number" id="security_number" value="{{ $credit_cards->security_number }}">
                        <input hidden type="text" name="expires_date" id="expires_date" value="<?= date('m', strtotime($credit_cards->expires_date)). '/'. date('y', strtotime($credit_cards->expires_date)) ?>">
                        <input hidden type="text" name="card_name" id="card_name" value="{{ $credit_cards->card_name }}">
                        <input hidden name="type" value="2">
                        <div class="confirmacaoCartao">
                            <input type="text" name="security_number-typed" maxlength="3" id="security_number-typed" placeholder="Digite o CVV do cartão">
                        </div>
                    <span id="error_cvv">{{ session('error') }}</span>
    
                    @endif
                    <input hidden name="plan_id" value="{{ $plan_id }}">
                    <input hidden name="address_id" value="{{ $address_id }}">
                    <div class="navegacaoCartao">
                        <input type=submit class="voltarCartao" value="Voltar" formaction="{{ route('payment.select') }}">
                        @if ( $credit_cards != null )
                            <input type=submit name="submit" class="finalizarPagamento" id="doit" value="Finalizar Pagamento" onclick="confirmation()" formaction="{{ route('subscription.store') }}">
                        @endif
                    </div>
                
            </form>
</div>

@endsection