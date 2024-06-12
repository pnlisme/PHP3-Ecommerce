@extends('layouts.clients.app')

@section('title', 'Recovery Password')

@section('content')
@include('partials.breadcrumb', ['name' => 'Recovery Password'])

<section class="container mx-auto ">
  <div class="py-10 text-center">
    <h1 class="text-3xl font-bold text-gray-600 mb-5">Recovery Password</h1>
    <p class="text-gray-500 font-medium">Enter your email to get a recovery link.</p>
  </div>

  <section class="container mx-auto">
    <div class="py-10 max-w-3xl mx-auto">
      <div class="border rounded-lg py-5 px-10">
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
        <form action="{{route('forgot-password.send')}}" method="post" class="flex gap-5 items-end">
          @csrf
          <div class="w-full">
            <div class="flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
              <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Email</label>
              <input id="textInputDefault" type="text" class="w-full rounded-xl border bg-slate-100 px-2 py-2.5 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600 @error('email') border-red-500 @enderror" name="email" placeholder="Enter your email" autocomplete="email" />
              @error('email')
              <span class="text-red-500 text-sm">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div>
            <!-- Primary Button -->
            <button type="submit" class="cursor-pointer whitespace-nowrap rounded-xl h-[42px] bg-violet-700 px-5 py-2 text-sm font-medium tracking-wide text-slate-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-violet-600 dark:text-slate-100 dark:focus-visible:outline-violet-600">
              Get Recovery Link
            </button>
          </div>
        </form>
        <div class="flex items-center gap-2 justify-between mt-5">
          <a href="{{route('login')}}" class="text-sm font-medium text-black hover:underline underline-offset-2">
            Return to Login
          </a>
          <a href="{{route('register')}}" class="text-sm font-medium text-black hover:underline underline-offset-2">Create an Account?</a>
        </div>
      </div>
    </div>
  </section>
  @endsection