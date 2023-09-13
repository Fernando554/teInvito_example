<?php

namespace App\Http\Livewire;

use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;
use Livewire\Component;
use Livewire\WithFileUploads;

class HeaderSection extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $link;
    public $linkText;
    public $Image;
    public $isEditing = true;



    public function mount($data = null)
    {
        $this->title = "Título";
        $this->body = "Contenido actual del encabezado";
        $this->link = "https://www.google.com";
        $this->linkText = "Texto del enlace";
        $this->Image = "https://picsum.photos/200/300";

        if ($data) {
            $this->title =  $data['title'];
            $this->body = $data['body'];
            $this->link = $data['link'];
            $this->linkText = $data['linkText'];
            $this->Image = $data['Image'];
            $this->isEditing = false;
        }
    }

    public function render()
    {
        return view('livewire.header-section');
    }

    public function toggleEditMode()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveChanges()
    {
        $this->saveComponentData();
    }

    public function saveComponentData()
    {
        $component = ModelsComponent::firstOrCreate([
            'name' => 'header-section',
            'model_type' => 'header-section', // Asegúrate de ajustar la ruta correcta
        ]);
        //se buscara la ultima invitacion creada por el usuario
        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;

        if ($this->Image) {
            $imagePath = $this->Image->store('public/images');
            // $imageURL = asset('storage/' . $imagePath);
    
            // // Quita la parte del servidor local de la URL
            // $imageURL = str_replace(url('/'), '', $imageURL);
    
            $this->Image = $imagePath;
        }else{
            $this->Image = "https://picsum.photos/200/300";
        }

        $this->componentData = [
            'title' => $this->title,
            'body' => $this->body,
            'link' => $this->link,
            'linkText' => $this->linkText,
            'Image' => $this->Image,
        ];
        // Luego, guarda la información en la tabla 'component_data'
        foreach ($this->componentData as $key => $body) {
            ComponentData::create([
                'key' => $key,
                'value' => $body,
                'invitation_id' => $invitationId,
                'component_id' => $component->id,
            ]);
        }

    }
}
