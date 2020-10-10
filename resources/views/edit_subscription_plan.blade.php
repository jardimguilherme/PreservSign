@extends('layouts.app')

@section('content')
<?php $i = 0;?>
<div class="body1">
    <a class="title10">Selecione um plano</a>
    @if (isset($error)!= null)
        <a>{{ $error }}</a>
    @endif

    <div class="plansBoxes">
        
            
        @foreach ($plans as $plan)
            
        <div class="boxPlano">
            <div class="box-plano-titulo">
                <a>{{ $plan->plan_name }}</a>
            </div>
            <div class="box-plano-text">
                <a> {{ $plan->description }} <br><strong>Apenas {{ $plan->price}}!</strong></a>
            </div>

            <div class="actionsAddress">

                <form class="plansForm" onsubmit="confirmation{{ $i }}()" method="POST" action="{{ route('subscription.plan.update') }}">
                    @csrf
                    <div class="actionSelectPlans">
                        <input hidden type="text" name="plan_id" value="{{ $plan->plan_id }}">
                        <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
                        <input type='submit' class="selecionarPlano" value="Selecionar">
                    </div>
                </form>             
            </div>
        </div>

        <script>
            function confirmation{{ $i++ }}(){
                if(confirm('Você tem certeza que deseja alterar seu plano para {{ $plan->plan_name }}?'))
                return true; 
                else 
                event.preventDefault()
                return false
            }
        </script>

    @endforeach
        
        
    </div>
    <form class="plansForm" method="POST" action="{{ route('subscription.edit') }}">
        @csrf
        <div class="navegacaoSubscription">
            <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
            <input type=submit class="cancelar" value="Cancelar">
        </div>
    </form>
</div>
@endsection