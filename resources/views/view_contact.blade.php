@extends('layouts.app')

@section('content')
<div class="body2">
    <a class="title10">Mensagens</a>

    
    <div class="contactBoxes">        
    @foreach ($contacts as $contact)    
        <div class="boxContact">
            <div class="box-contact-text">
                <p>{{ $contact->email }}</p>
                <textarea disabled>{{ $contact->message }}</textarea>
            </div>
            <div class="actionsContact">
                <form action="{{ route('contact.destroy') }}" method="POST">
                    @csrf
                    <input hidden name="contact_id" value="{{ $contact->contact_id }}">
                    <input hidden name="email" value="{{ $contact->email }}">
                    <input hidden name="message" value="{{ $contact->message }}">
                    <input type="submit" class="actionContact" name="submit" value="Deletar">
                </form>

            </div>
        </div>
    @endforeach
    </div>
    <div class="links">
        {!! $contacts->links() !!}
    </div>
</div>
@endsection