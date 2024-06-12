<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @yield('title')
  </title>
  @yield('link')
  <!-- AlpineJS -->
  <script src="https://unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
</head>

<body>
  <main class="flex">
    @include('layouts.admin.sidebar')
    <div class="w-full bg-gray-50">
      @include('layouts.admin.header')
      <div class="p-10">
        @if(session()->has('success'))
        <div x-data="{flash: true}" x-show="flash" class="relative mb-5 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" role="alert">
          <strong class="font-bold">Success!</strong>
          <div class="text-base"> {{ session('success') }}</div>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </div>
        @elseif (session()->has('error'))
        <div x-data="{flash: true}" x-show="flash" class="relative mb-5 rounded border border-red-400 bg-red-100 px-4 py-3 text-lg text-red-700" role="alert">
          <strong class="font-bold">Error!</strong>
          <div class="text-base text-red-700"> {{ session('error') }}</div>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </div>
        @endif
        @yield('content')
      </div>
    </div>
  </main>
  @yield('scripts')
</body>

</html>