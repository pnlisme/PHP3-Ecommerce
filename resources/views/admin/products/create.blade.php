@extends('layouts.admin.app')

@section('title', 'Products')

@section('link')
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection


@section('content')
@include('admin.products.form', [
'route' => route('products.store'),
'method' => 'POST',
'category' => null
])
@endsection

@section('scripts')
<script>
  CKEDITOR.replace('content');
</script>
</script>
@endsection