<?php 

namespace App\Services; 
use Illuminate\Support\Facades\Cache; 

class FatSecret
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
			$url = "http://api.esha.com/analysis?apikey=au6mk7grt7cuu6umg48n5wmw&query=$food_name"
			$jsonString = file_get_contents($url); 
			$data = json_decode($jsonString, true); 
			$food_data = NULL; 

			foreach($data[''])

		}
	}
}