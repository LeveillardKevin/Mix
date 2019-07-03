@extends('layouts.app')

@section('content')

    <div class="site-wrapper">
        <div class="site-wrappaer-inner text-white text-center">
            <i class="fas fa-spinner fa-pulse fa-4x"></i>
        </div>
    </div>
    <main class="container-fluid">
        @isset($category)
            <h2 class="text-title mb-3">{{ $category->name }}</h2>
        @endif
        @isset($user)
            <h2 class="text-title mb-3">{{ __('Music de ') . $user->name }}</h2>
            @endif
        <div class="d-flex justify-content-center">
            {{ $musics->links() }}
        </div>
        <div class="card-columns">
            @foreach($musics as $music)
                <div class="card" id="music{{ $music->id }}">
                    @isset($music->artiste)
                        <div class="card-body">
                            <p class="card-text">{{ $music->artiste }}</p>
                        </div>
                    @endisset
                    <a href="{{ url('musics' . $music->name) }}">
                        <audio controls style="width: 370px;">
                            <source src="{{ url('musics/' . $music->name) }}">
                        </audio>
                    </a>
                    <div class="card-footer text-muted">
                        <em>
                            <a href="{{ route('user', $music->user->id) }}" data-toggle="tooltip" title="{{ __('Voir les musics de '). $music->user->name }}">
                                {{ $music->user->name }}
                            </a>
                        </em>
                        <div class="pull-right">
                            <em>
                                {{ $music->created_at->formatLocalized('%x') }}
                            </em>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $musics->links() }}
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(() => {

            $('.site-wrapper').fadeOut(1000)

            $('[data-toggle="tooltip"]').tooltip()

            $('.card-columns').magnificPopup({
                delegate: 'a.music-link',
                type: 'file',
                tClose: '@lang("Fermer (Esc)")'@if($musics->count() > 1),
                gallery: {
                    enabled: true,
                    tPrev: '@lang("Précédent (Flèche de gauche)")',
                    tNext: '@lang("Suivant (Flèche de droite)")',
                },
                callbacks: {
                    buildControls: function () {
                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight))
                    }
                }@endif
            })
        })
    </script>
@endsection