<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    const PAGINATION_COUNT = 50;
    
    /**
     * @param  null  $slug
     * @return Factory|View
     */
    public function index($slug = null)
    {
        $categories = Category::with('products')->get();
        $products = Product::with('category');
        
        if ($slug) {
            $products = $products->whereHas('category', function ($query) use ($slug) {
                return $query->where('slug', $slug);
            });
        }
        $products = $products->paginate(self::PAGINATION_COUNT);
        
        return view('home', compact('products', 'categories'));
    }
}
