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
                    <input type="file" id="music" name="music" class="{{ $errors->has('music') ? 'is-valid ' : '' }}custom-file-input" required>
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
                <label for="category_id">@lang('Catégorie')</label>
                <select id="category_id" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            @component('components.button')
                @lang('Envoyer')
            @endcomponent
        </form>

    @endcomponent

@endsection

