<a href="{{route('categories.index')}}" class="text-sm font-medium inline-flex items-center gap-2 border-b border-white hover:border-gray-300 transition-all duration-300 mb-5">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
    <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
  </svg>
  Back
</a>
@if($category)
<div class="mb-4">
  <img src="{{asset($category->icon)}}" alt="{{$category->name}}" class="w-20 h-20 rounded-xl object-cover">
</div>
@endif
<form action="{{$route}}" method="post" enctype="multipart/form-data" class="border bg-white shadow p-10 rounded">
  @csrf
  @if($method !== 'POST')
  @method($method)
  @endif
  <div class="w-full">
    <label for="name" class="w-fit pl-0.5 text-sm">Name Category</label>
    <input type="text" name="name" id="name" value="{{$category->name ?? old('name')}}" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('name') border-red-500 @enderror" placeholder="Name">
    @error('name')
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
    <div class="mb-4"></div>
    <div class="relative flex w-full flex-col gap-1 text-slate-700 dark:text-slate-300">
      <label for="fileInput" class="w-fit pl-0.5 text-sm">Upload File</label>
      <input id="fileInput" name="icon" type="file" class="w-full overflow-clip rounded-xl border bg-slate-100/50 text-sm file:mr-4 file:cursor-pointer file:border-none file:bg-slate-100 file:px-4 file:py-2 file:font-medium file:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:file:bg-slate-800 dark:file:text-white dark:focus-visible:outline-violet-600 @error('icon') error-input @enderror" />
      <small class="pl-0.5">JPEG , PNG, JPG, GIF, SVG - Max 2MB</small>
    </div>
    @error('icon')
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
    <div class="mb-4"></div>
    <button type="submit" class="btn btn-primary">
      {{$method === 'POST' ? 'Create' : 'Update'}}
    </button>
  </div>
</form>