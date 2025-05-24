<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

class Internationalpage extends Component
{
    #[Title('International')] 
    public function render()
    {
        return view('livewire.internationalpage');
    }
}
