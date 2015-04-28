<?php 

namespace App\Services; 
use Illuminate\Support\Facades\Cache; 

class UsdaAPI
{
	public static function search($food_name)
	{ 
		$food = urlencode($food_name); 

		if(Cache::has("fatsecret-$food_name"))
		{
			$food_data = Cache::get("fatsecret-$food_name");
		}
		else
		{
			$url = "http://api.nal.usda.gov/usda/ndb/search/?format=json&q=$food_name&sort=n&max=25&offset=0&api_key=8nKpLOO5sTzx31IAnbuxaAlqcgV8r9m7g4jj0aTg";
			$jsonString = file_get_contents($url); 
			$data = json_decode($jsonString, true); 
			$food_data = $data['list']['item'];

			return $food_data;

		}
	}
}