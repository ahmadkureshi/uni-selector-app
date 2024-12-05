@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <!-- Header -->
        <h1 class="text-3xl font-semibold text-orange-400">
            Universities
        </h1>

        <!-- Add Button -->
        <div class="flex justify-between items-center mt-6">
            <h2 class="text-xl font-semibold text-white">
                Universities
            </h2>
            <a href="{{ route('backend.universities.create') }}" class="bg-orange-400 text-white px-4 py-2 rounded shadow hover:bg-orange-500">
                Add New University
            </a>
        </div>

        <!-- Universities Table -->
        <div class="mt-4 bg-black rounded shadow-md overflow-hidden">
            <table class="min-w-full text-sm text-gray-300">
                <thead class="bg-orange-400 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">#</th>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">City</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($universities as $university)
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="py-2 px-4">{{ $university->id }}</td>
                        <td class="py-2 px-4">{{ $university->name }}</td>
                        <td class="py-2 px-4">{{ $university->email }}</td>
                        <td class="py-2 px-4">{{ $university->city }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="{{ route('backend.universities.edit', $university->id) }}" class="text-blue-400 hover:text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('backend.universities.destroy', $university->id) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-2 px-4 text-center text-gray-400">No universities found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $universities->links('pagination::tailwind') }}
        </div>
    </div>

@endsection
