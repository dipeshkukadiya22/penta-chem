<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class AboutUS extends Component
{
    #[Title('About US')] 
    public function render()
    {
        return view('livewire.about-u-s');
    }
}
