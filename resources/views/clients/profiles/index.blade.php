@extends('layouts.clients.app')

@section('title', 'Profile')

@section('content')
@include('partials.breadcrumb', ['name' => 'Profile'])

<section class="products container mx-auto">
  <div class="py-10 flex gap-10">
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
    <div class="w-4/5 h-fit p-4 border rounded ">
      <div class="flex justify-between items-end">
        <h3 class="font-bold text-xl">Infomation</h3>
      </div>
      <form action="{{route('checkout.store')}}" method="post" class="flex flex-col gap-5 mt-2">
        @csrf
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Name</label>
            <input id="textInputDefault" value="{{$user->name}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('name') border-red-500 @enderror" name="name" placeholder="Enter your name" autocomplete="name" />
            @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Email <i class="text-red-400">* This is account! Cannot change</i></label>
            <input id="textInputDefault" value="{{$user->email ?? old('email')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('email') border-red-500 @enderror" name="email" placeholder="Enter your email" autocomplete="email" disabled />
            @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Phone</label>
            <input id="textInputDefault" value="{{$user->phone ?? old('phone')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('phone') border-red-500 @enderror" name="phone" placeholder="Enter your phone" autocomplete="phone" />
            @error('phone')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Address</label>
            <input id="textInputDefault" value="{{$user->address ?? old('address')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('address') border-red-500 @enderror" name="address" placeholder="Enter your address" autocomplete="address" />
            @error('address')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="flex justify-end items-center">
          <!-- Primary Button -->
          <button type="submit" class="cursor-pointer whitespace-nowrap rounded-xl h-[42px] bg-violet-700 px-5 py-2 text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-violet-600 dark:text-slate-100 dark:focus-visible:outline-violet-600">
            Save Change
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection