@extends('layouts.clients.app')

@section('title', 'Orders')

@section('content')
@include('partials.breadcrumb', ['name' => 'Orders'])

<section class="orders container mx-auto">
  <div class="py-10 flex gap-10">
    <div class="w-1/5 border rounded divide-y ">
      <ul class="">
        <li>
          <a href="{{route('profile.index')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Profile</a>
        </li>
        <li>
          <a href="{{route('profile.orders')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Orders</a>
        </li>
        <li>
          <a href="{{route('wishlist.index')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Change Password</a>
        </li>
        <li>
          <a href="{{route('logout')}}" class="px-4 py-2 hover:bg-violet-700 hover:text-white block w-full rounded font-medium transition-all duration-300">Logout</a>
        </li>
      </ul>
    </div>
    <div class="w-4/5 h-fit p-4 border rounded ">
      <div class="flex justify-between items-end">
        <h3 class="font-bold text-xl mb-5">Orders</h3>
      </div>
      <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
        <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
          <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
            <tr>
              <th scope="col" class="p-4">Id</th>
              <th scope="col" class="p-4">Date</th>
              <th scope="col" class="p-4">Quantity</th>
              <th scope="col" class="p-4">Price</th>
              <th scope="col" class="p-4">Status</th>
              <th scope="col" class="p-4">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
            @forelse ($orders as $order)
            <tr>
              <form action="{{route('wishlist.destroy', ['wishlist' => $order->id])}}" method="post">
                @csrf
                @method('DELETE')
                <td class="p-4">{{$order->id}}</td>
                <td class="p-4"> {{$order->created_at}} </td>
                <td class="p-4">{{\App\Models\Billing::where('checkout_id', $order->id)->sum('quantity') }}</td>
                <td class="p-4">${{$order->total}}</td>
                <td class="p-4">{{$order->status}}</td>
                <td class="p-4">
                  <a href="{{route('profile.orderdetail', ['order' => $order])}}" class="text-violet-700 hover:underline">Detail</a>
                </td>
              </form>
            </tr>
            @empty
            <tr>
              <td class="p-4" colspan="4">Not orders created yet or not found! </td>
            </tr>
            @endforelse
          </tbody>
          <tfoot class="border-t border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
            <tr>
              <td colspan="6" class="p-4">
                {{$orders->links('partials.pagination')}}
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection