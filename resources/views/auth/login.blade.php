@extends('layouts.master')

@section('title', 'Login Page')

@section('overlay')
    <section class="header-overlay w-2/3 mx-auto" style="top:65%;">
        <div class="w-full rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-white mb-6">Login</h2>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

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

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-white">Password</label>
                    <input type="password" id="password" name="password"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-400 focus:border-orange-400"
                           required>
                    @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                               class="h-4 w-4 text-orange-400 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-white">Remember Me</label>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-400 hover:underline">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full px-4 py-2 text-white bg-orange-400 rounded-md hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-400">
                        Login
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mt-6 text-sm text-center text-white">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-orange-400 hover:underline">Register</a>
            </p>
        </div>
    </section>
@endsection
