@extends('layouts.app')

@section('content')
<div class="container-body-all" aria-label="Uma mão com camisinha na ponta de dedo se encontrando com outra mão.">
    
    <div class="boxes">
        <div class="box-blured">
            <div class="box-title">
                <p class="subTitle">Fale Conosco</p>
            </div>
            <div class="container">

            <form method="POST" onsubmit="alert('Sua mensagem foi enviada com sucesso!')" action="{{ route('contact.store') }}">
                @csrf
                    <input type="text" id="email" name="email" placeholder="Seu E-mail" required>
                    <textarea id="subject" maxlength="800" name="message" placeholder="Sua Mensagem" style="height:100px" required></textarea>
                    <input type="submit" class="enviar" value="Enviar">
                </form>
            </div>
        </div>
        <div class="box-blured">
            <div class="box-title">
                <p class="subTitle">Contato</p>
            </div>
            <div class="box-message-contact">
                <a>Telefone:<br><br>0800-SE-PRESERVE<br><br><br>E-mail:<br><br>preserve@preserve.com</a>
            </div>

        </div>
        
    </div>

</div>
@endsection