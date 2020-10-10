

@extends('layouts.app')

@section('content')
<div class="body1">
    <a class="title10">Assinaturas</a>

    <div class="viewSubscriptionsBoxes">
        @foreach ($subscriptions as $subscription)
            <div class="boxViewSubscriptions">
                <div class="box-subscriptions-title">
                    <a>{{ $subscription->plan_name }}</a>
                </div>
                <div class="box-subscriptions-text">
                    <a><strong>Preço:</strong><br>{{ $subscription->price }}<br>
                        <strong>Endereço:</strong><?= "<br>" . strtoupper( $subscription->street). ", " . strtoupper($subscription->street_number) ?>
                        @if(isset($subscription->complement)) <br> {{ strtoupper($subscription->complement) }} @endif <?="<br>". strtoupper($subscription->city) . ', ' .  strtoupper($subscription->state) .  "<br>" .
                        strtoupper($subscription->country) ."<br>".  strtoupper($subscription->cep) . '<br><strong> Pagamento:</strong><br>'?> 
                        @if ($subscription->type == 'cartao_credito')
                        <?php $cnumber = explode(" ",$subscription->card_number); echo "XXXX XXXX XXXX " . end($cnumber) . "<br><br>Pagamento será todo dia <strong>" . $subscription->created_at . "</strong>"?></a>
                        
                        @else
                            Boleto Bancário<br><br>A geração do boleto será todo dia <strong> {{ $subscription->created_at }} </strong></a>
                        @endif
                </div>
                <div class="actionsSubscription">

                    <form method="POST" action="{{ route('subscription.edit') }}">
                        @csrf
                        <input hidden name="subscription_id" value="{{ $subscription->subscription_id }}">
                        <input class="actionViewSubscription" type="submit" value="Editar"> 
                    </form>

                    <form method="POST" action="{{ route('subscription.destroy')}}">
                        @csrf
                        <input hidden name="subscription_id" value="{{ $subscription->subscription_id }}">
                        <input class="actionViewSubscription" type="submit" onclick="confirmation()" value="Deletar"> 
                    </form>
                                 
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function confirmation(){
        if(confirm('Tem certeza de que deseja apagar está assinatura?'))
        return true; 
        else 
        event.preventDefault()
        return false
    }
</script>

@endsection