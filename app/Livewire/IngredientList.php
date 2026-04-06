<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class IngredientList extends Component
{
    public $ingredients = [];
    public $search = '';
    public $perPage = 20;
    public $page = 1;

    public function mount()
    {
        $this->fetchData();
    }

    public function updatedSearch()
    {
        $this->page = 1;
    }

    public function fetchData()
    {
        $response = Http::get('https://www.themealdb.com/api/json/v1/1/list.php?i=list');

        $data = $response->json();

        $this->ingredients = $data['meals'] ?? [];
    }

    public function getFilteredDataProperty()
    {
        return collect($this->ingredients)
            ->filter(function ($item) {
                return str_contains(
                    strtolower($item['strIngredient']),
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
        return view('livewire.ingredient-list', [
            'items' => $this->paginatedData,
        ]);
    }
}
