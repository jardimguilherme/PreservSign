@extends('layouts.app')

@section('content')
<div class="body1">
    <div class="imagemFluxo">
        <img src="/img/routeBar-plans.png">
    </div>
    <a class="title10">Selecione um plano</a>

    @if ($error != null)
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

                <div class="actionSelectPlans">
                    <a href="{{ route('address.select', ['plan' => $plan->plan_id]) }}" class="selecionarPlano">Selecionar</a>                
                </div>
            </div>
        @endforeach
        
    </div>
    <form class="selectPlansForm" action="/">
        <div class="navegacaoSelecionarPlano">
            <input type=submit class="cancelarPlano" value="Cancelar">
        </div>
    </form>
</div>
@endsection