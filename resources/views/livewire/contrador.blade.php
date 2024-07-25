<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-button wire:click="increment(2)">
        +
    </x-button>

    {{$count}}
    <x-button wire:click="decrement(2)">
        -
    </x-button>
</div>
