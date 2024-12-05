@extends('layouts.master')

@section('title', 'Edit Degree Program')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-orange-400">Edit Degree Program</h1>

        {{-- Edit University --}}
        <div class="mt-6 bg-black rounded shadow-md p-6">
            <form action="{{ route('backend.degree-programs.update', $degreeProgram->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="university_id" class="block text-white text-sm font-semibold">University</label>
                    <select name="university_id" id="university_id" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="">Select University</option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}" {{ old('university_id', $degreeProgram->university_id) == $university->id ? 'selected' : '' }}>
                                {{ $university->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('university_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-white text-sm font-semibold">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $degreeProgram->title) }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('title') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="last_year_merit" class="block text-white text-sm font-semibold">Last Year Merit</label>
                    <input type="number" name="last_year_merit" id="last_year_merit" value="{{ old('last_year_merit', $degreeProgram->last_year_merit) }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('last_year_merit') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="fee" class="block text-white text-sm font-semibold">Fee</label>
                    <input type="number" name="fee" id="fee" value="{{ old('fee', $degreeProgram->fee) }}" class="mt-2 w-full p-2 border rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @error('fee') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('backend.degree-programs.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700 mr-4">
                        Cancel
                    </a>
                    <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded shadow hover:bg-orange-500">
                        Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
