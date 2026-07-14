<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->get();
        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'area' => 'required',
            'price' => 'required|numeric'
        ]);

        Listing::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'name' => $request->name,
            'detail' => $request->detail,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'area' => $request->area,
            'price' => $request->price,
        ]);

        return redirect('/')->with('success', 'Listing added successfully!');
    }

    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.show', compact('listing'));
    }

   public function category($category)
{
    $listings = Listing::whereRaw('LOWER(category) = ?', [strtolower($category)])
        ->latest()
        ->get();

    return view('listings.index', compact('listings'));
}

public function city($city)
{
    $listings = Listing::whereRaw('LOWER(city) = ?', [strtolower($city)])
        ->latest()
        ->get();

    return view('listings.index', compact('listings'));
}

public function cityCategory($city, $category)
{
    $listings = Listing::whereRaw('LOWER(city) = ?', [strtolower($city)])
        ->whereRaw('LOWER(category) = ?', [strtolower($category)])
        ->latest()
        ->get();

    return view('listings.index', compact('listings'));
}
public function myListings()
{
    $listings = Listing::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('listings.index', compact('listings'));
}
}