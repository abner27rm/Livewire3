<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <x-input type="text" wire:model.live="name"/>
        <x-button wire:click="save">
            save
        </x-button>
    </div>
    <h>{{$name}}</h>

</div>
