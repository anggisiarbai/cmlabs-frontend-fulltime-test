@extends('index')

@section('title')
    Ingredient Details
@endsection

@section('content')
    <div class="det-head mb-5 position-relative d-block left-anim">
        <h1
            class="det-title align-middle position-relative d-inline-block mb-5 left-anim text-end pe-5">
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
        class="det-img position-relative d-inline-block align-middle left-anim ps-5">
    </div>
    <div class="position-relative d-block left-anim">
        <div class="det-desc d-block position-relative m-auto mb-5 pt-4 text-center left-anim">
            {{ $ingredient['strDescription'] }}
        </div>
    </div>
@endsection