@extends('layouts.admin.app')

@section('title', 'Products')

@section('link')
<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection

@section('content')
@include('admin.products.form', [
'route' => route('products.update', $product),
'method' => 'PUT',
'categories' => $categories,
'product' => $product
])
@endsection

@section('scripts')
<script>
  // Khởi tạo CKEditor
  CKEDITOR.replace('content');
  // get value & remove img
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.remove-image-btn').forEach(function(button) {
      button.addEventListener('click', function() {
        // Get the image container
        var imageContainer = button.closest('.image-container');

        // Get the hidden input for imageDestroy and set its value
        var hiddenInput = imageContainer.querySelector('.destroy-input');
        hiddenInput.value = imageContainer.getAttribute('data-image-id');

        // Optionally, hide the image container
        imageContainer.style.display = 'none';
      });
    });
  });
</script>
@endsection