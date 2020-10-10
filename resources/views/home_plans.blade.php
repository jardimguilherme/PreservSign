@extends('layouts.app')

@section('content')
<div class="plans-subBar">
    <a>Conheça Nossos Planos!</a>
</div>
@foreach ($plans as $plan)

@if ($plan->plan_name == 'Basic')

<div class="plans-basic">
    <div class="first-division">
        <div class="plan-title"><strong>Plano {{ $plan->plan_name }}</strong></div>
        <div class="plan-description">
            {{ $plan->description }}
        </div>
    </div>

    <div class="center-division">
        <div class="plan-detail">
            5 camisinhas regulares <br>
            5 camisinhas de sabor <br>
            5 camisinhas de textura <br>
            <p><strong>Tudo isso por apenas <br>R$ {{ $plan->price }}!</strong></p>
        </div>
    </div>

    <div class="right-division">
        <a href="{{ route('address.select', ['plan' => $plan->plan_id]) }}" class="btn-assinar">É esse!</a>
    </div>
</div>

@elseif ($plan->plan_name == 'Premium')
<div class="plans-premium">
    <div class="first-division">
        <div class="plan-title"><strong>Plano {{$plan->plan_name}}</strong></div>
        <div class="plan-description">
            {{ $plan->description }}
        </div>
    </div>

    <div class="center-division">
        <div class="plan-detail">
            5 camisinhas regulares <br>
            5 camisinhas de sabor <br>
            5 camisinhas de textura <br>
            5 camisinhas especiais<br>
            100 ml de lubrificante
            <p><strong>Tudo isso por apenas <br>R$ {{ $plan->price }}!</strong></p>
        </div>
    </div>

    <div class="right-division">
        <a href="{{ route('address.select', ['plan' => $plan->plan_id]) }}" class="btn-assinar">É esse!</a>
    </div>

</div>
@elseif($plan->plan_name == 'Exxxtra')
<div class="plans-extra">
    <div class="first-division">
        <div class="plan-title"><strong>Plano {{ $plan->plan_name }}</strong></div>
        <div class="plan-description">
            {{ $plan->description }}
        </div>
    </div>

    <div class="center-division">
        <div class="plan-detail">
            10 camisinhas de sabor <br>
            10 camisinhas de textura <br>
            5 camisinhas regulares <br>
            5 camisinhas especiais <br>
            150 ml de lubrificante sortido
            <p><strong>Tudo isso por apenas <br>R$ {{ $plan->price }}!</strong></p>
        </div>
    </div>

    <div class="right-division">
        <a href="{{ route('address.select', ['plan' => $plan->plan_id]) }}" class="btn-assinar">É esse!</a>
    </div>

</div>
@endif
@endforeach
@endsection