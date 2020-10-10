@extends('layouts.app')

@section('content')
<div class="body2">
    <div class="imagemFluxo">
        <img src="/img/routeBar-payment.png">
    </div>
    <a class="title10 payment">Qual a forma de pagamento?</a>
    <div class="paymentFields">
        <form method="POST">
            @csrf
            <button class="selectPayment" formaction="{{ route('charge.select')}} ">
                <div class="boleto-payment">
                    <i class="fa fa-barcode"></i>
                    <input hidden name="plan_id" value="{{ $plan_id }}">
                    <input hidden name="address_id" value="{{ $address_id }}">
                    
                    <p>Boleto</p>
                </div>

            </button>

            <button class="selectPayment" formaction="{{ route('credit_card.select') }}">
                <div class="credit-card-payment">
                    <i class="fa fa-credit-card"></i>
                    <input hidden name="plan_id" value="{{ $plan_id }}">
                    <input hidden name="address_id" value="{{ $address_id }}">

                    <p>Cartão de Crédito</p>
                </div>
            </button>

        </form>
        <form method="GET">
            <div class="navegacaoSelectPayment">
                <input type=submit class="voltarSelectPayment" value="Voltar" 
                    formaction="{{ route('address.select', ['plan' =>  $plan_id]) }}">
            </div>
        </form>
    </div>
</div>
@endsection
