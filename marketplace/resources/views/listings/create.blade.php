<x-app-layout>
    <div class="container mx-auto p-6">

        <h2 class="text-3xl font-bold mb-6">Add Product / Service</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('listing.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Type</label>
                <select name="type" class="w-full border rounded p-2">
                    <option value="">Select</option>
                    <option value="Product">Product</option>
                    <option value="Service">Service</option>
                </select>
            </div>

            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Detail</label>
                <textarea name="detail" class="w-full border rounded p-2"></textarea>
            </div>

            <div class="mb-4">
                <label>Category</label>
                <input type="text" name="category" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Subcategory</label>
                <input type="text" name="subcategory" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Country</label>
                <input type="text" name="country" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>State</label>
                <input type="text" name="state" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>City</label>
                <input type="text" name="city" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Area</label>
                <input type="text" name="area" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label>Price</label>
                <input type="number" name="price" class="w-full border rounded p-2">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Save Listing
            </button>

        </form>

    </div>
</x-app-layout>