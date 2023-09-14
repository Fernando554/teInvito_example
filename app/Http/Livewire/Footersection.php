<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\component as ModelsComponent;
use App\Models\componentData;
use App\Models\invitation;

class Footersection extends Component
{
    use WithFileUploads;

    public $title1;
    public $title2;
    public $image;
    public $text;
    public $days;
    public $hours;
    public $minutes;
    public $seconds;
    public $editing = true;
    public $newImage = [];
    public $link;
    public $linkText;
    public $isEditing = true;
    public $componentId;
    protected $listeners = ['saveComponents' => 'saveFooterSection'];



    public function mount($data = null, $id = null)
    {
        $this->title1 = "Título Princilpal";
        $this->title2 = "Sub Titulo";
        $this->image = "imagen.jpg";
        $this->text = "Texto";
        $this->days = "Días";
        $this->hours = "Horas";
        $this->minutes = "Minutos";
        $this->seconds = "Segundos";
        $this->link = "https://www.google.com";
        $this->linkText = "Texto del Link";
        
        // Si se proporcionan datos en $data, sobrescribe solo los primeros 3 elementos.
        if ($data) {
            $this->title1 = $data['title1'];
            $this->title2 = $data['title2'];
            $this->buttonText = $data['buttonText'];
            $this->image = $data['image'];
            $this->text = $data['text'];
            $this->days = $data['days'];
            $this->hours = $data['hours'];
            $this->minutes = $data['minutes'];
            $this->seconds = $data['seconds'];
            $this->editing = false;
        }

        if ($id) {
            $this->componentId = $id;
        }
    }

    public function render()
    {
        return view('livewire.footersection');
    }

    public function updateImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // Puedes ajustar las reglas de validación según tus necesidades.
        ]);
    
        $this->image = $value;
    }

    public function updateImageSrc($newImageSrc)
    {
        $this->imageSrc = $newImageSrc;
    }

    
    public function previewImage($index)
    {
        return isset($this->newImage[$index])
            ? $this->newImage[$index]->temporaryUrl()
            : asset('storage/' . $this->imageSrc[$index]);
    }

    public function toggleEdit($index)
    {
        $this->isEditing = !$this->isEditing;
    }

    public function saveFooterSection()
    {
        $this->saveComponentData();
    }

    public function addImage()
    {
        $this->newImages[] = null;
    }

    public function saveComponentData()
    {
        $component = ModelsComponent::firstOrCreate([
            'name' => 'footer-section', 
            'model_type' => 'footer-section', // Asegúrate de ajustar la ruta correcta
        ]);
        $invitation = Invitation::where('user_id', auth()->id())->latest()->first();
        $invitationId = $invitation->id;
        $this->componentData = [
            'title1' => $this->title1,
            'title2' => $this->title2,
            'image' => $this->image,
            'text' => $this->text,
            'days' => $this->days,
            'hours' => $this->hours,
            'minutes' => $this->minutes,
            'seconds' => $this->seconds,
            'link' => $this->link,
            'linkText' => $this->linkText,
        ];
        foreach ($this->componentData as $key => $body) {
            ComponentData::create([
                'key' => $key,
                'value' => $body,
                'invitation_id' => $invitationId,
                'component_id' => $component->id,
            ]);
        }

        return back();
    }
}
