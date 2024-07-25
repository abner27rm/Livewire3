<div>
    <div class="bg-white shadow rounded-lg p-6 mb-8">

        <div>
            <button wire:click="showAlert">Show Alert</button>
        </div>

        @if($postCreate->image)
            <img src="{{$postCreate->image->temporaryUrl()}}" alt="">

        @endif


        <form wire:submit="save" >
            <div class="mb-4">
                <x-label>Nombre</x-label>
                <x-input class="w-full"
                         wire:model.live="postCreate.title"/>

                <x-input-error for="postCreate.title"/>
            </div>

            <div>
                 <x-label>
                     Contenido
                 </x-label>
                 <x-textarea class="w-full"
                             wire:model="postCreate.content">
                 </x-textarea>

                <x-input-error for="postCreate.content"/>
            </div>

            <div class="mb-4">
                <x-label>
                    Categoria
                </x-label>

                <x-select class="w-full" wire:model.live="postCreate.category_id">

                    <option value="" disabled>
                        Seleccione una categoria
                    </option>

                    @foreach($categories as $category)
                       <option value="{{$category->id}}">
                           {{ $category->name }}</option>
                    @endforeach
                </x-select>

                <x-input-error for="postCreate.category_id"/>

            </div>

            <div class="mb-4">
                <x-label>
                    Imagen
                </x-label>

                <div
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <input type="file"
                            wire:model="postCreate.image"
                    wire:key="{{$postCreate->image_key}}"/>

                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <x-label>
                    Etiquetas
                </x-label>
                <ul>
                    @foreach($tags as $tag)
                        <li>
                            <label>
                                <x-checkbox wire:model="postCreate.tags" value="{{$tag->id}}"/>

                                    {{ $tag->name }}

                            </label>
                        </li>
                    @endforeach
                </ul>

                <x-input-error for="postCreate.tags"/>

            </div>

            <div class="flex justify-end">
                {{--<x-button wire:loading.class="opacity-25">--}}
                <x-button  class="disabled:opacity-25" wire:loading.attr="disabled">
                    Crear
                </x-button>
            </div>
        </form>

      {{--  <div wire:loading wire:target="save"> --}}{{--Este div es de carga y se activara cuando de click en el boton crear ya que hace la conexion con el metodo sab--}}{{--
            precesando ...
        </div>--}}


        <div class=" justify-between" wire:loading.delay>
            <div>
                Hola
            </div>

            <div>
                Mundo
            </div>
        </div>

    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
        @foreach($posts as $post)
            <li class="flex justify-between" wire:key="post-{{$post->id}}">
                {{ $post->title}}
                <div >
                    <x-button wire:click="edit({{$post->id}})">
                        Editar
                    </x-button>
                    <x-danger-button wire:click="destroy({{$post->id}})">
                        Eliminar
                    </x-danger-button>
                </div>
            </li>
        @endforeach
        </ul>
    </div>

{{-- //formulario de edicion--}}

    <form wire:submit="update" >
        <x-dialog-modal wire:model="postEdit.open">
            <x-slot:title>
                Actualizar Post
            </x-slot:title>

            <x-slot:content>


                    <div class="mb-4">
                        <x-label>Nombre</x-label>
                        <x-input class="w-full"
                                 wire:model="postEdit.title"/>

                        <x-input-error for="postEdit.title" />
                    </div>

                    <div>
                        <x-label>
                            Contenido
                        </x-label>
                        <x-textarea class="w-full"
                                    wire:model="postEdit.content">
                        </x-textarea>
                        <x-input-error for="postEdit.content"/>
                    </div>

                    <div class="mb-4">
                        <x-label>
                            Categoria
                        </x-label>

                        <x-select class="w-full" wire:model="postEdit.category_id">

                            <option value="" disabled>
                                Seleccione una categoria
                            </option>

                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="postEdit.category_id"/>

                    </div>

                    <div class="mb-4">
                        <x-label>
                            Etiquetas
                        </x-label>
                        <ul>
                            @foreach($tags as $tag)
                                <li>
                                    <label>
                                        <x-checkbox wire:model="postEdit.tags" value="{{$tag->id}}"/>

                                        {{ $tag->name }}

                                    </label>
                                </li>
                            @endforeach
                        </ul>
                        <x-input-error for="postEdit.tags"/>

                    </div>



            </x-slot:content>

            <x-slot:footer>
                <div class="flex justify-end">
                    <x-danger-button
                        wire:click="$set('postEdit.open',false)"
                        class="mr-2">
                        Cancelar
                    </x-danger-button>
                    <x-button>
                        Actualizar
                    </x-button>
                </div>
            </x-slot:footer>
        </x-dialog-modal>
    </form>


    @push('js')
        <script>

            document.addEventListener('livewire:initialized',function (){
            Livewire.on('post-created', function(comment){
                console.log(comment[0]);
            });
            });
        </script>
    @endpush

</div>
