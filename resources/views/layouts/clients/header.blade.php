<!-- Header -->
<header class="bg-white border-b border-gray-300">
  <div class="header-top container flex justify-between items-center mx-auto">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-logo">
      <img src="{{ asset('images/purple-logo.png') }}" alt="Logo" class="h-16">
    </a>
    <!-- Subnav Menu -->
    <div class="sub-nav text-sm flex items-center gap-2">
      <a href="{{route('wishlist.index')}}" class="subnav-link @if ($active == 'wishlist') subnav-link-active @endif">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
          <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
        </svg>
        <div class="flex flex-col ">
          <span class="text-sm font-medium text-gray-500">WishList</span>
          <span>
            @if(Auth::check() && Auth::user()->wishlist)
            {{ count(Auth::user()->wishlist) }} items
            @else
            0 items
            @endif
          </span>
        </div>
      </a>
      <span class="w-px h-10 rounded-full bg-gray-300"></span>
      <div x-data="{ 
        slideOverOpen: false }" class="relative z-50 w-auto h-auto">
        <button @click="slideOverOpen=true" class="subnav-link active:subnav-active focus:subnav-active focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
          </svg>
          <div class="flex flex-col ">
            <span class="text-sm font-medium text-gray-500">Cart</span>
            <span>
              @if($cartQuantity > 0)
              {{ $cartQuantity }} items
              @else
              0 items
              @endif
            </span>
          </div>
        </button>
        <template x-teleport="body">
          <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false" class="relative z-[99]">
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false" class="fixed inset-0 bg-black bg-opacity-10"></div>
            <div class="fixed inset-0 overflow-hidden">
              <div class="absolute inset-0 overflow-hidden">
                <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                  <div x-show="slideOverOpen" @click.away="slideOverOpen = false" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="w-screen max-w-md">
                    <div class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                      <div class="px-4 sm:px-5">
                        <div class="flex items-start justify-between pb-1">
                          <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Products in Cart</h2>
                          <div class="flex items-center h-auto ml-3">
                            <button @click="slideOverOpen=false" class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                              </svg>
                              <span>Close</span>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="relative flex-1 px-4 mt-5 sm:px-5">
                        <div class="absolute inset-0 px-4 sm:px-5">
                          <div class="relative h-full overflow-hidden border border-dashed rounded-md border-violet-300 divide-y divide-violet-300 divide-dashed">
                            <div class="divide-y divide-violet-300 divide-dashed">
                              @forelse($cartProducts as $product)
                              <div class="relative flex items-center gap-2 p-4">
                                <div>
                                  <img src="{{$product['images'][0]['name']}}" class="min-w-20 h-20 rounded" alt="">
                                </div>
                                <div class="flex flex-col">
                                  <p class="line-clamp-1 italic">{{$product['name']}}</p>
                                  <p class="font-bold text-sm">${{$product['price']}}</p>
                                  <div x-data="{ currentVal: {{$product['quantity']}}, minVal: 1, maxVal: 9, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
                                    <div @dblclick.prevent class="flex items-center mt-2">
                                      <form action="{{route('cart.remove', ['product' => $product['id']])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button @click="currentVal = Math.max(minVal, currentVal - incrementAmount)" class="flex h-6 items-center justify-center rounded-l-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-violet-600" aria-label="subtract">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                          </svg>
                                        </button>
                                      </form>
                                      <input x-model="currentVal.toFixed(decimalPoints)" id="counterInput" type="text" name="quantity" class="border-x-none h-6 w-12 rounded-none border-y border-slate-300 bg-slate-100/50 text-center text-black focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-violet-700 dark:border-slate-700 dark:bg-slate-800/50 dark:text-white dark:focus-visible:outline-violet-600" readonly />
                                      <form action="{{route('cart.add', ['product' => $product['id']])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button @click="currentVal = Math.min(maxVal, currentVal + incrementAmount)" class="flex h-6 items-center justify-center rounded-r-xl border border-slate-300 bg-slate-100 px-4 py-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 active:opacity-100 active:outline-offset-0 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 dark:focus-visible:outline-violet-600" aria-label="add">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                          </svg>
                                        </button>
                                      </form>
                                    </div>
                                  </div>

                                </div>
                                <form action="{{route('cart.destroy', ['product' => $product['id'], ...request()->query()])}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="absolute top-0 right-0 p-4 hover:text-red-500 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                      <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg>
                                  </button>
                                </form>
                              </div>
                              @empty
                              <div class="flex items-center justify-center h-32">
                                <span class="text-sm font-medium text-gray-500">No products in cart</span>
                              </div>
                              @endforelse
                            </div>
                            <div class="absolute bottom-0 left-0  w-full">
                              <div class="flex justify-between px-4 py-2">
                                <span class="text-sm font-medium text-gray-500">Total</span>
                                <span class="text-sm font-medium text-gray-500">${{ $cartTotal }}</span>
                              </div>
                              <div class="flex justify-between px-4 py-2">
                                <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a>
                                <a href="{{ route('checkout.index') }}" class="btn btn-secondary">Checkout</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </template>
      </div>
      <span class="w-px h-10 rounded-full bg-gray-300"></span>
      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" @click.away="open = false" class="subnav-link @if ($active == 'account') subnav-link-active @endif">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
          </svg>
          <div class="flex flex-col items-start">
            <span class="text-sm font-medium text-gray-500">Account</span>
            <span>
              @if(Auth::check())
              {{ Auth::user()->name }}
              @else
              Login
              @endif
            </span>
          </div>
        </button>
        <ul x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform opacity-0 translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-4" class="absolute list-dropdown right-0 z-50">
          @if(Auth::check())
          @if (Auth::user()->role == 'admin')
          <li>
            <span class="font-medium italic text-sm text-gray-500 px-4 py-1 block">Admin</span>
          </li>
          <li class="">
            <a href="{{ route('admin.dashboard') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          @endif
          <li>
            <span class="font-medium italic text-sm text-gray-500 px-4 py-1 block">Settings</span>
          </li>
          <li class="">
            <a href="{{ route('profile.index') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
              <span>Profile</span>
            </a>
          </li>
          <li>
            <span class="font-medium italic text-sm text-gray-500 px-4 py-1 block">Action</span>
          </li>
          <li class="">
            <a href="{{ route('login') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
              </svg>
              <span>Order Tracking</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('login') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M12 3.75a6.715 6.715 0 0 0-3.722 1.118.75.75 0 1 1-.828-1.25 8.25 8.25 0 0 1 12.8 6.883c0 3.014-.574 5.897-1.62 8.543a.75.75 0 0 1-1.395-.551A21.69 21.69 0 0 0 18.75 10.5 6.75 6.75 0 0 0 12 3.75ZM6.157 5.739a.75.75 0 0 1 .21 1.04A6.715 6.715 0 0 0 5.25 10.5c0 1.613-.463 3.12-1.265 4.393a.75.75 0 0 1-1.27-.8A6.715 6.715 0 0 0 3.75 10.5c0-1.68.503-3.246 1.367-4.55a.75.75 0 0 1 1.04-.211ZM12 7.5a3 3 0 0 0-3 3c0 3.1-1.176 5.927-3.105 8.056a.75.75 0 1 1-1.112-1.008A10.459 10.459 0 0 0 7.5 10.5a4.5 4.5 0 1 1 9 0c0 .547-.022 1.09-.067 1.626a.75.75 0 0 1-1.495-.123c.041-.495.062-.996.062-1.503a3 3 0 0 0-3-3Zm0 2.25a.75.75 0 0 1 .75.75c0 3.908-1.424 7.485-3.781 10.238a.75.75 0 0 1-1.14-.975A14.19 14.19 0 0 0 11.25 10.5a.75.75 0 0 1 .75-.75Zm3.239 5.183a.75.75 0 0 1 .515.927 19.417 19.417 0 0 1-2.585 5.544.75.75 0 0 1-1.243-.84 17.915 17.915 0 0 0 2.386-5.116.75.75 0 0 1 .927-.515Z" clip-rule="evenodd" />
              </svg>
              <span>Change Password</span>
            </a>
          </li>
          <li class="">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="link-dropdown w-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                  <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <span>Logout</span>
              </button>
            </form>
          </li>
          @else
          <li>
            <span class="font-medium italic text-sm text-gray-500 px-4 py-1 block">Account</span>
          </li>
          <li class="">
            <a href="{{ route('login') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M17.834 6.166a8.25 8.25 0 1 0 0 11.668.75.75 0 0 1 1.06 1.06c-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788 3.807-3.808 9.98-3.808 13.788 0A9.722 9.722 0 0 1 21.75 12c0 .975-.296 1.887-.809 2.571-.514.685-1.28 1.179-2.191 1.179-.904 0-1.666-.487-2.18-1.164a5.25 5.25 0 1 1-.82-6.26V8.25a.75.75 0 0 1 1.5 0V12c0 .682.208 1.27.509 1.671.3.401.659.579.991.579.332 0 .69-.178.991-.579.3-.4.509-.99.509-1.671a8.222 8.222 0 0 0-2.416-5.834ZM15.75 12a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0Z" clip-rule="evenodd" />
              </svg>
              <span>Login</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('register') }}" class="link-dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
              </svg>
              <span>Register</span>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</header>
