<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Requests\PlacePostRequest;
use App\Http\Requests\PlacePutRequest;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    public function list()
    {
        $places = Place::paginate(5);

        return response()->json([
            'places' => $places
        ]);
    }

    public function search(Request $request)
    {
        $places = Place::where('name', 'like', '%' . $request->name . '%')->paginate(10);
        return response()->json(['places' => $places]);
    }

    public function store(PlacePostRequest $request)
    {
        $newPlace = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'city' => $request->city,
            'state' => $request->state
        ];

        Place::create($newPlace);

        return response()->json([
            'newPlace' => $newPlace
        ]);
    }

    public function show($slug)
    {
        $place = Place::where('slug', $slug)->first();

        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        return response()->json([
            'place' => $place
        ]);
    }

    public function update(PlacePutRequest $request, $slug)
    {
        $place = Place::where('slug', $slug)->first();

        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        $newPlace = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'city' => $request->city,
            'state' => $request->state
        ];

        $place->update($newPlace);

        return response()->json([
            'place' => $place
        ]);
    }
}
