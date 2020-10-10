@extends('layouts.app')

@section('content')

<div class="body1">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil</div>

                <div class="card-body">
                    <div class="col-md-12">

                        @isset($success[0])
                        <label class="text-color-green">{{ $success[0] }}</label>
                        @endisset

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nome') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-mail') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-left">{{ __('CPF') }}</label>

                            <div class="col-md-12">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ Auth::user()->cpf }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthDate" class="col-md-4 col-form-label text-md-left">{{ __('Data de Nascimento') }}</label>

                            <div class="col-md-12">
                                <input id="birthDate" type="text" class="form-control" name="birth_date" value="<?php $date = explode("-", Auth::user()->birth_date); echo $date[2]."/".$date[1]."/".$date[0] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-left">{{ __('Telefone') }}</label>

                            <div class="col-md-12">
                                <input id="phoneNumber" type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}" disabled>
                            </div>
                        </div>
                        @if(Auth::user()->groupid == 2)
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{ route('user.index') }}">Promover usuário</a>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <a href="{{ route('plan.index') }}">Visualizar planos</a>
                            </div>

                        </div>
                        
                    @endif

                    @if(Auth::user()->groupid == 2)
                    <div class="form-group row">

                        <div class="col-md-12">
                            <a href="{{ route('contact.index') }}">Visualizar mensagens</a>
                        </div>

                    </div>
                    
                @endif

                    <div class="form-group row">

                        <div class="col-md-12">
                            <a href="{{ route('address.index') }}">Visualizar endereços</a>
                        </div>

                    </div>


                        <div class="form-group row">
                            <div class="col-sm-auto">
                                    <a class="btn btn-outline-primary" href="{{ route('profile.edit') }}">Editar perfil</a>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-auto">
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                        {{ __('Voltar') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection