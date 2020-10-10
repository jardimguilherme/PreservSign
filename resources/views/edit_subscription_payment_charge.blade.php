@extends('layouts.app')

@section('content')
<div class="body1">
    
    <div class="boletoFields">
        <div class="boletoBoxesExample">
        

            <div class="boxBoletoExample">
                
                <div class="box-boleto-textExample">
                    <p><strong>Nome do pagante: </strong>{{ Auth::user()->name }}</p>
                    <p><strong>Data do Vencimento: </strong> {{ $expires_date }}</p>
                    <p><strong>Preço Total: </strong>R$ {{ $price}}</p>
                </div>
                
            </div>
            
        </div>
    
        <div class="actionsBoleto">
            
            <form method="POST">
                @csrf
                <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
                <input type=submit class="voltarBoleto" value="Voltar" formaction="{{ route('subscription.edit') }}">
            </form>  
            
            <div class="backPayment">
                <form action="#" method="POST">
                    @csrf
                    <input hidden type="text" name="subscription_id" value="{{ $subscription_id }}">
                    <input hidden name="type" value="1">
                    <input name="submit" type=submit class="finalizarPagamento" value="Finalizar Pagamento" onclick="confirmation()" 
                    formaction="{{ route('subscription.payment.charge.update') }}">
                    
                </form> 
            </div>
                       
        </div>


        <script>
            function confirmation(){
                if(confirm('Tem certeza de que deseja alterar a forma de pagamento para boleto?'))
                return true; 
                else 
                event.preventDefault()
                return false
            }
        </script>
        

        
    </div>
</div>
@endsection