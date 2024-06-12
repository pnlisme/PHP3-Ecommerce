<a href="{{route('products.index')}}" class="text-sm font-medium inline-flex items-center gap-2 border-b border-white hover:border-gray-300 transition-all duration-300 mb-5">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
    <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 0 1 0 1.06l-2.47 2.47H21a.75.75 0 0 1 0 1.5H4.81l2.47 2.47a.75.75 0 1 1-1.06 1.06l-3.75-3.75a.75.75 0 0 1 0-1.06l3.75-3.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
  </svg>
  Back
</a>

<form action="{{$route}}" method="post" enctype="multipart/form-data" class="">
  @csrf
  @if($method !== 'POST')
  @method($method)
  @endif
  <div class="grid grid-cols-2 gap-10 mb-10">
    <div class="border bg-white shadow p-10 rounded">
      <h3 class="text-2xl mb-3 font-bold">Info Product</h3>
      <!-- Name Input -->
      <label for="name" class="w-fit pl-0.5 text-sm">Name</label>
      <input type="text" name="name" id="name" value="{{$product->name ?? old('name')}}" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('name') border-red-500 @enderror" placeholder="Name">
      @error('name')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Price Input -->
      <label for="price" class="w-fit pl-0.5 text-sm">Price <span class="text-xs font-medium italic text-gray-500"> - Real Price</span></label>
      <input type="text" name="price" id="price" value="{{$product->price ?? old('price')}}" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('name') border-red-500 @enderror" placeholder="Price">
      @error('name')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Price Fake Input -->
      <label for="price_fake" class="w-fit pl-0.5 text-sm">Fake Price<span class="text-xs font-medium italic text-gray-500"> - Can be empty </span></label>
      <input type="text" name="price_fake" id="price_fake" value="{{$product->price_fake ?? old('price_fake')}}" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('name') border-red-500 @enderror" placeholder="Sale Price">
      @error('name')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Quantity Input -->
      <label for="quantity" class="w-fit pl-0.5 text-sm">Quantity</label>
      <input type="number" name="quantity" id="quantity" value="{{$product->quantity ?? old('price_fake')}}" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('name') border-red-500 @enderror" placeholder="Quantity">
      @error('name')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Category Input -->
      <label for="category_id" class="w-fit pl-0.5 text-sm">Category</label>
      <select name="category_id" id="category_id" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('category_id') border-red-500 @enderror">
        <option value="">Select Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" @if(($product && $product->category_id === $category->id) || old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
        @endforeach
      </select>
      @error('category_id')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Status Input -->
      <label for="status" class="w-fit pl-0.5 text-sm">Status</label>
      <select name="status" id="status" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('status') border-red-500 @enderror">
        <option value="1" @if($product && $product->status === 1) selected @endif>Active</option>
        <option value="0" @if($product && $product->status === 0) selected @endif>Inactive</option>
      </select>
      @error('status')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
    </div>
    <div class="border bg-white shadow p-10 rounded">
      <h3 class="text-2xl mb-3 font-bold">Description</h3>
      <!-- Description Input -->
      <label for="description" class="w-fit pl-0.5 text-sm">Description</label>
      <textarea name="description" id="description" class="focus-visible:outline-violet-700 h-32 mt-1 py-2 px-4 border rounded-xl w-full @error('description') border-red-500 @enderror" placeholder="Description">{{$product->description ?? old('description')}}</textarea>
      @error('description')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
      <!-- Content Input -->
      <label for="content" class="w-fit pl-0.5 text-sm mb-1 block">Content</label>
      <textarea name="content" id="content" class="focus-visible:outline-violet-700 mt-1 py-2 px-4 border rounded-xl w-full @error('content') border-red-500 @enderror" placeholder="Content">{{$product->content ?? old('content')}}</textarea>
      @error('content')
      <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
      @enderror
      <div class="mb-4"></div>
    </div>
  </div>
  <div class="border bg-white shadow p-10 rounded">
    <h3 class="text-2xl mb-3 font-bold">Image Product</h3>
    @if($product)
    <div class="grid grid-cols-4 gap-5">
      
      @foreach($product->images as $image)
      <div class="relative flex flex-col gap-1 text-slate-700 dark:text-slate-300 image-container" data-image-id="{{$image->id}}">
        <button type="button" class="absolute top-0 right-0 translate-x-1/3 -translate-y-1/3 rounded-full p-1 bg-gray-700 hover:bg-red-600 transition-all duration-300 text-white remove-image-btn">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
          </svg>
        </button>
        <img src="{{ asset($image->name) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-xl">
        <input type="hidden" name="imageDestroy[]" class="destroy-input">
        <label for="fileInput{{$image->id}}" class="w-fit pl-0.5 text-sm">Upload File</label>
        <input type="file" name="imageEdit[]" id="fileInput{{$image->id}}" class="w-full overflow-clip rounded-xl border bg-slate-100/50 text-sm file:mr-4 file:cursor-pointer file:border-none file:bg-slate-100 file:px-4 file:py-2 file:font-medium file:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:file:bg-slate-800 dark:file:text-white dark:focus-visible:outline-violet-600 @error('image') error-input @enderror" />
        <small class="pl-0.5">JPEG, PNG, JPG, GIF, SVG - Max 2MB</small>
      </div>
      @endforeach
    </div>
    @endif
    <h3 class="text-lg font-bold mt-5 text-gray-600">Add New Image</h3>
    <div class="flex flex-col mt-3" x-data="{ forms: [0] }">
      <template x-for="(form, index) in forms" :key="index">
        <div class="flex items-center gap-5 w-1/2 mb-4">
          <div class="w-full relative flex flex-col gap-1 text-slate-700 dark:text-slate-300">
            <label :for="'fileInput' + index" class="w-fit pl-0.5 text-sm">Upload File</label>
            <input :id="'fileInput' + index" name="imageCreate[]" type="file" class="w-full overflow-clip rounded-xl border bg-slate-100/50 text-sm file:mr-4 file:cursor-pointer file:border-none file:bg-slate-100 file:px-4 file:py-2 file:font-medium file:text-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:file:bg-slate-800 dark:file:text-white dark:focus-visible:outline-violet-600 @error('image') error-input @enderror" />
            <small class="pl-0.5">JPEG, PNG, JPG, GIF, SVG - Max 2MB</small>
          </div>
          <div class="flex items-center gap-2">
            <button type="button" @click="forms.push(forms.length)" class="rounded-full p-1 bg-violet-700 hover:bg-gray-500 hover:text-white transition-all duration-300 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
              </svg>
            </button>
            <button type="button" @click="forms.splice(index, 1)" class="rounded-full p-1 bg-gray-700 hover:bg-red-600 transition-all duration-300 text-white" x-show="forms.length > 1">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
        </div>
      </template>
    </div>

  </div>
  <div class="mb-4"></div>
  <button type="submit" class="btn btn-primary">
    {{$method === 'POST' ? 'Create' : 'Update'}}
  </button>

</form>