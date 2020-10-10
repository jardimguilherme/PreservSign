@extends('layouts.app')

@section('content')
<div class="body1">

    <a class="title10">Edite sua assinatura!</a>
    @foreach ($subscriptions as $subscription)

        <div class="editSubscriptionBoxes">
            <div class="boxEditSubscription">
                    <div class="box-subscription-titulo">
                        <a>{{ $subscription->plan_name }}</a>
                    </div>
                    <div class="box-subscription-text">
                        <a>{{ $subscription->description}}
                            <br><strong>Apenas R$ {{ $subscription->price}}!</strong></a>
                    </div>

                    <div class="actionsEditSubscriptions">
                        <form method="POST" action="{{ route('subscription.edit.plan')}}">
                            @csrf
                            <input hidden type="text" name="subscription_id" value="{{ $subscription->subscription_id }}">
                            <input type="submit" class="upgradeDowngrade" value="Fazer upgrade ou downgrade">
                        </form>
                    </div>
                
            </div>
            <div class="boxEditSubscription">
                    <div class="box-subscription-titulo">
                        <a>Endereco</a>
                    </div>
                    <div class="box-subscription-text">
                        <a><?=strtoupper( $subscription->street). ", " . strtoupper($subscription->street_number) ?>
                            @if(isset($subscription->complement)) <br> {{ strtoupper($subscription->complement) }} @endif <?="<br>". strtoupper($subscription->city) . ', ' .  strtoupper($subscription->state) .  "<br>" .
                            strtoupper($subscription->country) ."<br>".  strtoupper($subscription->cep) ?></a>
                    </div>

                    <div class="actionsEditSubscriptions">
                        <form method="POST" action="{{ route('subscription.edit.address')}}">
                            @csrf
                            <input hidden type="text" name="subscription_id" value="{{ $subscription->subscription_id }}">
                            <input type="submit" class="upgradeDowngrade" value="Editar endereço">
                        </form>
                    </div>
                
            </div>
            <div class="boxEditSubscription">
                    @if ($subscription->type == 'boleto')
                    <div class="box-subscription-icone">
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                    </div>
                    @else
                    <div class="box-subscription-icone">
                        <i class="fa fa-cc-visa" aria-hidden="true"></i>
                    </div>
                    @endif
                    <div class="box-subscription-text">
                        @if ($subscription->type == 'boleto')
                        <a>Boleto Bancário <br>{{ $subscription->payer_name }}</a>
                        @else
                        <a><?php $cnumber = explode(" ",$subscription->card_number); echo "XXXX XXXX XXXX " . end($cnumber)?><br/>
                            {{ $subscription->card_name }} <br />
                            <?= date('m', strtotime($subscription->expires_date)). '/'. date('y', strtotime($subscription->expires_date)) ?></a>
                        @endif
                    </div>
                    <div class="actionsEditSubscriptions">
                        @if ($subscription->type != 'boleto')
                            <form method="POST" action="{{ route('subscription.edit.payment.charge')}}">
                                @csrf
                                <input hidden type="text" name="subscription_id" value="{{ $subscription->subscription_id }}">
                                <input hidden type="text" name="price" value="{{ $subscription->price }}">
                                <input type="submit" class="editarCartaoPlano" value="Alterar para boleto">
                            </form>
                        @else
                            <form method="POST" action="{{ route('subscription.edit.payment.credit_card')}}">
                                @csrf
                                <input hidden type="text" name="subscription_id" value="{{ $subscription->subscription_id }}">
                                <input type="submit" class="editarCartaoPlano" value="Alterar para cartão de crédito">
                            </form>
                        @endif
                    </div>
                
            </div>
        </div>

    <form class="subscriptionForm">
        <div class="navegacaoSubscription">
        <input type=submit class="cancelar" formaction="{{ route('subscription.index') }}"" value="Cancelar">
        </div>
    </form>
    @endforeach
</div>
@endsection
