@extends('index')

@section('title')
    Populare Food Ingredients
@endsection

@section('content')
    <h1
        class="ing-title d-table position-relative mb-5 text-center top-anim">
        <div
            class="bg">
        </div>
        <span
            class="position-relative d-block">
            Popular
        </span>
        Food Ingredients
    </h1>
    @livewire('ingredient-list')
@endsection