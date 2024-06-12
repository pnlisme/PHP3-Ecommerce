@extends('layouts.clients.app')

@section('title', 'Register')

@section('content')
@include('partials.breadcrumb', ['name' => 'Register'])

<section class="container mx-auto ">
  <div class="py-10 text-center">
    <h1 class="text-3xl font-bold text-gray-600 mb-5">Register</h1>
    <p class="text-gray-500 font-medium">Create an account to get access to your Orders, Wishlist and Recommendations.</p>
  </div>
</section>

<section class="container mx-auto">
  <div class="py-10 max-w-3xl mx-auto">
    <div class="border rounded-lg py-5 px-10">
      <form action="{{route('register.store')}}" method="post" class="flex flex-col gap-5">
        @csrf
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Name</label>
            <input id="textInputDefault" value="{{old('name')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('name') border-red-500 @enderror" name="name" placeholder="Enter your name" autocomplete="name" />
            @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Email</label>
            <input id="textInputDefault" value="{{old('email')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('email') border-red-500 @enderror" name="email" placeholder="Enter your email" autocomplete="email" />
            @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Phone</label>
            <input id="textInputDefault" value="{{old('phone')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('phone') border-red-500 @enderror" name="phone" placeholder="Enter your phone" autocomplete="phone" />
            @error('phone')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Address</label>
            <input id="textInputDefault" value="{{old('address')}}" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('address') border-red-500 @enderror" name="address" placeholder="Enter your address" autocomplete="address" />
            @error('address')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="passwordInput" class="w-fit pl-0.5 text-sm">Password</label>
            <div x-data="{ showPassword: false }" class="relative">
              <input :type="showPassword ? 'text' : 'password'" id="passwordInput" class="w-full rounded-xl border @error('password') border-red-500 @enderror bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600" name="password" autocomplete="current-password" placeholder="Enter your password" />
              <button type="button" @click="showPassword = !showPassword" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-700 dark:text-slate-300" aria-label="Show password">
                <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
              </button>
            </div>
            @error('password')
            <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label for="password_confirmationInput" class="w-fit pl-0.5 text-sm">Password Confirm</label>
            <div x-data="{ showPasswordConfirmation: false }" class="relative">
              <input :type="showPasswordConfirmation ? 'text' : 'password'" id="password_confirmationInput" class="w-full rounded-xl border @error('password_confirmation') border-red-500 @enderror bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600" name="password_confirmation" autocomplete="new-password" placeholder="Confirm your password" />
              <button type="button" @click="showPasswordConfirmation = !showPasswordConfirmation" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-700 dark:text-slate-300" aria-label="Show password">
                <svg x-show="!showPasswordConfirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <svg x-show="showPasswordConfirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
              </button>
            </div>
            @error('password_confirmation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div>
          <!-- Primary Button -->
          <button type="submit" class="cursor-pointer whitespace-nowrap rounded-xl h-[42px] bg-violet-700 px-5 py-2 text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-violet-600 dark:text-slate-100 dark:focus-visible:outline-violet-600">
            Register
          </button>
        </div>
      </form>
      <div class="flex items-center gap-2 justify-between mt-5">
        <a href="{{route('login')}}" class="text-sm font-medium text-black hover:underline underline-offset-2">
          Return to Login
        </a>
        <a href="{{route('forgot-password')}}" class="text-sm font-medium text-black hover:underline underline-offset-2">Forgot Password?</a>
      </div>
    </div>
  </div>
</section>
@endsection