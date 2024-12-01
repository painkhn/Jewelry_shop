<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Position;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        // Открытие админки
        $category = Category::get();
        $newUsers = User::where('created_at', '>=', now()->subDays(7))
                        ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->groupBy('date')
                        ->get();
        $dates = $newUsers->pluck('date')->toArray();
        $counts = $newUsers->pluck('count')->toArray();
    
        return view('admin', [
            'categories' => $category,
            'dates' => $dates,
            'counts' => $counts
        ]);
    }
    public function add_category(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        return redirect(route('Admin'));
    }
    public function new_position(Request $request) 
    {
        // Добавление нового товара
        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required',
            'price' => 'required|integer',
            'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048',
            'metall' => 'required|string',
            'inserts' => 'required|string',
            'insert_weight' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
    
        // Сохранение фото
        $name = time(). "." . $request->photo->extension();
        $destination = 'public/products';
        $path = $request->photo->storeAs($destination, $name);
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'photo' => 'storage/products/' . $name,
            'metall' => $request->metall,
            'inserts' => $request->inserts,
            'insert_weight' => $request->insert_weight,
            'weight' => $request->weight,

        ];
        Position::create($data);

        return redirect()->back();
    }
    public function delete_position($product_id)
    {
        // Удаление товара
        $position = Position::where('id', $product_id)->first();
        if ($position->photo) {
            File::delete(public_path($position->photo));
        }
        Position::where('id', $product_id)->delete();
        return redirect()->route('catalog');
    }
    public function edit_position($position_id) 
    {
        // Редактирование товара
        $positio = Position::where('id', $position_id)->first();
        return view('edit_product', ['position' => $positio]);
    }
    public function save_edit_position($position_id, Request $request)
    {
        // Сохранение редактирования товара
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'metall' => 'required|string',
            'inserts' => 'required|string',
            'insert_weight' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
        
        $position = Position::find($position_id);
    
        $position->name = $validated['name'];
        $position->price = $validated['price'];
        $position->metall = $validated['metall'];
        $position->inserts = $validated['inserts'];
        $position->insert_weight = $validated['insert_weight'];
        $position->weight = $validated['weight'];
    
        $position->save();

        return redirect()->back();
    }
}

