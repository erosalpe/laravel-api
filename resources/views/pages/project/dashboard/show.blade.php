@extends('layouts.app')


@section('title', 'Progetti')

@section('style')
<style>
    
</style>
@endsection
@section('main')
    <h1 class="text-center pb-5">Progetto: {{$project->title}}</h1>
        
    <div class="d-flex align-items-center justify-content-center">
        
        <div class="card dimensioniCard" style="width: 18rem;">
            <img src="{{asset('/storage/'. $project->preview)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$project->title}}</h5>
                <p class="card-text">
                    <strong>
                        {{$project->type ? $project->type->name : 'Nessun Tipo di progetto selezionato'}}
                    </strong>
                </p>
                <p class="card-text">{{$project->description}}</p>
                <p>{{$project->language}}</p>
                <ul class="d-flex gap-2 unstyled flex-wrap p-0 m-0 pb-3">
                        @forelse($project->technologies as $technology)
                            <li class="badge text-bg-primary dimensioniPill">{{ $technology->name }}</li>
                            @empty
                                <strong>
                                    Non sono presenti Tecnologie selezionate
                                </strong>
                        @endforelse
                    </ul>
            </div>
        </div>
    </div>
    
@endsection

