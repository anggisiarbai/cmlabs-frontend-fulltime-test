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

    $data['name'] = $name;

    return view('ingredients-detail', $data);
});

Route::get('meal/{id}', function ($id) {
    $meal = Http::get('https://www.themealdb.com/api/json/v1/1/lookup.php?i=' . $id);
    $data['meal'] = $meal->json()['meals'][0];

    $data['ingredients'] = [];
    for ($i = 1; $i < 20; $i++) {
        if (!empty($data['meal']['strIngredient' . $i])) {
            $ingredients = Http::get('https://www.themealdb.com/api/json/v1/1/list.php?i=' . $data['meal']['strIngredient' . $i]);
            $dataIngredients = collect($ingredients->json()['meals']);
            $dataIngredient = $dataIngredients->firstWhere('strIngredient', $data['meal']['strIngredient' . $i]);

            $data['ingredients'][] = $dataIngredient;
        }
    }

    return view('meal', $data);
});
