<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('ingredients');
});

Route::get('ingredient/{name}', function ($name) {
    $ingredients = Http::get('https://www.themealdb.com/api/json/v1/1/list.php?i=' . $name);
    $data['ingredients'] = collect($ingredients->json()['meals']);
    $data['ingredient'] = $data['ingredients']->firstWhere('strIngredient', $name);

    $filters = Http::get('https://www.themealdb.com/api/json/v1/1/filter.php?i=' . $name);
    $data['filters'] = $filters->json();
    $data['name'] = $name;

    return view('ingredients-detail', $data);
});
