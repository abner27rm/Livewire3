<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{--@livewire('create-post',['title' =>"hola mundo desde dashborar",
             'user'=>"1"])--}}
           {{-- @livewire('contrador')--}}
          {{--  @livewire('paises')--}}



            <livewire:formulario />{{--utilizando  <livewire:formulario lazy /> para carga lenta para que se cargue la pagina  y luego reemplace el componente --}}

            <div class="mt-8">
                @livewire('comments')
            </div>

        {{--    @livewire('father')--}}

        </div>
    </div>
</x-app-layout>
