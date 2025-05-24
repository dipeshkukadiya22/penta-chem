<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

class Productpage extends Component
{
    #[Title('Product Page')]

    public $search = '';
    public $manufuturer = [];
    public $typeofchemical = [];
    public $selectedTypes = [];
    public $selectedManufacturers = [];
    public $appliedTypes = [];
    public $appliedManufacturers = [];
    public $alphaFilter = null;
    public $sortField = 'product_name';
    public $sortDirection = 'asc';
    protected $queryString = [
        'search' => ['except' => ''],
        'alphaFilter' => ['except' => null],
        'sortField' => ['except' => 'product_name'],
        'sortDirection' => ['except' => 'asc'],
    ];


    public function mount()
    {
        // Fetch distinct filter values
        $this->manufuturer = Product::select('manufacturer')->distinct()->pluck('manufacturer')->toArray();
        $this->typeofchemical = Product::select('producttype')->distinct()->pluck('producttype')->toArray();
    }

    public function applyFilters()
    {
        // Apply selected filters when the user clicks "Apply"
        $this->appliedTypes = $this->selectedTypes;
        $this->appliedManufacturers = $this->selectedManufacturers;
    }

    public function clearFilters()
    {
        $this->selectedTypes = [];
        $this->selectedManufacturers = [];
        $this->appliedTypes = [];
        $this->appliedManufacturers = [];
    }

    public function render()
    {
        $allproducts = Product::query()
            ->when($this->search, function ($query) {
                return $query->where('product_name', 'like', '%' . $this->search . '%')
                    ->orWhere('producttype', 'like', '%' . $this->search . '%')
                    ->orWhere('manufacturer', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->appliedTypes), function ($query) {
                return $query->whereIn('producttype', $this->appliedTypes);
            })
            ->when(!empty($this->appliedManufacturers), function ($query) {
                return $query->whereIn('manufacturer', $this->appliedManufacturers);
            })
            ->when($this->alphaFilter, function ($query) {
                $map = [
                    'A-B' => ['A', 'B'],
                    'C-D' => ['C', 'D'],
                    'E-G' => ['E', 'F', 'G'],
                    'H-J' => ['H', 'I', 'J'],
                    'K-L' => ['K', 'L'],
                    'M-N' => ['M', 'N'],
                    'O-P' => ['O', 'P'],
                    'Q-R' => ['Q', 'R'],
                    'S-U' => ['S', 'T', 'U'],
                    'V-Z' => range('V', 'Z'),
                ];

                $selected = $map[$this->alphaFilter] ?? [];

                return $query->where(function ($q) use ($selected) {
                    foreach ($selected as $char) {
                        $q->orWhere('product_name', 'LIKE', $char . '%');
                    }
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.productpage', compact('allproducts'));
    }
}
