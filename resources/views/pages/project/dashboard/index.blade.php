@extends('layouts.app')


@section('title', 'Progetti')

@section('style')
<style>
    .dimensioniCard{
        --gap: 1rem;
        --columns: 4;
        flex-basis: calc((100% / var(--columns)) - var(--gap) + (var(--gap) / var(--columns)));
    }
    .dimensioniPill{
        --gap: 0.5rem;
        --columns: 5;
        flex-basis: calc((100% / var(--columns)) - var(--gap) + (var(--gap) / var(--columns)));
    }
</style>
@endsection
@section('main')
    <h1 class="text-center">Progetti</h1>
    <a class="btn btn-primary my-5" href="{{ route('dashboard.projects.create')}}">
       Nuovo progetto
    </a>

    <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
        @foreach($projects as $item)
            <div class="card dimensioniCard" style="width: 18rem;">
                <img src="{{asset('/storage/'. $item->preview)}}" class="card-img-top" alt="{{$item['title']}}">
                <div class="card-body">
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <p class="card-text">
                        <strong>
                            {{$item->type ? $item->type->name : 'Nessun Tipo di progetto selezionato'}}
                        </strong>
                    </p>
                    <p class="card-text">{{$item['description']}}</p>
                    <p>{{$item['language']}}</p>
                    <ul class="d-flex gap-2 unstyled flex-wrap p-0 m-0 pb-3">
                        @forelse($item->technologies as $technology)
                            <li class="badge text-bg-primary dimensioniPill">{{ $technology->name }}</li>
                            @empty
                                <strong>
                                    Non sono presenti Tecnologie selezionate
                                </strong>
                        @endforelse
                    </ul>
                    <a href="{{ route ( 'dashboard.projects.show', $item->slug )}}" class="btn btn-success">Visualizza</a>
                    <a href="{{ route ( 'dashboard.projects.edit', $item->slug )}}" class="btn btn-primary">Modifica</a>
                    <form class="d-inline" action="{{ route ( 'dashboard.projects.destroy', $item->slug )}}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

