@extends('layouts.admin.app')

@section('title', 'orders')

@section('content')
<section class="orders">
  <div class="overflow-hidden w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
    <table class="w-full text-left text-sm text-slate-700 dark:text-slate-300">
      <thead class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
        <tr>
          <th scope="col" class="p-4">Id</th>
          <th scope="col" class="p-4">Buyer</th>

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
            <td class="p-4">{{$order->user->name}}</td>
            <td class="p-4"> {{$order->created_at}} </td>
            <td class="p-4">{{\App\Models\Billing::where('checkout_id', $order->id)->sum('quantity') }}</td>
            <td class="p-4">${{$order->total}}</td>
            <td class="p-4">
              <div class="relative flex max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-1 top-0 translate-y-1/2 h-5 w-5">
                  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <select id="os" name="os" class="appearance-none rounded-xl border border-slate-300 bg-slate-100 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600">
                  <option value="mac">Mac</option>
                  <option value="windows">Windows</option>
                  <option value="linux">Linux</option>
                </select>
              </div>
            </td>
            <td class="p-4">
              <a href="#" class="text-violet-700 hover:underline">Detail</a>
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
</section>
@endsection