@extends('layouts.clients.app')

@section('title', 'Products')

@section('link')
<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- slick css -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- slick js -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('scripts')
<script>
  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
    arrows: false,
    dots: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 1000,
    asNavFor: '.slider-for',
    prevArrow: '<button class="text-gray-400 hover:text-violet-700 hover:scale-125 transform-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /> </svg></button>',
    nextArrow: '<button class="text-gray-400 hover:text-violet-700 hover:scale-125 transform-all duration-300"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6"> <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" /> </svg></button>',
    dots: false,
    centerMode: true,
    focusOnSelect: true
  });
</script>
@endsection

@section('content')
@include('partials.breadcrumb', ['name' => 'Product Detail:'])

<section class="container mx-auto">
  <div class="py-10">
    <div class="flex gap-8">
      <div class="border rounded-lg p-5">
        <div class="slider-for max-w-xl">
          @foreach ($product->images as $image)
          <div class="">
            <img src="{{$image->name}}" alt="{{$product->name}}" class="w-full rounded h-auto">
          </div>
          @endforeach
        </div>
        <div class="slider-nav max-w-xl flex gap-2 mt-4">
          @foreach ($product->images as $image)
          <div class="px-2">
            <img src="{{$image->name}}" alt="{{$product->name}}" class="w-full rounded h-auto">
          </div>
          @endforeach
        </div>
      </div>
      <div>
        <h3 class="text-xl font-bold">{{$product->name}}</h3>
        <div class="flex gap-2 items-center my-5">
          <div class="flex gap-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f7a465" class="size-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f7a465" class="size-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f7a465" class="size-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#f7a465" class="size-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#a0a0a0" class="size-4">
              <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
            </svg>
          </div>
          <span class="w-0.5 h-5 block bg-gray-400 rounded-full"></span>
          <p class="flex gap-2 items-center text font-medium text-gray-500"> 999 Rating</p>
        </div>
        <div class="flex gap-10">
          <p class="text-xl font-bold">${{$product->price}}</p>
          <p class="text-lg font-medium text-violet-700">-{{($product->price_fake - $product->price) / 100}} %</p>
        </div>
        <p class="text-gray-500 my-5">
          M.R.P: <del class="text-gray-500">${{$product->price_fake}}</del>
        </p>
        <p class="text-gray-500 line-clamp-3">{{$product->description}}</p>
        <div class="flex items-end gap-4 mt-5">
          <div x-data="{ currentVal: 1, minVal: 1, maxVal: 9, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
            <label for="counterInput" class="pl-1 text-sm text-slate-700 dark:text-slate-300">Quantity</label>
            <div @dblclick.prevent class="flex items-center">
              <button @click="currentVal = Math.max(minVal, currentVal - incrementAmount)" class="flex h-10 items-center justify-center rounded-l-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-violet-600" aria-label="subtract">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                </svg>
              </button>
              <input x-model="currentVal.toFixed(decimalPoints)" id="counterInput" type="text" class="border-x-none h-10 w-20 rounded-none border-y border-slate-300 bg-slate-100/50 text-center text-black focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-violet-700 dark:border-slate-700 dark:bg-slate-800/50 dark:text-white dark:focus-visible:outline-violet-600" readonly />
              <button @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)" class="flex h-10 items-center justify-center rounded-r-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-violet-600" aria-label="add">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </button>
            </div>
          </div>
          <button class="btn btn-primary h-fit">Add to Cart</button>
          <a href="#" class="btn hover:text-white bg-white text-gray-500 border h-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto">
  <div class="py-10">
    <div class="flex gap-2">
      <button class=" bg-violet-700 text-white px-6 py-2 border rounded-md font-medium">Detail</button>
      <button class=" bg-white text-gray-600 px-6 py-2 border rounded-md font-medium">Specifications</button>
      <button class=" bg-white text-gray-600 px-6 py-2 border rounded-md font-medium">Reviews</button>
    </div>
    <div class="border px-10 py-5 rounded mt-2">
      <h3 class="text-2xl font-bold">
        Introduction
      </h3>
      <div class="text-gray-500 my-5">{{$product->description}}</div>
    </div>
  </div>
</section>

<section class="container mx-auto">
  <div class="py-10">
    <div class="text-center">
      <h3 class="font-bold text-2xl">Related <span class="text-violet-700">Products</span></h3>
      <p class="text-gray-500">Browse The Collection of Top Products</p>
    </div>
    <div class="grid grid-cols-5 gap-5 mt-5">
      @forelse ($products as $product)
      @include('partials.product-card', $product)
      @empty
      <div class="col-span-5">
        <div class="flex justify-center items-center h-96">
          <h1 class="text-2xl font-bold text-gray-500">No products related</h1>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>

@endsection