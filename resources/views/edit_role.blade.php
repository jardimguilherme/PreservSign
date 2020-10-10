@extends('layouts.app')

@section('content')
<div class="body2">
    <a class="title2">Promover Usuário</a>
    <div class="viewUpgradeUsers">
        <div class="blurred-box-upgrade">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                <label for="user_id">Usuário:</label> <br>
                <select required name="user_id" id="user_id">
                    <option value="" requi selected disabled>Selecione um usuário...</option>
                    @foreach ($users as $user)
                    @if ($user->id != Auth::user()->id)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                    @endforeach
                </select>
            <br>
                <label for="position">Selecione o cargo do usuário:</label> <br>
                <select required name="position" id="position">
                    <option value="1">Usuário comum</option>
                    <option value="2">Administrador</option>
                </select>

        </div>
    </div>
        <input type="submit" class="btn-input" name="submit" value="Confirmar">
    </form>
</div>
@endsection