<section class="container mx-auto border-b">
  <nav class="flex items-center gap-2 text-gray-500 text-sm py-4">
    <a href="{{route('home')}}" class="link-hover hover:underline underline-offset-4">Home</a>
    <span>/</span>
    @if(isset($product))
    <a href="{{route('products.index')}}" class="link-hover hover:underline underline-offset-4">Products</a>
    <span>/</span>
    <span>{{$name}} {{$product->name ?? null}}</span>
    @else
    <span>{{$name}}</span>
    @endif
  </nav>
</section>