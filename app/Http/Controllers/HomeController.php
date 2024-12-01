<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Position;
use App\Models\Basket;
use App\Models\Like;

class HomeController extends Controller
{
    public function index()
    {
        // Открытие главной страницы
        return view('welcome');
    }
    public function catalog()
    {
        // Открытие каталога
        $category = Category::get();
        $positions = Position::orderBy('created_at', 'DESC')->get();
        $basket = Basket::where('user_id', Auth::user()->id)->pluck('positions_id')->all();
        return view('catalog', ['categories' => $category, 'positions' => $positions, 'basket' => $basket]);
    }
    public function about()
    {
        
        // Открытие о нас
        return view('about');    
    }
    public function delivery()
    {
        // Открытие доставка и оплата
        return view('delivery');    
    }
    public function product($product_id)
    {
        $procut = Position::where('id', $product_id)->first();
        $basket = Basket::where('user_id', Auth::user()->id)->where('positions_id', $product_id)->first();
        $like = Like::where('user_id', Auth::user()->id)->where('positions_id', $product_id)->first();
        return view('product', ['product' => $procut, 'basket' => $basket, 'like' => $like]);
    }

    public function filter(Request $request)
    {
        // Фильтрация католога
        $categories = Category::all();
        $positions = Position::query();

        $min_value = request()->get('min_value');   
        $max_value = request()->get('max_value');

        if ($request->has('category')) {
            $positions->where('category_id', $request->category);
        }
    
        if ($request->has('type')) {
            $positions->where('metall', $request->input('type'));
        }

        $positions = $positions->orderBy('created_at', 'DESC')->get();
    
        $basket = Basket::where('user_id', Auth::user()->id)->pluck('positions_id')->all();
    
        return view('catalog', compact('categories', 'positions', 'basket'));
    }
    public function search(Request $request) {
        // Поиск
        $word = $request->word;
        $positions = Position::where('name', 'like', "%{$word}%")->orderBy('id')->get();
        $category = Category::get();
        $basket = Basket::where('user_id', Auth::user()->id)->pluck('positions_id')->all();
        return view('catalog', ['categories' => $category, 'positions' => $positions, 'basket' => $basket]);
    }
}
