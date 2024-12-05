<!-- Header -->
<header class="bg-black shadow relative">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="logo-text text-orange-400 font-satisfy">Uni Selector</a>
        <nav class="flex items-center space-x-6">
            <a href="#about" class="text-white hover:text-orange-600">Contact Us</a>
            <a href="#services" class="text-white hover:text-orange-600">About</a>
            <a href="#contact" class="text-white hover:text-orange-600">Services</a>
            @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-400">Logout</button>
                </form>
            @else
            <a href="/login" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-400">Login</a>
            @endif
        </nav>
    </div>

    <div class="relative w-full h-64">
        <img src="{{ asset('assets/images/header.jfif') }}" alt="Header Image" class="w-full h-full object-cover opacity-30" >
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black bg-opacity-40">
            @if(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_ADMIN)
                <a href="{{ route('admin.dashboard') }}">
                    <h1 class="text-4xl font-bold header-font font-spinnaker">
                        <span class="text-orange-400">Admin</span> Dashboard
                    </h1>
                </a>

                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('backend.universities.index') }}" class="bg-orange-400 text-white px-6 py-2 rounded-md shadow-md hover:bg-orange-500">
                        Universities
                    </a>
                    <a href="{{ route('backend.degree-programs.index') }}" class="bg-orange-400 text-white px-6 py-2 rounded-md shadow-md hover:bg-orange-500">
                        Degree Programs
                    </a>
                </div>
            @elseif(auth()->check() && auth()->user()->role === \App\Models\User::ROLE_USER)
                <a href="{{ route('user.dashboard') }}">
                    <h1 class="text-4xl font-bold header-font font-spinnaker">
                        <span class="text-orange-400">User</span> Dashboard
                    </h1>
                </a>
            @else`
                <h1 class="text-4xl font-bold header-font font-spinnaker"><span class="text-orange-400">Find</span> best university</h1>
                <h1 class="text-4xl font-bold header-font font-spinnaker">for your <span class="text-orange-400">Future</span></h1>
            @endif
        </div>
    </div>
</header>
