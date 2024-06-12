@extends('layouts.admin.app')

@section('title', 'Edit Category')

@section('content')
@include('admin.categories.form', [
'route' => route('categories.update', ['category' => $category]),
'method' => 'PUT',
'category' => $category
])
@endsection