<?php 

namespace App\Http\Controllers; 

use \App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
	public function onStart()
	{
		$foods = (new Food())->getFoods();

		return view('home_page', [
			'foods' => $foods
		]);
	}

	public function add_food(Request $request)
	{
		$FoodEntry = new Food();

		if($request->all())
		{
			$validator = $FoodEntry->validate($request->all()); 
			if($validator->passes())
			{
				$FoodEntry->insert([
					'name' => $request->input('name'), 
					'grams' => $request->input('grams'), 
					'calories' => $request->input('calories'),
					'fat' => $request->input('fat'),
					'cholesterol' => $request->input('cholesterol'),
					'sodium' => $request->input('sodium'),
					'carbohydrate' => $request->input('carbohydrate'),
					'fiber' => $request->input('fiber'),
					'sugar' => $request->input('sugar'),
					'protein' => $request->input('protein'),
				]);

				return redirect('add_food')
						->with('success', '"' . $FoodEntry->name . '" inserted successfully.');
			}

			//return redirect()

		}
		
	}
}