@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $("#card_number").mask("0000 0000 0000 0000");
</script>

<script type="text/javascript">
    $("#expires_date").mask("00/00");
</script>

<script>
$(document).ready(function () {

    $("form").on("submit", function () {
        var snumber = document.getElementById("security_number").value;
        $("#security_number-typed").val(snumber);
    });
});
</script>

<div class="body1">
    
    <a class="title10">Qual cartão usará para compra?</a>

    <form class="cardForm" method="POST" action="{{ route('subscription.payment.credit_card.update') }}">
       @csrf
        <input required type="text" name="card_number" id="card_number" minlength="19" placeholder="Número do cartão">
        <input required type="text" name="security_number" minlength="3" maxlength="3" id="security_number" placeholder="Codígo de seguraça">
        <input required type="text" name="expires_date" minlength="5" id="expires_date" placeholder="Vencimento">
        <input required type="text" name="card_name" id="card_name" placeholder="Nome do titular do cartão">
        <input hidden type="text" name="security_number-typed" id="security_number-typed">
        <input hidden name="type" value="2">
        <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
        <input type="submit" class="finalizarPagamento" name="submit" value="Finalizar compra">
        

    </form>    
        
        <form method="POST">
            @csrf
            <div class="voltarPayment">
                <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
                <input type=submit class="voltarEditarEndereco" value="Voltar"
                formaction="{{ route('subscription.edit.payment.credit_card') }}">
            </div>
        </form>

</div>


@endsection