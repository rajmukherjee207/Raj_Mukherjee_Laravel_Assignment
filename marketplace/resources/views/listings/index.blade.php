<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Marketplace Listings</h1>

            @auth
                <a href="{{ route('listing.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Listing
                </a>
            @endauth
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @forelse($listings as $listing)

            <div class="bg-white rounded-lg shadow-md border p-6 mb-6">

                <div class="flex justify-between">

                    <div>

                        <h2 class="text-2xl font-bold mb-2">
                            {{ $listing->name }}
                        </h2>

                        <p class="text-gray-600 mb-3">
                            {{ $listing->detail }}
                        </p>

                        <p><strong>Type:</strong> {{ $listing->type }}</p>

                        <p><strong>Category:</strong><a href="{{ route('listing.category', $listing->category) }}class="text-blue-600 hover:underline">{{ $listing->category }}</a></p>

                        <p><strong>Subcategory:</strong> {{ $listing->subcategory }}</p>

                        <p><strong>Location:</strong>

{{ $listing->area }},

<a href="{{ route('listing.city', $listing->city) }}"
   class="text-blue-600 hover:underline">
    {{ $listing->city }}
</a>,

{{ $listing->state }},
{{ $listing->country }}</p>

                    </div>

                    <div class="text-right">

                        <h2 class="text-3xl font-bold text-green-600 mb-4">
                            ₹{{ number_format($listing->price,2) }}
                        </h2>

                        <a href="{{ url('/listing/'.$listing->id) }}"
                           class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                            View Details
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-yellow-100 border border-yellow-400 p-4 rounded">
                No listings found.
            </div>

        @endforelse

    </div>
</x-app-layout>