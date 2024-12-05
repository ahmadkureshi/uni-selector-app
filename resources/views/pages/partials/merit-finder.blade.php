<!-- Overlay For Merit Finder -->
<section class="header-overlay w-2/3 mx-auto">
    <div class="text-white">
        @if(Route::is('merit.for'))
            <h2 class="text-4xl font-bold header-font font-spinnaker"><span class="text-orange-400">{{ ucwords($university->name) ?? 'University' }}</span></h2>
        @else
            <h2 class="text-4xl font-bold header-font font-spinnaker"><span class="text-orange-400">Merit</span> Finder</h2>
            <form action="#" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                <!-- Your Marks -->
                <div class="flex flex-col">
                    <label for="your-marks" class="mb-1 text-lg text-white">Your marks</label>
                    <input
                        type="text"
                        id="your-marks"
                        name="your_marks"
                        value="{{ request('your_marks') }}"
                        class="px-4 py-2 rounded border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    >
                </div>

                <!-- Total Marks -->
                <div class="flex flex-col">
                    <label for="total-marks" class="mb-1 text-lg text-white">Total marks</label>
                    <input
                        type="text"
                        id="total-marks"
                        name="total_marks"
                        value="{{ request('total_marks') }}"
                        class="px-4 py-2 rounded border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    >
                </div>

                <!-- City -->
                <div class="flex flex-col">
                    <label for="city" class="mb-1 text-lg text-white">City</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        value="{{ request('city') }}"
                        class="px-4 py-2 rounded border border-gray-300 text-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    >
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col">
                    <label class="invisible mb-1 text-lg">&nbsp;</label>
                    <button type="submit" class="bg-orange-400 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Search
                    </button>
                </div>
            </form>
        @endif
    </div>
</section>
