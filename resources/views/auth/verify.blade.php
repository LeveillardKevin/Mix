@extends('layouts.app')

@section('content')

    @component('components.card')

        @slot('title')
            @lang('Vérification de votre adresse email')
        @endslot

        @if(session('resent'))
            <div class="alert alert-success" role="alert">
                @lang('Un nouveau lien de verification a été envoyé à votre adresse email')
            </div>
        @endif

        <p>@lang('Avant d\'utiliser ce site veuillez trouver un lien de vérification dans vos emails')</p>
        @lang('Si vous n\'avez pas reçu l\'email') <a href="{{ route('verification.resend') }}">@lang('cliquez ici pour en recevoir un nouveau')</a>

    @endcomponent

@endsection