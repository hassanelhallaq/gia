<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities($countryId)
    {
        // Assuming you have a City model and a relationship with the Country model
        $cities = City::where('country_id', $countryId)->get();
        return response()->json($cities);
    }
}
