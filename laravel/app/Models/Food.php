<?php 

namespace App\Models; 
use DB; 
use Validator;

class Food
{
	public static function validate($input)
	{
		$required = [
			'name' => 'required', 
			'grams' => 'required|integer',			
			'calories' => 'required|integer',
		];

		return Validator::make($input, $required);
	}

	public function getFoods()
	{
		return DB::table('foods')->get();
	}

	public function search($term)
	{
		$query = DB::table('foods')
			->select(DB::raw('foods.id, name, grams, calories, fat, cholesterol, soldium, carbohydrate, fiber, sugar, protein'));
		
		if($term && $term != "" && $term != "Search...")
		{
			$query->where('name', 'LIKE', '%'. $term .'%');
		}

		$query->orderBy('name'); 

		return $query.get();
	}

	public function insert($food)
	{
		DB::table('foods')->insert($food);
	}
}