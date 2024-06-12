@extends('layouts.admin.app')

@section('title', 'Create Category')

@section('content')
@include('admin.categories.form', [
'route' => route('categories.store'),
'method' => 'POST',
'category' => null
])
@endsection