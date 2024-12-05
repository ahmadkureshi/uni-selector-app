@extends('layouts.master')

@section('title', 'Home Page')

@section('overlay')
    @include('pages.partials.merit-finder')
@endsection

@section('content')
    <h2 class="text-3xl font-bold mb-8">Explore Universities</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($universities as $index => $university)
            @php
                // assign images in sequence (1 to 6)
                $imageIndex = ($index % 6) + 1;

                $url = route('merit.for', $university->id);

                $queryParams = request()->only(['total_marks', 'your_marks', 'city']);

                // adding the query params to the link
                if (!empty($queryParams)) {
                    $url .= '?' . http_build_query($queryParams);
                }
            @endphp
            <a href="{{ $url }}" class="bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg block">
                <img src="{{ asset('assets/images/uni/uni' . $imageIndex . '.jpeg') }}" alt="{{ $university->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-bold">{{ $university->name }}</h3>
                    <p class="text-gray-400">{{ $university->degree_programs_count }} results found</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
