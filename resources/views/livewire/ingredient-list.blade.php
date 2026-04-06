
<div
    class="ing-content top-anim">

    <input type="text" wire:model.live="search" placeholder="Search ingredient..." class="form-control position-relative d-block ing-search m-auto mb-3 top-anim">

    @foreach($items as $index => $item)
        <a
            href="{{ url('Ingredient/' . $item['idIngredient']) }}"
            class="position-relative d-inline-block align-top rounded ing-item m-2 overflow-hidden top-anim">
            <div
                class="ing-img position-absolute d-block"
                style="background: url('{{ $item['strThumb'] }}') no-repeat center;"></div>
            <h2 class="ing-item-title text-center d-block position-relative">
                {{ $item['strIngredient'] }}
            </h2>
        </a>
    @endforeach
    @if(count($items) === 0)
        <p class="ing-not-found text-center d-block position-relative p-2 top-anim">
            No ingredients found.
        </p>
    @endif

    <div
        class="position-relative d-block text-center mt-5 gap-1 top-anim">

        @if ($page > 3)
            <button
                wire:click="goToPage(1)"
                class="pagination-item d-inline-block align-top">
                1
            </button>
            @if ($page > 4)
                <span
                class="px-2">
                ...
            </span>
            @endif
        @endif

        @for ($i = max(1, $page - 2); $i <= min($this->totalPages, $page + 2); $i++)
            <button
                wire:click="goToPage({{ $i }})"
                class="pagination-item d-inline-block align-top {{ $page == $i ? 'pagination-active' : '' }}">
                {{ $i }}
            </button>
        @endfor

        @if ($page < $this->totalPages - 2)

            @if ($page < $this->totalPages - 3)
                <span
                    class="px-2">
                    ...
                </span>
            @endif

            <button
                wire:click="goToPage({{ $this->totalPages }})"
                class="pagination-item d-inline-block align-top">
                {{ $this->totalPages }}
            </button>
        @endif
    </div>
</div>