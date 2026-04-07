@extends('index')

@section('title')
    Ingredient Details
@endsection

@section('breadcrumb')
    <a
        href="{{ url('/') }}"
        class="bre-link">
        <i
        class="bi bi-house-door-fill"></i>
        Food Ingredients
    </a>
    <span
        class="bre-separator">
        /
    </span>
    <span
        class="bre-current">
        {{ $ingredient['strIngredient'] }}
    </span>
@endsection

@section('content')
    <div class="det-head mb-5 position-relative d-block top-anim">
        <h1
            class="det-title align-middle position-relative d-inline-block mb-5 top-anim text-end pe-5">
            <div
                class="bg">
            </div>
            <span
                class="position-relative d-block">
                Food Ingredient
            </span>
            {{ $ingredient['strIngredient'] }}
        </h1>
        <img
        src="{{ $ingredient['strThumb'] }}"
        alt="{{ $ingredient['strIngredient'] }}"
        class="det-img position-relative d-inline-block align-middle top-anim ps-5">
    </div>
    <div class="position-relative d-block top-anim">
        <div class="det-desc d-block position-relative m-auto mb-5 pt-4 text-center top-anim">
            {{ $ingredient['strDescription'] }}
        </div>
    </div>
    <div class="position-relative d-block top-anim">
        <h2 class="det-content-title text-center position-relative d-table m-auto mb-4">
            <div
                class="bg">
            </div>
            {{ $ingredient['strIngredient'] }}
            <span
                class="position-relative d-block">
                Meals
            </span>
        </h2>
        @livewire('ingredient-detail', ['ingredientName' => $ingredient['strIngredient']])
    </div>
@endsection