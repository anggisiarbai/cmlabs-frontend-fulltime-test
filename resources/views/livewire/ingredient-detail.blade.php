@php
    use Illuminate\Support\Str;
@endphp

<div
    class="ing-content">

    <input type="text" wire:model.live="search" placeholder="Search meal..." class="form-control position-relative d-block ing-search m-auto mb-3">

    @foreach($items as $index => $item)
        <a
            href="{{ url('meal/' . $item['idMeal']) }}"
            class="position-relative d-inline-block align-top rounded ing-item m-2 overflow-hidden">
            <div
                class="ing-img position-absolute d-block"
                style="background: url('{{ $item['strMealThumb'] }}') no-repeat center;"></div>
            <h2 class="ing-item-title text-center d-block position-relative">
                {{ $item['strMeal'] }}
            </h2>
        </a>
    @endforeach
    @if(count($items) === 0)
        <p class="ing-not-found text-center d-block position-relative p-2">
            No meals found.
        </p>
    @endif

    @if ($totalPages > 1)
        <div
            class="position-relative d-block text-center mt-5 gap-1">

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

            @for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++)
                <button
                    wire:click="goToPage({{ $i }})"
                    class="pagination-item d-inline-block align-top {{ $page == $i ? 'pagination-active' : '' }}">
                    {{ $i }}
                </button>
            @endfor

            @if ($page < $totalPages - 2)

                @if ($page < $totalPages - 3)
                    <span
                        class="px-2">
                        ...
                    </span>
                @endif

                <button
                    wire:click="goToPage({{ $totalPages }})"
                    class="pagination-item d-inline-block align-top">
                    {{ $totalPages }}
                </button>
            @endif
        </div>
    @endif
</div>