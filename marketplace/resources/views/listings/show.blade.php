<x-app-layout>

    <div class="max-w-5xl mx-auto p-6">

        <a href="{{ url('/') }}"
           class="text-blue-600 hover:underline">
            ← Back to Listings
        </a>

        <div class="bg-white shadow-lg rounded-lg mt-6 p-8">

            <h1 class="text-4xl font-bold mb-6">
                {{ $listing->name }}
            </h1>

            <h2 class="text-3xl text-green-600 font-bold mb-6">
                ₹{{ number_format($listing->price,2) }}
            </h2>

            <p class="mb-6">
                {{ $listing->detail }}
            </p>

            <hr class="my-6">

            <p><strong>Type:</strong> {{ $listing->type }}</p>

            <p><strong>Category:</strong> {{ $listing->category }}</p>

            <p><strong>Subcategory:</strong> {{ $listing->subcategory }}</p>

            <p><strong>Country:</strong> {{ $listing->country }}</p>

            <p><strong>State:</strong> {{ $listing->state }}</p>

            <p><strong>City:</strong> {{ $listing->city }}</p>

            <p><strong>Area:</strong> {{ $listing->area }}</p>

            <p class="mt-6">
                <strong>Posted By:</strong>

                {{ $listing->user->name }}
            </p>

        </div>

    </div>

</x-app-layout>