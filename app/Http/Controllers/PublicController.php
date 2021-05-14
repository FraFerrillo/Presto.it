<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $ads = Ad::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->take(6)->get();
        return view('welcome', compact('ads'));
    }
    public function search(Request $request)
    {
        $q = $request->input('q');

        $ads = Ad::search($q)->get();
        return view('ads.search_results', compact('q','ads'));
    }
    public function adByCategory($name, $category_id)
    {
        $category = Category::find($category_id);
        $ads = $category
        ->ads()
        ->where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view ('ads.show_categories', compact('category', 'ads'));
    }
}


