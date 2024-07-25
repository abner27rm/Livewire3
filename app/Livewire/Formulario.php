<?php

namespace App\Livewire;

use App\Livewire\Forms\PostCreateForm;
use App\Livewire\Forms\PostEditForm;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

/* #[lazy] coloco esto si siempre quiero que el componente se cargue en carga lenta, ahora si solo quiero en una vista
en especifico lo hago cuando llamo al componente*/

class Formulario extends Component
{

   
    use WithFileUploads;


    public $categories,$tags;


    public PostCreateForm $postCreate; //estamos instanceando a la postcreateform
    public PostEditForm $postEdit;
    public $posts;






    /*
    #[Rule([
        'postCreate.title'=>'required',
        'postCreate.category_id'=>'required|exists:categories,id',
        'postCreate.content'=>'required',
        'postCreate.tags'=>'required|array',

    ],[
        'postCreate.tags.required'=>'El tags es requerido',// ACA EN EL SEGUNDO ARRAY EDITO EL MENSAJE
    ],[
        'postCreate.title'=>'TITULO',  //ACA EDITO EL NOMBRE DE LA PROPIEDAD PARA QUE APAREZCA EN EL MENSAJE
    ])]*/


    //cliclo de vida del componente
    public function mount(){
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->posts = Post::all();
    }

    /*public function test (){
    //proceso cuando se esta actualizando
    public function updating($property, $value){
        if ($property == "postCreate.category_id") {
            if($value >3){
                throw new \Exception("No puedes hacer esta categoria");
            }
        }
    }

    //Proceso cuando ya se actulizo
    public function updated($property, $value){

    }

    //hydrate es cuando agarro los objetos o colecciones de datos los convierto en formato json y lo mando al fronted
    public function hydrate(){
    }
    // Esto es lo contrario ya que recibo el json
    public function dehydate(){
    }

}*/

    public function save(){

      /*  $post=Post::create([
            'title'=>$this->title,
            'content'=>$this->content,
            'category_id'=>$this->category_id,
        ]);*/

       /* $this->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required|exists:categories,id',
            'selectedTags'=>'required|array'
        ],[
            'title.required'=>'El titulo es rsssequerido', //editar el mensaje que nos enviaraq
        ],
        [
            'categori_id'=>'Categoriaassssa',//cambiar el nombre al campo
        ]);*/

        $this->postCreate->save();
        $this->posts = Post::all();

        $this->dispatch('post-created','articulo creado');
    }

    

    public function edit ($postId){

        $this->resetValidation();
        $this->postEdit->edit($postId); //usando form objects
    }

    public function update(){

        $this->postEdit->update();
        $this->posts = Post::all();

        // $this->dispatch('post-created','articulo actualizado','success');
        $this->dispatch(
            'alert',
            type:'success',
            title: 'Se ha creado correctamente',
            position: 'center',
            timer:1500,
        );


    }

    public function destroy($postId){
        $post=Post::find($postId)->delete();
        $this->posts = Post::all();

        $this->dispatch('post-created','articulo eliminado');

    }

 /*   public function placeholder() lo comente porque lo puese por defaul en config/livewire/placeholder_lazy
    {
        return view('livewire.placeholders.skeleton');

    }*/

    public function render()
    {
        return view('livewire.formulario');
    }
}
