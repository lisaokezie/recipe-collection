@extends('template.app')

@section('title', 'Kategorien')

@section('headline', 'Kategorien')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        @forelse($categories as $category)
                <div class="col mb-2 mb-md-4">
                    <a href="{{ route('recipes.index', ['category' => $category->id, 'name' => $category->name])}}" style="color: black; text-decoration: none">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0 d-flex justify-content-between align-items-center">
                                {{$category->name}} <span class="badge badge-secondary badge-pill">{{$category->recipes->count()}}</span>
                            </h5>
                        </div>
                    </div>
                    </a>
                </div>
        @empty
            <div class="mx-auto text-center">Keine Kategorien vorhanden</div>
        @endforelse
    </div>
@endsection
