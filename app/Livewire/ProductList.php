<?php

namespace App\Livewire;
use Livewire\Component; // ✅ for Livewire v3

use App\Models\Product;


class ProductList extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        // MongoDB 
        $filtered = Product::raw(function ($collection) {
            return $collection->find([
                'name' => ['$regex' => $this->search, '$options' => 'i']
            ]);
        });
        

        return view('livewire.product-list', [
            'products' => collect($filtered)->values()
        ]);
    }
}





