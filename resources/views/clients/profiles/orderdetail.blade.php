@extends('layouts.clients.app')

@section('title', 'Order Detail')

@section('content')
@include('partials.breadcrumb', ['name' => 'Order Detail'])

<section class="products container mx-auto">
  <div class="py-10 flex gap-10 w-full">
    <div class="w-1/5 border rounded divide-y ">
      <ul class="">
        <li>
          <a href="{{route('profile.index')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Profile</a>
        </li>
        <li>
          <a href="{{route('profile.orders')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Orders</a>
        </li>
        <li>
          <a href="{{route('wishlist.index')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Change Password</a>
        </li>
        <li>
          <a href="{{route('logout')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Logout</a>
        </li>
      </ul>
    </div>

    <div class="w-4/5 p-4 border rounded ">
      <div class="flex justify-between items-end">
        <h3 class="font-bold text-xl">Billing Details</h3>
      </div>
      <form action="{{route('checkout.cancel', ['checkout' => $order->id])}}" method="post" class="flex flex-col gap-5 mt-2">
        @csrf
        @method('PUT')
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Name</label>
            <input id="textInputDefault" value="{{$user->name}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('name') border-red-500 @enderror" name="name" placeholder="Enter your name" autocomplete="name" disabled />
            @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Email</label>
            <input id="textInputDefault" value="{{$user->email ?? old('email')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('email') border-red-500 @enderror" name="email" placeholder="Enter your email" autocomplete="email" disabled />
            @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Phone</label>
            <input id="textInputDefault" value="{{$user->phone ?? old('phone')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('phone') border-red-500 @enderror" name="phone" placeholder="Enter your phone" autocomplete="phone" disabled />
            @error('phone')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Address</label>
            <input id="textInputDefault" value="{{$user->address ?? old('address')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('address') border-red-500 @enderror" name="address" placeholder="Enter your address" autocomplete="address" disabled />
            @error('address')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="flex justify-between items-center">
          <!-- Primary Button -->
          <button type="submit" class="cursor-pointer whitespace-nowrap rounded-xl h-[42px] bg-violet-700 px-5 py-2 text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-violet-600 dark:text-slate-100 dark:focus-visible:outline-violet-600">
            Cancel Order
          </button>
        </div>
      </form>
      <div class="divide-y mt-5">
        <div>
          <h3 class="font-bold text-xl ">Summary</h3>
          <div class="flex items-center justify-between">
            <span class="text-gray-500">Sub-Total</span>
            <span class="font-bold ">${{$cartTotal}}</span>
          </div>
          <div class="flex items-center justify-between mb-2">
            <span class="text-gray-500">Shipping</span>
            <span class="font-bold ">$5</span>
          </div>
        </div>
        <div class="flex items-center justify-between py-5">
          <span class=" text-lg text-black font-medium">Total Amount</span>
          <span class="font-bold ">${{$cartTotal + 5}}</span>
        </div>
        <div>
          @foreach($products as $product)
          <div class=" flex items-center gap-2 p-4">
            <div>
              <img src="{{$product['images'][0]['name']}}" class="min-w-20 h-20 rounded" alt="">
            </div>
            <div class="w-full">
              <p class="line-clamp-1 italic">{{$product['name']}}</p>
              <div class="flex gap-0.5 mb-1">
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
              <div class="flex justify-between items-center">
                <p class="font-bold text-sm"><del class="font-normal text-gray-500">${{$product['price_fake']}}</del> ${{$product['price']}}</p>
                <span>x{{$product['quantity']}}</span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection