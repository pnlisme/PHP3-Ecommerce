@extends('layouts.admin.app')

@section('title', 'Categories')

@section('content')
<section class="category">
  <div class="mb-5 flex justify-end">
    <a href="{{route('categories.create')}}" class="btn btn-primary text-sm font-medium">Create New Category +</a>
  </div>
  <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
    <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
      <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
        <tr>
          <th scope="col" class="p-4">Icon</th>
          <th scope="col" class="p-4">Name</th>
          <th scope="col" class="p-4">Products Quantity</th>
          <th scope="col" class="p-4">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
        @forelse ($categories as $category)
        <tr>
          <form action="{{route('categories.destroy', ['category' => $category])}}" method="post">
            @csrf
            @method('DELETE')
            <td class="p-4">
              <img src="{{asset($category->icon)}}" alt="{{$category->name}}" class="w-10 h-10 rounded">
            </td>
            <td class="p-4">{{$category->name}}</td>
            <td class="p-4">{{$category->products_count}}</td>
            <td class="p-4">
              <div class="flex items-center gap-3">
                <a href="{{route('categories.edit', ['category' => $category])}}" class="cursor-pointer whitespace-nowrap rounded-xl bg-transparent p-0.5 font-semibold text-violet-700 outline-violet-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-violet-600 dark:outline-violet-600">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 inline">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                  </svg>
                </a>
                <span class="h-5 rounded w-px bg-violet-700 block"></span>
                <button type="submit" class="cursor-pointer whitespace-nowrap rounded-xl bg-transparent p-0.5 font-semibold text-violet-700 outline-violet-700 hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-violet-600 dark:outline-violet-600">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 inline">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </td>
          </form>
        </tr>
        @empty
        <tr>
          <td class="p-4" colspan="4">Not categories created yet or not found! </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection