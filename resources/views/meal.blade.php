@extends('index')

@section('title')
    {{ $meal['strMeal'] }}
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
        {{ $meal['strMeal'] }}
    </span>
@endsection

@section('content')
    <div
        class="det-head mb-5 position-relative d-block top-anim">
        <h1
            class="det-title align-middle position-relative d-inline-block mb-5 top-anim text-end pe-5">
            <div
                class="bg">
            </div>
            {{ $meal['strMeal'] }}
        </h1>
        <img
        src="{{ $meal['strMealThumb'] }}"
        alt="{{ $meal['strMeal'] }}"
        class="det-img position-relative d-inline-block align-middle top-anim ms-5 rounded-5">
    </div>
    <div
        class="position-relative d-block top-anim meal-desc-container m-auto mb-5">
        <div
            class="meal-desc top-anim d-inline-block align-top pe-5">
            <h2
                class="meal-desc-title mb-3">
                Instructions
            </h2>
            {{ $meal['strInstructions'] }}
        </div>
        <div
            class="meal-desc top-anim d-inline-block align-top ps-5">
            <h2
                class="meal-desc-title mb-3">
                Recipes
            </h2>
            <ul
                class="meal-recipe-list">
                @for ($i = 1; $i < 20; $i++)
                    @if($meal['strIngredient' . $i] != null)
                        <li>
                            {{ $meal['strMeasure' . $i] }} {{ $meal['strIngredient' . $i] }}
                        </li>
                    @endif
                @endfor
            </ul>
        </div>
    </div>
    <div
        class="position-relative d-block top-anim">
        <h2
            class="det-content-title text-center position-relative d-table m-auto mb-4">
            <div
                class="bg">
            </div>
            Explore More Ingredients
        </h2>
        <div
            class="ing-content">
            @foreach($ingredients as $item)
                <a
                    href="{{ url('ingredient/' . $item['strIngredient']) }}"
                    class="position-relative d-inline-block align-top rounded ing-item m-2 overflow-hidden">
                    <div
                        class="ing-img position-absolute d-block"
                        style="background: url('{{ $item['strThumb'] }}') no-repeat center;"></div>
                    <h2 class="ing-item-title text-center d-block position-relative">
                        {{ $item['strIngredient'] }}
                    </h2>
                </a>
            @endforeach
        </div>
@endsection