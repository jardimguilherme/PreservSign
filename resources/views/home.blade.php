@extends('layouts.app')

@section('content')
<div class="subBar">
  <img class="image-left" src="/img/home-left-hand.png" alt="Três mãos segurando três camisinhas embaladas.">
  <div class="blurred-box">
    <a class="text-title">PreservSign</a>
    <a class="text-description">Você pode recebers camisinhas exclusivas<br> e acessórios para apimentar sua relação<br> na segurança e discrição da sua casa!</a>
    <a href="{{ route('plan.select') }}" class="btn-signUp">Eu Quero!</a>
  </div>
  <img class="image-right" src="/img/home-right-hand.png" alt="Uma mão segurando uma cimisinha sem embalagem.">
</div>
<div class="instrucoes">
  <div class="assine">
    <div class="assine-left">
      <i class="fa fa-cart-plus"></i>
      <p><strong>ESCOLHA O PLANO<br>DE SUA PREFERÊNICA</strong></p>
      <div class="description-icon">Adquira quantas camisinhas <br> você desejar</div>
    </div>
    <div class="assine-right">
      <i class="fa fa-truck"></i>
      <p><strong>FRETE GRÁTIS</strong></p>
      <div class="description-icon">Entregamos para qualquer <br> região do Brasil</div>
    </div>
  </div>

  <div class="assinaturas">
    <div class="assinaturas-left">
      <i class="fa fa-credit-card"></i>
      <p><strong>CARTÃO DE CRÉDITO</strong></p>
      <div class="description-icon">Aceitamos todas as bandeiras de <br> cartão para você realizar o seu <br> pagamento</div>
    </div>
    <div class="assinaturas-right">
      <i class="fa fa-file"></i>
      <p><strong>EMISSÃO DE BOLETOS</strong></p>
      <div class="description-icon">Emitimos boleto para você <br> realizar o seu pagamento</div>
    </div>

  </div>
  <div class="produtos">
    <div class="produtos-left">
      <i class="fa fa-calendar"></i>
      <p><strong>TODO MÊS PARA VOCÊ</strong></p>
      <div class="description-icon">Assine já e desfrute de todos <br> os benefícios sem preocupação</div>
    </div>
    <div class="produtos-right">
      <i class="fa fa-home"></i>
      <p><strong>RECEBA EM CASA</strong></p>
      <div class="description-icon">Receba na segurança <br> no conforto de sua residência</div>
    </div>
  </div>
</div>
@endsection