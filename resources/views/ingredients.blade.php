@extends('index')

@section('title')
    Popular Food Ingredients
@endsection

@section('breadcrumb')
    <span
        class="bre-current">
        <i
        class="bi bi-house-door-fill"></i>
        Popular Food Ingredients
    </span>
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
    <div class="position-relative d-block top-anim">
        @livewire('ingredient-list')
    </div>
@endsection