@extends('template.app')

@section('title', 'Startseite')

@if(!empty($query))
    @section('headline', e($query))
@else
    @section('headline','Rezeptsammlung')
@endif

@section('content')
    <div class="card-columns">
        @forelse($recipes as $recipe)

        @include('template.card')

        @empty
        <div class="card">
            <div class="card-body">
                Keine Rezepte vorhandenn
            </div>
        </div>
        
        @endforelse
    </div>
    {{ $recipes->links() }}
@endsection
