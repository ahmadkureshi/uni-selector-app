@extends('layouts.master')

@section('title', 'Merit For: ' . $university->name)

@section('overlay')
    @include('pages.partials.merit-finder')
@endsection

@section('content')
    <div class="container mx-auto px-6 py-8 text-white">
        <!-- University Header -->
        <div class="flex flex-col md:flex-row items-start md:items-center mb-8">
            <!-- University Image -->
            <div class="w-full">
                <img src="{{ asset('assets/images/uni/uni' . (($university->id % 6) + 1) . '.jpeg') }}" alt="{{ $university->name }}" class="rounded-lg shadow-md w-full h-60 object-cover">
            </div>

            <!-- University Details -->
            <div class="w-full md:ml-6 text-gray-300">
                <h1 class="text-3xl font-bold mb-4">{{ $university->name }}</h1>
                <p><strong>Admission Info:</strong> {{ $university->phone }}</p>
                <p><strong>Registrar Office:</strong> {{ $university->phone }}</p>
                <p><strong>Email:</strong> {{ $university->email }}</p>
                <p><strong>Address:</strong> {{ $university->address }}</p>
                <p><strong>City:</strong> {{ $university->city }}</p>
            </div>
        </div>


        <!-- High Chances Section -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold header-font font-spinnaker mb-6"><span class="text-orange-400">High </span> Chances</h2>
            <div class="bg-black rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full text-sm text-gray-300">
                    <thead class="bg-orange-400 text-white">
                    <tr>
                        <th class="py-2 px-4 text-left">Degree</th>
                        <th class="py-2 px-4 text-left">Last Year Merit</th>
                        <th class="py-2 px-4 text-left">Your Merit</th>
                        <th class="py-2 px-4 text-left">Difference</th>
                        <th class="py-2 px-4 text-left">Fee</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($highChances as $program)
                        <tr class="border-b border-gray-700">
                            <td class="py-2 px-4">{{ $program->title }}</td>
                            <td class="py-2 px-4">{{ $program->last_year_merit }}</td>
                            <td class="py-2 px-4">{{ $userMarks ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $userMarks !== null ? $userMarks - $program->last_year_merit : '-' }}</td>
                            <td class="py-2 px-4">{{ $program->fee }} RS</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500">No high chances programs available.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Low Chances Section -->
        <div class="mb-8">
            <h2 class="text-4xl font-bold header-font font-spinnaker mb-6"><span class="text-orange-400">Low</span> Chances</h2>
            <div class="bg-black rounded-lg shadow-md overflow-hidden">
                <table class="min-w-full text-sm text-gray-300">
                    <thead class="bg-orange-400 text-white">

                        <tr>
                            <th class="py-2 px-4 text-left">Degree</th>
                            <th class="py-2 px-4 text-left">Last Year Merit</th>
                            <th class="py-2 px-4 text-left">Your Merit</th>
                            <th class="py-2 px-4 text-left">Difference</th>
                            <th class="py-2 px-4 text-left">Fee</th>
                        </tr>

                    </thead>

                    <tbody>
                    @forelse ($lowChances as $program)

                        <tr class="border-b border-gray-700">
                            <td class="py-2 px-4">{{ $program->title }}</td>
                            <td class="py-2 px-4">{{ $program->last_year_merit }}</td>
                            <td class="py-2 px-4">{{ $userMarks ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $userMarks !== null ? $userMarks - $program->last_year_merit : '-' }}</td>
                            <td class="py-2 px-4">{{ $program->fee }} RS</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500">No low chances programs available.</td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
