<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductCard extends Component
{
    
    public Product $product;

    
    public function __construct(Product $productJson)
    {
        $this->product = $productJson;
    }

    
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
