<div>
    @persist('player')
        <audio class="mt-8" src="{{asset('audios/LA PELEA CON EL DIABLO-OCTAVIO MEZA..mp3')}}" controls></audio>
    @endpersist


    <x-button class="mt-4" wire:click="redirigir ">
        Ir a Prueba
    </x-button>
    <h1 class="text-2xl font-semibold">
        Soy el press
    </h1>


    <x-input wire:model.live="name"/>

    <hr class="my-6">

    <div>
      {{--  @livewire('children',[
                'name'=>$name,
                    ])--}}



        <livewire:children wire:model="name"/>{{-- este se usa solo para modelable que permite envio de datos vidireccional entre dos componentes--}}

       {{-- @livewire('contrador',[], key('contador-1')) llamandao al mismo componente pero devos de poner llaves
        @livewire('contrador',[],key('contador-2'))
        @livewire('contrador',[],key('contador-3'))
        @livewire('contrador',[],key('contador-4'))

--}}



        @push('js')

        @endpush
    </div>

</div>
