<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prueba') }}
        </h2>
    </x-slot>

    @persist('player')
    <audio class="mt-8" src="{{asset('audios/LA PELEA CON EL DIABLO-OCTAVIO MEZA..mp3')}}" controls></audio>
    @endpersist


</x-app-layout>
