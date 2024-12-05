@extends('layouts.master')

@section('title', 'Register Page')

@section('overlay')
    <section class="header-overlay w-2/3 mx-auto" style="top:72%;">
        <div class="w-full rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-white mb-6">Register</h2>

            <!-- Register Form -->
            <!-- Register Form -->
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-white">Name</label>
                    <input type="text" id="name" name="name"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-400 focus:border-orange-400"
                           value="{{ old('name') }}" required>
                    @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-white">Email</label>
                    <input type="email" id="email" name="email"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-400 focus:border-orange-400"
                           value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full px-4 py-2 text-white bg-orange-400 rounded-md hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        Register
                    </button>
                </div>
            </form>


            <!-- Login Link -->
            <p class="mt-6 text-sm text-center text-white">
                Already have an account?
                <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Login</a>
            </p>
        </div>
    </section>
@endsection
