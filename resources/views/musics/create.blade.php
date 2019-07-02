@extends('layouts.form')

@section('card')

    @component('components.card')

        @slot('title')
            @lang('Ajouter une music')
        @endslot

        <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group{{ $errors->has('music') ? ' is-invalid' : '' }}">
                <div class="custom-file">
                    <input type="file" id="music" lang="fr" name="music" class="{{ $errors->has('music') ? 'is-invalid ' : '' }}custom-file-input" required>
                    <label class="custom-file-label" for="music"></label>
                    @if($errors->has('music'))
                        <div class="invalid-feedback">
                            {{ $erros->first('music') }}
                        </div>
                    @endif
                </div>
                <br>
            </div>
            <div class="form-group">
                <audio controls id="preview">
                    <source src="#">
                </audio>
            </div>
            <div class="form-group">
                <label for="category_id">@lang('Catégorie')</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            @include('partials.form-group', [
                'title'=> __('Artiste'),
                'type' => 'text',
                'name' => 'artiste',
                'required' => false,
            ])

            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>

    @endcomponent

@endsection

@section('script')

    <script>
        $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if(that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        })
    </script>
@endsection
