<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\AgeGroup;
use App\Models\PlayType;

class ProductController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('status', 'featured')
            ->where('is_active', true)
            ->with(['category', 'ageGroup'])
            ->take(10)
            ->get();
        $categories = Category::all();
        return view('pages.home', compact('featuredProducts', 'categories'));
    }

    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with(['category', 'ageGroup']);

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('age_group')) {
            $query->whereHas('ageGroup', function ($q) use ($request) {
                $q->where('slug', $request->age_group);
            });
        }

        if ($request->filled('play_type')) {
            $query->whereHas('playTypes', function ($q) use ($request) {
                $q->where('slug', $request->play_type);
            });
        }

        $products = $query->get(); // Using get() for now as paginator might need more UI work
        $categories = Category::all();
        $ageGroups = AgeGroup::all();
        $playTypes = PlayType::all();

        return view('pages.category', compact('products', 'categories', 'ageGroups', 'playTypes'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with(['category', 'ageGroup', 'playTypes'])->firstOrFail();
        return view('pages.product', compact('product'));
    }
}
