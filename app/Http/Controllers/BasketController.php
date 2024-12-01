<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Like;
use App\Models\Position;
use Auth;

class BasketController extends Controller
{
    public function add_basket($product_id)
    {
        // Добавление в корзину
        $status = Basket::where('user_id', Auth::user()->id)->where('positions_id', $product_id)->first();
        if ($status) {
            Basket::where('id', $status->id)->delete();
        }
        else {
            $data = [
                'user_id' => Auth::user()->id,
                'positions_id' => $product_id,
            ];
            Basket::create($data);
        }
        return redirect()->back();
    }
    public function open_basket()
    {
        // Открытие корзины
        $baskets = Basket::with('positions')->where('user_id', Auth::user()->id)->get();  
        $summ = 0; 
        foreach ($baskets as $basket) {
            foreach ($basket->positions as $position) {
                $summ += $position->price;
            }
        };
        return view('basket', ['baskets' => $baskets, 'summ' => $summ]);
    }
    public function add_liked($product_id)
    {
        // Добавление в избранное
        $status = Like::where('user_id', Auth::user()->id)->where('positions_id', $product_id)->first();
        if ($status) {
            Like::where('id', $status->id)->delete();
        }
        else {
            $data = [
                'user_id' => Auth::user()->id,
                'positions_id' => $product_id,
            ];
            Like::create($data);
        }
        return redirect()->back();
    }
    public function open_liked()
    {
        //Открытие избранных
        $likes = Like::with('positions')->where('user_id', Auth::user()->id)->get();  
        return view('favouritise', ['likes' => $likes]);
    }
}
