<div>

{{--    @livewire('hijo')--}}

{{--    <x-button class="mb-4" wire:click="$set('count',0)">//metodo magico set para pasar un valor directamente
        Recetear
    </x-button>--}}

    <x-button class="mb-4" wire:click="$toggle('open')">
        MOSTRAR/OCULTAR
    </x-button>


    {{-- The whole world belongs to you. --}}
    <form class="mb-4" wire:submit="save">
        <x-input
            placeholder="Ingrese un pais"
            wire:model="pais"
            wire:keydown.space="increment"
        />
        <x-button>
            Agregar
        </x-button>
    </form>

    @if($open)
        <ul class="list-disc list-inside space-y-2">
        @foreach($paises as $index => $pais)
            <li wire:key="pis-{{$index}}">
                <span wire:mouseenter="changeActive('{{$pais}}')">( {{$index}}) {{ $pais }}</span>
                <x-danger-button wire:click="delete({{$index}})">
                    x
                </x-danger-button>
            </li>
        @endforeach
    </ul>
    @endif

    {{$active}}

    {{$count}}
</div>