<!-- Navigation Menu -->
<nav class="bg-white border-b border-gray-300">
  <div class="flex items-center justify-between container mx-auto">
    <ul class="flex items-center justify-center gap-5">
      <li>
        <a href="{{ route('home') }}" class="nav-link @if($active == 'home') nav-link-active @endif"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
          </svg>
          Home</a>
      </li>
      <li>
        <div x-data="{ open: false }" class="relative ">
          <button @mouseenter="open = true" @mouseleave="open = false" class="@if($active == 'products') nav-link-active @endif nav-link flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
              <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
              <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
            </svg>
            <span>Products</span>
            <svg :class="{'rotate-90': open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform duration-300 ">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
            <ul x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="absolute list-dropdown translate-y-1 top-full left-0 text-black">
              <li>
                <a href="{{ route('products.all') }}" class="link-dropdown">All Products</a>
              </li>
              @foreach ($categories as $category)
              <li>
                <a href="{{ route('products.all', ['category[]' => $category->name]) }}" class="link-dropdown">{{ $category->name }}</a>
              </li>
              @endforeach
            </ul>
          </button>
        </div>
      </li>
      <!-- <li>
        <a href="#" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 0 0 3 3h15a3 3 0 0 1-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125ZM12 9.75a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H12Zm-.75-2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H12a.75.75 0 0 1-.75-.75ZM6 12.75a.75.75 0 0 0 0 1.5h7.5a.75.75 0 0 0 0-1.5H6Zm-.75 3.75a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75ZM6 6.75a.75.75 0 0 0-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-3A.75.75 0 0 0 9 6.75H6Z" clip-rule="evenodd" />
            <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 0 1-3 0V6.75Z" />
          </svg>
          Blogs</a>
      </li> -->
      <li>
        <a href="{{ route('about.index') }}" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
          </svg>
          About
        </a>
      </li>
    </ul>
    <div class="relative flex w-full max-w-xs flex-col gap-1 text-slate-700 dark:text-slate-300">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-slate-700/50 dark:text-slate-300/50">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
      </svg>
      <form action="{{route('products.all')}}" method="get">
        <input type="search" class="w-full rounded-xl border border-slate-300 bg-slate-100 py-2.5 pl-10 pr-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50 dark:focus-visible:outline-violet-600" name="search" placeholder="Search" aria-label="search" />
      </form>
    </div>
  </div>
</nav>