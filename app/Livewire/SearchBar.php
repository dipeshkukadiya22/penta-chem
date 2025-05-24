<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class SearchBar extends Component
{
    public $search = '';
    public $results = [];

    public function updatedSearch()
    {
        if (!empty($this->search)) {
            $this->results = Product::where('product_name', 'like', '%' . $this->search . '%')
                ->orWhere('producttype', 'like', '%' . $this->search . '%')
                ->orWhere('manufacturer', 'like', '%' . $this->search . '%')
                ->limit(10)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
