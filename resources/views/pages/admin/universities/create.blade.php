@extends('layouts.master')

@section('title', 'Add New University')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-orange-400">Add New University</h1>

        {{-- Add University --}}
        <div class="mt-6 bg-black rounded shadow-md p-6">
            <form action="{{ route('backend.universities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-white text-sm font-semibold">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-white text-sm font-semibold">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-white text-sm font-semibold">Address</label>
                    <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="block text-white text-sm font-semibold">City</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('city') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 mr-4">
                        Cancel
                    </a>
                    <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded shadow hover:bg-orange-500">
                        Add University
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
