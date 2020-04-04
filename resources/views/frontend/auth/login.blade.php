@extends('frontend.layouts.blank')

@section('body')
<div class="LoginPage">
    <div>
        <img src="/img/logo.png" alt="Logo" class="LoginPage-logo" />
    </div>
    <div class="LoginPage-text">
        <p class="-blue">
            Faites chauffer les méninges,
        </p>
        <p>
            c'est le moment d'entrer le mot de passe du Farfelu pour accéder au site !
        </p>
    </div>
    <div class="LoginPage-messages">
        @include('includes.partials.messages')
    </div>
    <div class="LoginPage-form">
        <form action="{{ route('frontend.auth.login.post') }}" method="POST">
            <input type="hidden" name="email" value="paulintrognon+farfelu@gmail.com" />
            <input type="hidden" name="remember" value="1" />
            @csrf
            <div class="LoginPage-form-input-container">
                <input type="password" name="password" required placeholder="Entrez le mot de passe" class="LoginPage-form-input" />
            </div>
            <div class="LoginPage-form-submit-container">
                <button class="LoginPage-form-submit" type="submit">C'est parti !</button>
            </div>
            <p class="LoginPage-form-forgotPassword">
                Mot de passe oublié&nbsp;? Contactez <em>aidez-moi@lefarfelu.fr</em>
            </p>
        </form>
    </div>
    <div class="LoginPage-adminLink">
        Vous êtes administrateur ?
        <a href="{{ route('frontend.auth.login.admin') }}">
            Cliquez ici.
        </a>
    </div>
</div>
@endsection
