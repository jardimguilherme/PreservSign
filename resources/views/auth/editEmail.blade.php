@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Trocar e-mail') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.email.update') }}">
                        @csrf
                        @isset($error[0])
                            <label class="text-color-red">{{ $error[0] }}</label> 
                        @endisset

                        <div class="form-group row">
                            <label for="current-password" class="col-md-4 col-form-label text-md-right">{{ __('Senha atual') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required autocomplete="current-password" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Novo email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-email" class="col-md-4 col-form-label text-md-right">{{ __('Confirme o novo e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="new-email" type="email" class="form-control" name="new-email" required autocomplete="new-email">
                            </div> 
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar e-mail') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
