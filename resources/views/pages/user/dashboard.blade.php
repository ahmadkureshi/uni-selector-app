@extends('layouts.master')

@section('title', 'User Dashboard')


@section('content')
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Universities -->
        <div class="bg-orange-400 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">{{ $totalUniversities }}</h2>
            <p class="text-black">Total Universities</p>
        </div>

        <!-- Total Programs -->
        <div class="bg-black text-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold">{{ $totalPrograms }}</h2>
            <p class="text-gray-400">Total Degree Programs</p>
        </div>
    </div>
@endsection
