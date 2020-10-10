@extends('layouts.app')

@section('content')
<div class="body1">
    <a class="title10">Novo Plano</a>

<form class="registerPlansForm" method="POST" action="{{ route('plan.store') }}" >
    @csrf
        <input required type="text" name="plan_name" id="plan_name" placeholder="Nome Plano">
        <input required type="text" name="price" id="price" placeholder="Preço">
        <textarea required type="text" name="description" id="description" placeholder="Descrição" style="height:100px"></textarea>
        <input class="cadastrarPlano" type="submit" value="Cadastrar Plano">
    <form>      

</div>
@endsection