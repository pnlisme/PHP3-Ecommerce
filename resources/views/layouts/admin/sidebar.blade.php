<div class="bg-white h-screen min-w-56">
  <div class="flex items-center">
    <img class="ml-5 object-cover h-16" src="{{asset('images/purple-logo.png')}}" alt="Logo">
  </div>
  <div>
    <ul class="mt-5 flex flex-col gap-1">
      <li class="relative">
        <a class="nav-admin @if($title == 'Dashboard') nav-admin-active @endif" href="{{route('admin.dashboard')}}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z" />
          </svg>
          Dashboard
        </a>

        @if($title == 'Dashboard')
        <span class="absolute top-0 left-0 w-1 h-full rounded-tr-lg rounded-br-lg bg-violet-700"></span>
        @endif
      </li>
      <li class="relative">
        <a class="nav-admin @if($title == 'Categories') nav-admin-active @endif" href="{{route('categories.index')}}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
          </svg>
          Categories
        </a>
        @if($title == 'Categories')
        <span class="absolute top-0 left-0 w-1 h-full rounded-tr-lg rounded-br-lg bg-violet-700"></span>
        @endif
      </li>
      <li class="relative">
        <a class="nav-admin @if($title == 'Products') nav-admin-active @endif" href="{{route('products.index')}}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M6 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6ZM15.75 3a3 3 0 0 0-3 3v2.25a3 3 0 0 0 3 3H18a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3h-2.25ZM6 12.75a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h2.25a3 3 0 0 0 3-3v-2.25a3 3 0 0 0-3-3H6ZM17.625 13.5a.75.75 0 0 0-1.5 0v2.625H13.5a.75.75 0 0 0 0 1.5h2.625v2.625a.75.75 0 0 0 1.5 0v-2.625h2.625a.75.75 0 0 0 0-1.5h-2.625V13.5Z" />
          </svg>
          Products
        </a>
        @if($title == 'Products')
        <span class="absolute top-0 left-0 w-1 h-full rounded-tr-lg rounded-br-lg bg-violet-700"></span>
        @endif
      </li>
      <li class="relative">
        <a class="nav-admin @if($title == 'Users') nav-admin-active @endif" href="{{route('users.index')}}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
          </svg>
          Users
        </a>
        @if($title == 'Users')
        <span class="absolute top-0 left-0 w-1 h-full rounded-tr-lg rounded-br-lg bg-violet-700"></span>
        @endif
      </li>
      <li class="relative">
        <a class="nav-admin @if($title == 'Orders') nav-admin-active @endif" href="{{route('orders.index')}}">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
            <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
            <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
          </svg>
          Orders
        </a>
        @if($title == 'Orders')
        <span class="absolute top-0 left-0 w-1 h-full rounded-tr-lg rounded-br-lg bg-violet-700"></span>
        @endif
      </li>
    </ul>
    <a href="#" class="mt-5 mx-7 px-3 py-2 bg-violet-700 text-white flex items-center justify-between text-sm font-medium rounded-lg hover:bg-gray-700 transition-all duration-300">
      Create Account <span>+</span>
    </a>
  </div>
</div>