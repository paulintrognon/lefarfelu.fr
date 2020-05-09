@extends('frontend.layouts.blank')

@section('body')
<div class="LoginPage">
    <div>
        <a href="/">
            <img src="/img/logo.png" alt="Logo" class="LoginPage-logo" />
        </a>
    </div>
    <div class="LoginPage-text">
        <p class="-blue">
            Connectez-vous à l'espace <b>administrateur</b> du site internet du Farfelu&nbsp;!
        </p>
        <p>
            Vous souhaitez accéder à l'espace <b>utilisateur</b>&nbsp;?
            <a href="{{ route('frontend.auth.login') }}" class="BlackLink">
                Cliquer ici.
            </a>
        </p>
    </div>
    <div class="LoginPage-messages">
        @include('includes.partials.messages')
    </div>
    <div class="LoginPage-form">
        <form action="{{ route('frontend.auth.login.post') }}" method="POST">
            @csrf
            <div class="LoginPage-form-input-container">
                <input type="email" name="email" required placeholder="Entrez l'adresse email admin" class="LoginPage-form-input" />
            </div>
            <div class="LoginPage-form-input-container">
                <input type="password" name="password" required placeholder="Entrez le mot de passe" class="LoginPage-form-input" />                
            </div>
            <div class="LoginPage-form-submit-container">
                <button class="LoginPage-form-submit" type="submit">C'est parti !</button>
            </div>
            <p class="LoginPage-form-forgotPassword">
                Problème de connexion&nbsp;? Contactez <em>aide@campfarfelu.fr</em>
            </p>
        </form>
    </div>
</div>
@endsection
