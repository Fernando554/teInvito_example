<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Footersection extends Component
{
    use WithFileUploads;
    public $title1 = "Título 1";
    public $title2 = "Título 2";
    public $buttonText = "Suscríbete";
    public $imageSrc = "https://picsum.photos/200/300";
    public $text = "Texto descriptivo.";
    public $days = '00';
    public $hours = '00';
    public $minutes = '00';
    public $seconds = '00';
    public $editing = true;
    public $newImage;

    public function render()
    {
        return view('livewire.footersection');
    }
    public function toggleEditing()
    {
        $this->editing = !$this->editing;
    }

    public function updateTitle1($newTitle)
    {
        $this->title1 = $newTitle;
    }

    public function updateTitle2($newTitle)
    {
        $this->title2 = $newTitle;
    }

    public function updateButtonText($newText)
    {
        $this->buttonText = $newText;
    }

    public function updateImageSrc($newImageSrc)
    {
        $this->imageSrc = $newImageSrc;
    }

    public function updateText($newText)
    {
        $this->text = $newText;
    }

    public function updateDays($newDays)
    {
        $this->days = $newDays;
    }

    public function updateHours($newHours)
    {
        $this->hours = $newHours;
    }

    public function updateMinutes($newMinutes)
    {
        $this->minutes = $newMinutes;
    }

    public function updateSeconds($newSeconds)
    {
        $this->seconds = $newSeconds;
    }

    public function updateImage()
    {
        if ($this->newImage) {
            // Guardar la nueva imagen en el servidor y actualizar la ruta en $imageSrc
            $this->imageSrc = $this->newImage->store('public/images');
        }
    }
    
    public function previewImage()
    {
        return $this->newImage
            ? $this->newImage->temporaryUrl()
            : asset('storage/' . $this->imageSrc);
    }
}
