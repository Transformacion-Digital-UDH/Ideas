<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="mb-2">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mx-auto px-6">
        <div class="bg-white rounded-sm shadow-lg overflow-hidden ">
            <div class="p-4 sm:p-7">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
