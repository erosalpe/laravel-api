@extends('layouts.app')


@section('title', 'Project')

@section('style')
<style>
  
</style>
@endsection

@section('main')
    <h2>Crea nuovo Progetto</h2>

    <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
            @error('title')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo di progetto</label>
            <select class="form-select @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>
                <option value="">Open this select menu</option>

                @foreach($types as $item)
                    <option value="{{$item->id}}" {{$item->id == old('type_id') ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Seleziona le Tecnologie usate</label>
            <select class="form-select @error('technologies') is-invalid @enderror" id="technologies" name="technologies[]" multiple required>
                <option value="">Open this select menu</option>

                @foreach($technologies as $item)
                    <option value="{{$item->id}}" {{$item->id == old('technologies') ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
            @error('technologies')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
            @error('description')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="preview" class="form-label">preview</label>
            <input type="file" class="form-control @error('preview') is-invalid @enderror" id="preview" name="preview">
            @error('preview')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="language" class="form-label">language</label>
            <input type="text" class="form-control @error('language') is-invalid @enderror" id="language" name="language" required>
            @error('language')
                <div class="alert alert-danger">

                    {{ $message }}

                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
@endsection

