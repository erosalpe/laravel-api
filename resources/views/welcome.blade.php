@extends('layouts.app')
@section('main')
<div class="d-flex flex-column gap-5 w-75 m-auto justify-content-center align-items-center pt-5">
    <h1>Ciao</h1>
    <a href="{{ route('dashboard.projects.index') }}" class="btn btn-warning">Vai ai progetti</a>
</div>

@endsection