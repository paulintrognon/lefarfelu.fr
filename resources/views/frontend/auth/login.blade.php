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
        <form action="{{ route('frontend.auth.login.post') }}" method="POST" id="LoginPage-form-form">
            <input type="hidden" name="email" value="{{ config('auth.frontend_email_account') }}" />
            <input type="hidden" name="remember" value="1" />
            @csrf
            <div class="LoginPage-form-input-container">
                <div>
                    <input type="text" name="password" required placeholder="Entrez le mot de passe" class="LoginPage-form-input" id="LoginPage-form-input-password" />
                </div>
                <div>
                    <button type="button" id="LoginPage-form-hide-password" class="LoginPage-form-hide-password">
                        Cacher le mot de passe
                    </button>
                </div>
            </div>
            <div class="LoginPage-form-submit-container">
                <button class="LoginPage-form-submit" type="submit">C'est parti !</button>
            </div>
            <p class="LoginPage-form-forgotPassword">
                Mot de passe oublié&nbsp;? Contactez <em>aide@campfarfelu.fr</em>
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

@push('after-scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const formElement = document.getElementById('LoginPage-form-form');
    const audio = new Audio('/sounds/a-table.mp3');
    const $passwordInput = $('#LoginPage-form-input-password');
    const $togglePasswordVisibilityBtn = $('#LoginPage-form-hide-password');

    formElement.addEventListener('submit', onSubmit, true);

    $togglePasswordVisibilityBtn.click(function () {
        if ($passwordInput.attr('type') === 'text') {
            $passwordInput.attr('type', 'password');
            $togglePasswordVisibilityBtn.text('Afficher le mot de passe');
        } else {
            $passwordInput.attr('type', 'text');
            $togglePasswordVisibilityBtn.text('Cacher le mot de passe');
        }
    });

    function onSubmit(event) {
        event.preventDefault();

        let isInputTypeText = $passwordInput.attr('type') === 'text';
        if (isInputTypeText) {
            $passwordInput.attr('type', 'password');
        }

        $.ajax({
            type: "POST",
            url: '{{ route('frontend.auth.login.check-password') }}',
            data: {
                _token: "{{ csrf_token() }}",
                password: $passwordInput.val(),
            },
            success: function (data) {
                if (data.isPasswordCorrect) {
                    audio.play();
                    setTimeout(() => {
                        submitForm();
                    }, 2000);
                } else {
                    submitForm();
                }
            },
            error: function(data) {
                submitForm();
            },
            complete: function () {
                if (isInputTypeText) {
                    $passwordInput.attr('type', 'text');
                }
            }
        });
    }

    function submitForm() {
        formElement.removeEventListener('submit', onSubmit, true);
        formElement.submit();
    }
});
</script>
@endpush