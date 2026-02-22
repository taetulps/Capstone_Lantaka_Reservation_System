<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'type' => 'required|string|in:breakfast,snack,lunch,dinner',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:available,unavailable',
        ]);

        // Map HTML form names to your Database column names!
        Food::create([
            'food_name' => $request->name,
            'food_category' => $request->type,
            'food_price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Food added successfully!');
    }

    public function showFoodOptions(Request $request)
    {
        // Notice we changed groupBy to 'food_category'
        $foods = Food::where('status', 'available')
                     ->get()
                     ->groupBy('food_category'); 

        return view('client_food_options', [
            'foods' => $foods,
        ]);
    }

    public function showEmployeeFood(Request $request)
    {
        // Notice we changed groupBy to 'food_category'
        $foods = Food::all()->groupBy('food_category'); 

        return view('employee_food', [
            'foods' => $foods,
        ]);
    }
}