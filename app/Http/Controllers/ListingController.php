<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Listing::query();
        $filters = $request->only(['areaFrom', 'areaTo', 'beds', 'baths', 'priceFrom', 'priceTo']);
        if ($filters['priceFrom'] ?? false) $query->where('price', '>=', $filters['priceFrom']);
        if ($filters['priceTo'] ?? false) $query->where('price', '<=', $filters['priceTo']);
        if ($filters['beds'] ?? false) $query->where('beds', $filters['beds']);
        if ($filters['baths'] ?? false) $query->where('baths', $filters['baths']);
        if ($filters['areaFrom'] ?? false) $query->where('area', '>=', $filters['areaFrom']);
        if ($filters['areaTo'] ?? false) $query->where('area', '<=', $filters['areaTo']);
        $listings = $query->orderByDesc('created_at')->paginate(10);
        return inertia('Listing/Index', [
            'filters' => $request->only(['areaFrom', 'areaTo', 'beds', 'baths', 'priceFrom', 'priceTo']),
            'listings' => $listings
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Listing::create([
            ...$request->all(),
            ...$request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:2000000',
            ])
        ]);
        return redirect()->route('listings.index')
            ->with('success', 'Listing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        if (!$this->authorize('view', $listing)) {
            abort(403);
        }
        return inertia('Listing/Show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        if (!$this->authorize('update', $listing)) {
            abort(403);
        }
        return inertia('Listing/Edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        if (!$this->authorize('update', $listing)) {
            abort(403);
        }
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:2000000',
            ])
        );
        return redirect()->route('listings.index')
            ->with('success', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        if (!$this->authorize('delete', $listing)) {
            abort(403);
        }
        $listing->delete();
        return redirect()->back()
            ->with('success', 'Listing deleted successfully');
    }
}
