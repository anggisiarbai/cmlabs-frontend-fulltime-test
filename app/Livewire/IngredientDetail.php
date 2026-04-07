<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class IngredientDetail extends Component
{
    public $ingredientName;

    public $meals = [];
    public $search = '';
    public $perPage = 20;
    public $page = 1;

    public function mount($ingredientName = null)
    {
        $this->ingredientName = $ingredientName;
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function fetchData()
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/filter.php?i=' . $this->ingredientName);

        $data = $response->json();

        $this->meals = $data['meals'] ?? [];
    }

    public function getFilteredDataProperty()
    {
        return collect($this->meals)
            ->filter(function ($item) {
                return str_contains(
                    strtolower($item['strMeal']),
                    strtolower($this->search)
                );
            })
            ->values();
    }

    public function getTotalPagesProperty()
    {
        return (int) ceil($this->filteredData->count() / $this->perPage);
    }

    public function getPaginatedDataProperty()
    {
        return $this->filteredData
            ->forPage($this->page, $this->perPage);
    }

    public function goToPage($page)
    {
        if ($page >= 1 && $page <= $this->totalPages) {
            $this->page = $page;
        }
    }

    public function render()
    {
        return view('livewire.ingredient-detail', [
            'items' => $this->paginatedData,
            'totalPages' => $this->totalPages,
        ]);
    }
}
