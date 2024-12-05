@extends('layouts.master')

@section('title', 'Forgot Password')

@section('overlay')
    <section class="header-overlay w-2/3 mx-auto" style="top:55%;">
        <div class="w-full rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center text-white mb-6">Forgot Password</h2>

            <!-- Forgot Password Form -->
            <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600 text-center">
                        {{ session('status') }}
                    </div>
                @endif

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
                        Email Password Reset Link
                    </button>
                </div>
            </form>

            <!-- Back to Login Link -->
            <p class="mt-6 text-sm text-center text-white">
                Remember your password?
                <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Login</a>
            </p>
        </div>
    </section>
@endsection
