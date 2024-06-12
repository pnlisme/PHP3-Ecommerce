@extends('layouts.clients.app')

@section('title', 'LaBi - Home')

@section('link')
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- AOS CSS & JS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endsection

@section('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".homeSlider", {
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 2000,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    }
  });
</script>
<!-- AOS JS -->
<script>
  AOS.init();
</script>
@endsection

@section('content')
<section class="slider container mx-auto">
  <div class="my-10 rounded overflow-hidden border">
    <div class="swiper homeSlider">
      <div class="swiper-wrapper">
        <div class="swiper-slide relative">
          <img src="{{asset('images/slide/1.jpg')}}" alt="Organic &amp; healthy vegetables" class="rounded object-cover">
          <div class="absolute top-0 left-0 h-full w-1/2">
            <div class="inline-flex flex-col justify-center h-full ml-20">
              <p class=" text-violet-600 text-xl mb-3" data-aos="fade-up" data-aos-duration="1000">Starting at <b>$20.00</b></p>
              <h3 class="text-4xl font-bold text-gray-600 text-wrap mb-10" data-aos="fade-up" data-aos-duration="1500">Organic &amp; healthy vegetables</h3>
              <a class="btn" data-aos="fade-up" data-aos-duration="2000" href="#">Shop Now <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="swiper-slide relative">
          <img src="{{asset('images/slide/2.jpg')}}" alt="Explore fresh &amp; juicy fruits" class="rounded object-cover">
          <div class="absolute top-0 left-0 h-full w-1/2">
            <div class="inline-flex flex-col justify-center h-full ml-20">
              <p class="text-violet-600 text-xl mb-3" data-aos="fade-up" data-aos-duration="1000">Starting at <b>$29.99</b></p>
              <h3 class="text-4xl font-bold text-gray-600 text-wrap mb-10" data-aos="fade-up" data-aos-duration="1500">
                Explore fresh &amp; juicy fruits
              </h3>
              <a class="btn" data-aos="fade-up" data-aos-duration="2000" href="#">Shop Now <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

<section class="category container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
  <div class="grid grid-cols-5 gap-10 py-10">
    <div class="rounded bg-gradient-to-b from-slate-50 to-green-200 p-6 ">
      <a href="#" class="hover:scale-105 w-full transition-all duration-300 flex flex-col items-center justify-center  p-5 rounded bg-white relative">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
          <path d="M20.019,4.976c1.81-1.711,1.974-3.867,1.98-3.962l.021-.331-.296-.148c-.043-.022-1.079-.534-2.768-.534-3.722,0-5.69,2.408-6.648,4.242-.421-1.993-1.615-4.242-4.309-4.242V1c2.627,0,3.283,2.781,3.446,4.198-1.162-.753-2.523-1.198-3.946-1.198C3.364,4,0,7.354,0,11.478c0,7.108,7.998,12.522,12,12.522s12-5.414,12-12.522c0-2.781-1.542-5.263-3.981-6.502Zm-1.062-3.976c.92,0,1.61,.175,1.989,.3-.131,.656-.558,2.092-1.888,3.19-1.479,1.221-3.642,1.705-6.407,1.443,.472-1.406,2.076-4.934,6.306-4.934Zm-6.957,22c-3.281,0-11-4.865-11-11.522,0-3.571,2.916-6.478,6.5-6.478,3.463,0,6.5,3.037,6.5,6.5,0,3.433-2.366,6.43-2.39,6.46l.779,.626c.106-.133,2.61-3.295,2.61-7.086,0-1.661-.606-3.237-1.602-4.512,.223,.01,.442,.015,.657,.015,2.051,0,3.754-.446,5.087-1.332,2.347,.986,3.857,3.25,3.857,5.806,0,6.657-7.719,11.522-11,11.522Z" fill="#7c3aed" />
        </svg>
        <span class="badge">15%</span>
        <span class="font-bold text-gray-700 mt-2 mb-1 transition-colors duration-300">Fruits</span>
        <span class="text-sm text-gray-400 transition-colors duration-300">108 items</span>
      </a>
    </div>
    <div class="rounded bg-gradient-to-b from-slate-50 to-yellow-100 p-6">
      <a href="#" class="hover:scale-105 w-full transition-all duration-300 flex flex-col items-center justify-center  p-5 rounded bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
          <path d="M5.758,24.003c-1.73,0-3.174-.524-4.205-1.556C-.053,20.841-.431,18.233,.49,15.103c.89-3.025,2.896-6.208,5.651-8.962S12.078,1.379,15.103,.49c3.131-.921,5.739-.542,7.344,1.063h0c1.606,1.606,1.984,4.214,1.063,7.344-.89,3.025-2.896,6.208-5.651,8.962s-5.938,4.761-8.962,5.651c-1.121,.33-2.175,.493-3.139,.493ZM18.241,.996c-.867,0-1.826,.15-2.855,.453-2.868,.843-5.899,2.76-8.538,5.398S2.292,12.518,1.449,15.385c-.813,2.763-.525,5.02,.811,6.355,1.335,1.335,3.591,1.624,6.355,.811,2.868-.843,5.899-2.76,8.538-5.398s4.555-5.67,5.398-8.538c.813-2.763,.525-5.02-.811-6.355h0c-.838-.838-2.039-1.264-3.5-1.264ZM9,9v1c3.038,0,5,1.962,5,5h1c0-3.589-2.411-6-6-6Zm4-4v1c3.038,0,5,1.962,5,5h1c0-3.589-2.411-6-6-6ZM5,13v1c3.038,0,5,1.962,5,5h1c0-3.589-2.411-6-6-6Z" fill="#7c3aed" />
        </svg>
        <span class="font-bold text-gray-700 mt-2 mb-1 transition-colors duration-300">Bakery</span>
        <span class="text-sm text-gray-400 transition-colors duration-300">108 items</span>
      </a>
    </div>
    <div class="rounded bg-gradient-to-b from-slate-50 to-red-100 p-6">
      <a href="#" class="hover:scale-105 w-full transition-all duration-300 flex flex-col items-center justify-center  p-5 rounded bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
          <path d="M22.386,10.013c-1.274,.3-2.406,.778-3.411,1.377-.333-6.487-3.892-11.39-6.975-11.39S5.358,4.903,5.025,11.39c-1.005-.599-2.137-1.077-3.411-1.377l-.614-.145v.631c0,10.385,6.805,13.345,10.679,13.5l.643-.006c3.874-.155,10.679-3.109,10.679-13.494v-.631l-.614,.145ZM2.01,11.153c7.151,2.133,9.242,10.755,9.476,11.829-3.469-.242-9.208-2.935-9.476-11.829Zm9.99,9.892c-.581-1.831-1.742-4.663-3.855-7.044h2.855v-1h-3.832c-.364-.338-.752-.66-1.164-.962,.014-.694,.069-1.375,.161-2.038h1.835v-1h-1.667c.212-1.072,.517-2.082,.888-3h3.78v-1h-3.333c1.198-2.428,2.855-4,4.333-4s3.135,1.572,4.333,4h-3.333v1h3.78c.371,.918,.675,1.928,.888,3h-1.667v1h1.835c.092,.663,.147,1.344,.161,2.038-.412,.302-.8,.624-1.164,.962h-3.832v1h2.855c-2.113,2.381-3.275,5.214-3.855,7.044Zm.515,1.938c.233-1.074,2.324-9.696,9.476-11.829-.268,8.894-6.007,11.587-9.476,11.829Zm1.485-12.982h-4v-1h4v1Z" fill="#7c3aed" />
        </svg>
        <span class="font-bold text-gray-700 mt-2 mb-1 transition-colors duration-300">Vegetables</span>
        <span class="text-sm text-gray-400 transition-colors duration-300">108 items</span>
      </a>
    </div>
    <div class="rounded bg-gradient-to-b to-slate-50 from-orange-200 p-6">
      <a href="#" class="hover:scale-105 w-full transition-all duration-300 flex flex-col items-center justify-center  p-5 rounded bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
          <path d="M20.194,1c.574,1.161,2.806,6.06,2.806,12h1c0-7.046-3.078-12.771-3.203-13H2.269l2.124,5.45C3.677,6.647,.465,12.481,.003,21.37c-.036,.689,.208,1.345,.685,1.848,.472,.497,1.134,.782,1.817,.782H18.521c.69,0,1.333-.276,1.811-.776,.477-.5,.723-1.153,.691-1.84-.42-9.168-3.506-15.085-4.022-16.015V1h3.194ZM3.731,1h12.269V5H5.29L3.731,1ZM20.023,21.43c.019,.412-.128,.803-.415,1.104-.288,.301-.674,.467-1.088,.467H2.505c-.416,0-.804-.167-1.092-.471-.287-.302-.432-.695-.411-1.108,.168-3.24,.724-6.081,1.385-8.421h14.613c-.101-.349-.203-.684-.306-1H2.684c1.009-3.223,2.157-5.331,2.547-6h10.972c.649,1.233,3.433,6.973,3.82,15.43Z" fill="#7c3aed" />
        </svg>
        <span class="font-bold text-gray-700 mt-2 mb-1 transition-colors duration-300">Dairy & Milk</span>
        <span class="text-sm text-gray-400 transition-colors duration-300">108 items</span>
      </a>
    </div>
    <div class="rounded bg-gradient-to-b to-slate-50 from-violet-200 p-6">
      <a href="#" class="hover:scale-105 w-full transition-all duration-300 flex flex-col items-center justify-center  p-5 rounded bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
          <path d="M23.439,11.923c-.388-.477-.929-.789-1.524-.888l.946-2.726c.444-1.306-.256-2.73-1.562-3.174-.578-.197-1.192-.172-1.736,.045l.4-2.263c.113-.659-.038-1.322-.425-1.867-.386-.545-.962-.907-1.621-1.02-1.358-.233-2.652,.684-2.883,2.028l-.195,.979c-.402-1.183-1.523-2.036-2.84-2.036s-2.443,.858-2.843,2.045l-.194-.975C8.729,.713,7.432-.206,6.077,.029c-1.36,.232-2.277,1.527-2.045,2.887h0v.003l.4,2.26c-.543-.218-1.157-.242-1.736-.044-.632,.215-1.144,.664-1.438,1.263-.295,.6-.339,1.278-.123,1.914l.945,2.724c-.594,.1-1.132,.412-1.52,.888C.084,12.509-.101,13.27,.054,14.01l1.335,6.408c.432,2.076,2.285,3.582,4.405,3.582h12.413c2.12,0,3.973-1.506,4.405-3.582l1.335-6.408c.154-.74-.031-1.5-.507-2.087Zm-4.118-5.372c.404-.451,1.086-.664,1.656-.47,.38,.129,.687,.398,.863,.758,.177,.36,.204,.768,.076,1.144l-1.047,3.017h-2.335l.787-4.449Zm-4.321,.805l1.018-5.116c.141-.814,.921-1.361,1.733-1.225,.816,.14,1.367,.917,1.228,1.73l-1.461,8.255h-2.518v-3.644Zm-5-3.356c0-1.103,.897-2,2-2s2,.897,2,2v7h-4V4ZM6.245,1.015c.818-.135,1.592,.411,1.735,1.238l1.02,5.126v3.622h-2.523L5.017,2.747c-.139-.816,.412-1.593,1.228-1.732ZM2.155,6.839c.177-.36,.484-.629,.864-.759,.572-.194,1.252,.019,1.656,.471l.787,4.448H3.127l-1.046-3.014c-.129-.379-.103-.787,.074-1.146Zm20.813,6.966l-1.335,6.408c-.336,1.614-1.777,2.786-3.426,2.786H5.793c-1.649,0-3.09-1.172-3.426-2.786l-1.335-6.408c-.092-.444,.019-.9,.305-1.252,.286-.352,.71-.554,1.164-.554H21.5c.454,0,.877,.202,1.164,.554,.286,.352,.397,.808,.305,1.252Z" fill="#7c3aed" />
        </svg>
        <span class="font-bold text-gray-700 mt-2 mb-1 transition-colors duration-300">Snack & Spice</span>
        <span class="text-sm text-gray-400 transition-colors duration-300">108 items</span>
      </a>
    </div>
  </div>
</section>

<section class="deal container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
  <div class="py-10">
    <div class="flex justify-between items-center mb-10">
      <div>
        <h3 class="font-bold text-2xl">Day Of The <span class="text-violet-700">Deal</span></h3>
        <p class="text-gray-500">Don't wait. The time will never be just right.</p>
      </div>
      <div>
        <p>Countdown is here</p>
      </div>
    </div>
    <div class="grid grid-cols-5 gap-5">
      @foreach ($productsDeal as $product)
      @include('partials.product-card', $product)
      @endforeach
    </div>
  </div>
</section>

<section class="banner container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
  <div class="py-10 rounded overflow-hidden">
    <div class="relative">
      <img src="{{asset('images/banner.jpeg')}}" alt="Fresh Fruits Healthy Products" class="rounded">
      <div class="absolute top-0 right-0 inset-0 w-full h-full p-20 flex flex-col justify-center items-end">
        <h3 class="text-4xl font-bold text-gray-600 mb-5 text-end">Fresh Fruits <br> Healthy Products</h3>
        <p class="text-3xl font-medium mb-10 text-gray-500"><span class="text-violet-600">30% off sale</span> Hurry up!!!</p>
        <a href="#" class="btn btn-primary text-sm font-medium">Shop now</a>
      </div>
    </div>
  </div>
</section>

<section class="arrivals container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
  <div class="py-10">
    <div class="flex justify-between items-end mb-10">
      <div>
        <h3 class="font-bold text-2xl">New <span class="text-violet-700">Arrivals</span></h3>
        <p class="text-gray-500">Shop online for new arrivals and get free shipping!</p>
      </div>
      <div class="flex gap-8">
        <button class="hover:text-violet-600 transition-all duration-300 text-sm p-1 font-bold text-violet-600 uppercase">All</button>
        <button class="hover:text-violet-600 transition-all duration-300 text-sm p-1 font-bold text-gray-500 uppercase">Snack & Spices</button>
        <button class="hover:text-violet-600 transition-all duration-300 text-sm p-1 font-bold text-gray-500 uppercase">Fruits</button>
        <button class="hover:text-violet-600 transition-all duration-300 text-sm p-1 font-bold text-gray-500 uppercase">Vegetables</button>
      </div>
    </div>
    <div class="grid grid-cols-5 gap-5">
      @foreach ($productsArrival as $product)
      @include('partials.product-card', $product)
      @endforeach
    </div>
  </div>
</section>

@include('partials.banner-offers')

<section class="services container mx-auto">
  <div class="py-10 grid grid-cols-4 gap-10">
    <div class="flex flex-col items-center justify-center border rounded px-10 py-8" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
        <path d="M23.666,10.418l-1.008-3.025c-.477-1.431-1.811-2.393-3.32-2.393h-2.366c-.25-2.247-2.16-4-4.472-4H4.5C2.019,1,0,3.019,0,5.5v14.5c0,1.654,1.346,3,3,3,1.043,0,1.962-.535,2.5-1.344,.538,.809,1.457,1.344,2.5,1.344,1.654,0,3-1.346,3-3v-1h5v1c0,1.654,1.346,3,3,3s3-1.346,3-3v-1.338c1.181-.563,2-1.769,2-3.162v-3.026c0-.7-.112-1.392-.334-2.056Zm-1.957-2.708l1.008,3.025c.029,.088,.056,.177,.081,.266h-5.799V6h2.338c1.078,0,2.031,.687,2.372,1.709ZM1,5.5c0-1.93,1.57-3.5,3.5-3.5H12.5c1.93,0,3.5,1.57,3.5,3.5v12.5H1V5.5ZM3,22c-1.103,0-2-.897-2-2v-1H5v1c0,1.103-.897,2-2,2Zm7-2c0,1.103-.897,2-2,2s-2-.897-2-2v-1h4v1Zm11,0c0,1.103-.897,2-2,2s-2-.897-2-2v-1h3.5c.17,0,.337-.012,.5-.036v1.036Zm2-4.5c0,1.378-1.122,2.5-2.5,2.5h-3.5v-6h5.979c.014,.157,.021,.315,.021,.474v3.026Z" fill="#7c3aed" />
      </svg>
      <h3 class="text-xl font-medium mt-3 mb-1">Free Shipping</h3>
      <p class="text-center text-gray-500">Free shipping on all US order or order above $200</p>
    </div>
    <div class="flex flex-col items-center justify-center border rounded px-10 py-8" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
        <path d="M23.106,16.354l-5.209,4.903c-1.944,1.771-4.455,2.743-7.077,2.743H0v-1H10.82c2.372,0,4.645-.88,6.397-2.478l5.192-4.887c.547-.547,.651-1.407,.23-1.991-.266-.37-.658-.594-1.104-.63-.438-.03-.87,.123-1.183,.435l-4.011,3.776-.018-.019c-.456,.488-1.105,.793-1.825,.793h-5.5v-1h5.5c.827,0,1.5-.673,1.5-1.5v-1.5h-7.188c-2.537,0-4.923,.988-6.718,2.782l-1.322,1.323-.707-.707,1.322-1.323c1.984-1.983,4.621-3.075,7.425-3.075h8.188v2.233l2.657-2.502c.509-.509,1.239-.775,1.959-.713,.732,.059,1.402,.438,1.836,1.042,.704,.977,.555,2.393-.346,3.293ZM4,.5V0h.5c3.846,0,6.078,1.201,7,3.904,.922-2.703,3.154-3.904,7-3.904h.5V.5c0,5.087-2.101,7.352-7,7.493v3.007h-1v-3.007c-4.899-.141-7-2.406-7-7.493ZM12.007,6.993c4.192-.121,5.865-1.794,5.986-5.986-4.192,.121-5.865,1.794-5.986,5.986ZM5.007,1.007c.121,4.192,1.794,5.865,5.986,5.986-.121-4.192-1.794-5.865-5.986-5.986Z" fill="#7c3aed" />
      </svg>
      <h3 class="text-xl font-medium mt-3 mb-1">24X7 Support</h3>
      <p class="text-center text-gray-500">Contact us 24 hours a day, 7 days a week</p>
    </div>
    <div class="flex flex-col items-center justify-center border rounded px-10 py-8" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
        <path d="M12,24c-1.624,0-3.145-.755-4.128-2.035-1.6,.208-3.209-.331-4.357-1.48-1.148-1.148-1.689-2.757-1.48-4.357-1.279-.983-2.034-2.503-2.034-4.128s.755-3.145,2.034-4.128c-.209-1.6,.332-3.209,1.48-4.357,1.148-1.149,2.758-1.692,4.357-1.48,.983-1.28,2.504-2.035,4.128-2.035s3.145,.755,4.128,2.035c1.598-.212,3.208,.331,4.357,1.48s1.689,2.757,1.48,4.357c1.279,.983,2.034,2.503,2.034,4.128s-.755,3.145-2.034,4.128c.209,1.6-.332,3.209-1.48,4.357-1.149,1.148-2.76,1.688-4.357,1.48-.983,1.28-2.504,2.035-4.128,2.035Zm-3.674-3.132l.185,.274c.785,1.163,2.089,1.857,3.489,1.857s2.704-.694,3.489-1.857l.185-.274,.325,.063c1.374,.266,2.788-.163,3.779-1.153,.99-.99,1.421-2.403,1.153-3.78l-.062-.325,.274-.185c1.162-.784,1.856-2.088,1.856-3.488s-.694-2.704-1.856-3.488l-.274-.185,.062-.325c.268-1.377-.163-2.791-1.153-3.78-.991-.99-2.405-1.42-3.779-1.153l-.325,.063-.185-.274c-.785-1.163-2.089-1.857-3.489-1.857s-2.704,.694-3.489,1.857l-.185,.274-.325-.063c-1.373-.268-2.789,.163-3.779,1.153-.99,.99-1.421,2.403-1.153,3.78l.062,.325-.274,.185c-1.162,.784-1.856,2.088-1.856,3.488s.694,2.704,1.856,3.488l.274,.185-.062,.325c-.268,1.377,.163,2.791,1.153,3.78,.99,.99,2.406,1.419,3.779,1.153l.325-.063Zm.674-12.868c-.552,0-1,.448-1,1s.448,1,1,1,1-.448,1-1-.448-1-1-1Zm6,6c-.552,0-1,.448-1,1s.448,1,1,1,1-.448,1-1-.448-1-1-1Zm-6,2h1.2l4.8-8h-1.2l-4.8,8Z" fill="#7c3aed" />
      </svg>
      <h3 class="text-xl font-medium mt-3 mb-1">30 Days Return</h3>
      <p class="text-center text-gray-500">Simply return it within 30 days for an exchange</p>
    </div>
    <div class="flex flex-col items-center justify-center border rounded px-10 py-8" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
        <path d="M24,20.5c0,1.93-1.57,3.5-3.5,3.5H3.5c-1.93,0-3.5-1.57-3.5-3.5,0-1.54,1.001-2.852,2.386-3.318,.221,.295,.455,.58,.702,.853-1.183,.197-2.087,1.227-2.087,2.465,0,1.379,1.122,2.5,2.5,2.5H20.5c1.378,0,2.5-1.121,2.5-2.5,0-1.238-.905-2.268-2.087-2.465,.246-.273,.481-.558,.702-.853,1.385,.467,2.386,1.778,2.386,3.318Zm-13.5-5.5h1v2h1v-2h1c1.378,0,2.5-1.121,2.5-2.5,0-1.369-.981-2.521-2.334-2.739l-3.173-.509c-.865-.14-1.493-.877-1.493-1.752,0-.827,.673-1.5,1.5-1.5h3c.827,0,1.5,.673,1.5,1.5v.5h1v-.5c0-1.379-1.122-2.5-2.5-2.5h-1V3h-1v2h-1c-1.378,0-2.5,1.121-2.5,2.5,0,1.369,.981,2.521,2.334,2.739l3.173,.509c.865,.14,1.493,.877,1.493,1.752,0,.827-.673,1.5-1.5,1.5h-3c-.827,0-1.5-.673-1.5-1.5v-.5h-1v.5c0,1.379,1.122,2.5,2.5,2.5ZM2,10C2,4.486,6.486,0,12,0s10,4.486,10,10-4.486,10-10,10S2,15.514,2,10Zm1,0c0,4.963,4.038,9,9,9s9-4.037,9-9S16.962,1,12,1,3,5.037,3,10Z" fill="#7c3aed" />
      </svg>
      <h3 class="text-xl font-medium mt-3 mb-1">Payment Secure</h3>
      <p class="text-center text-gray-500">Contact us 24 hours a day, 7 days a week</p>
    </div>
  </div>
</section>

<section class="list-products container mx-auto">
  <div class="py-10 grid grid-cols-4 gap-10">
    <div class="flex flex-col rounded overflow-hidden relative" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
      <img class="object-cover" src=" {{asset('images/listproducts-banner.jpeg')}} " alt="List Products Banner">
      <div class="absolute top-0 left-0 w-full p-8">
        <h3 class="text-2xl font-bold text-gray-700 mb-4">Our Top Most Products Check It Now</h3>
        <a class="btn btn-primary text-sm font-medium" href="#">Shop Now</a>
      </div>
    </div>
    <div class="flex flex-col" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
      <h3 class="text-2xl font-bold text-gray-700 mb-4">Trending <span class="text-violet-700">Items</span></h3>
      <div class="grid grid-rows-3 gap-5 h-full">
        @foreach ($productsTrending as $product)
        <div class="flex border rounded overflow-hidden relative group group-hover">
          <div class="flex items-center justify-center">
            <img class="object-cover max-w-24 h-full" src="{{$product->images[0]->name}}" alt="">
          </div>
          <div class="p-3">
            <a href="#" class="line-clamp-1 text-medium link-hover">{{$product->name}}</a>
            <span class="text-[13px] text-gray-500 mt-2 mb-1 block text-medium">{{$product->category->name}}</span>
            <div class="flex gap-3">
              <span class=" font-bold">${{$product->price}}</span>
              <del class=" text-gray-500">${{$product->price_fake}}</del>
            </div>
          </div>
          <button class="group-hover:opacity-100 transition-all duration-300 absolute m-2 opacity-0 bottom-0 right-0 border p-1 rounded text-gray-500 bg-white shadow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
            </svg>
          </button>
        </div>
        @endforeach
      </div>
    </div>
    <div class="flex flex-col" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true">
      <h3 class="text-2xl font-bold text-gray-700 mb-4">Top <span class="text-violet-700">Rated</span></h3>
      <div class="grid grid-rows-3 gap-5 h-full">
        @foreach ($productsRated as $product)
        <div class="flex border rounded overflow-hidden relative group group-hover">
          <div class="flex items-center justify-center">
            <img class="object-cover max-w-24 h-full" src="{{$product->images[0]->name}}" alt="">
          </div>
          <div class="p-3">
            <a href="#" class="line-clamp-1 text-medium link-hover">{{$product->name}}</a>
            <span class="text-[13px] text-gray-500 mt-2 mb-1 block text-medium">{{$product->category->name}}</span>
            <div class="flex gap-3">
              <span class=" font-bold">${{$product->price}}</span>
              <del class=" text-gray-500">${{$product->price_fake}}</del>
            </div>
          </div>
          <button class="group-hover:opacity-100 transition-all duration-300 absolute m-2 opacity-0 bottom-0 right-0 border p-1 rounded text-gray-500 bg-white shadow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
            </svg>
          </button>
        </div>
        @endforeach
      </div>
    </div>
    <div class="flex flex-col" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
      <h3 class="text-2xl font-bold text-gray-700 mb-4">'Top' <span class="text-violet-700"> Viewed </span></h3>
      <div class="grid grid-rows-3 gap-5 h-full">
        @foreach ($productsViewed as $product)
        <div class="flex border rounded overflow-hidden relative group group-hover">
          <div class="flex items-center justify-center">
            <img class="object-cover max-w-24 h-full" src="{{$product->images[0]->name}}" alt="">
          </div>
          <div class="p-3">
            <a href="#" class="line-clamp-1 text-medium link-hover">{{$product->name}}</a>
            <span class="text-[13px] text-gray-500 mt-2 mb-1 block text-medium">{{$product->category->name}}</span>
            <div class="flex gap-3">
              <span class=" font-bold">${{$product->price}}</span>
              <del class=" text-gray-500">${{$product->price_fake}}</del>
            </div>
          </div>
          <button class="group-hover:opacity-100 transition-all duration-300 absolute m-2 opacity-0 bottom-0 right-0 border p-1 rounded text-gray-500 bg-white shadow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"></path>
            </svg>
          </button>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="blog container mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
  <div class="py-10">
    <div class="flex justify-between items-center mb-10">
      <div>
        <h3 class="font-bold text-2xl">Lastest <span class="text-violet-700">Blog</span></h3>
        <p class="text-gray-500">We tackle interesting topics every day in 2023.</p>
      </div>
      <div>
        <a href="#" class="text-lg font-medium text-gray-500 flex items-center gap-1 link-hover">All Blog <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
          </svg>
        </a>
      </div>
    </div>
    <div class="grid grid-cols-4 gap-10">
      <div class="flex flex-col">
        <a href="#" class="rounded  overflow-hidden">
          <img class="hover:-rotate-3 hover:scale-110 transition-all duration-300" src="{{asset('images/blog/4.jpg')}}" alt="">
        </a>
        <div class="py-3">
          <div class="mb-2 text-sm font-medium text-gray-500">
            <span>January 25,2022 - </span> <a href="#" class="link-hover">Drink</a>
          </div>
          <a href="#" class="text-xl font-bold text-gray-700 block mb-2">
            Marketing Guide: 5 Steps way to Success.
          </a>
          <a href="#" class="inline-flex items-center gap-0.5 text-sm font-medium link-hover text-gray-500">Read More <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col">
        <a href="#" class="rounded  overflow-hidden">
          <img class="hover:-rotate-3 hover:scale-110 transition-all duration-300" src="{{asset('images/blog/4.jpg')}}" alt="">
        </a>
        <div class="py-3">
          <div class="mb-2 text-sm font-medium text-gray-500">
            <span>January 25,2022 - </span> <a href="#" class="link-hover">Drink</a>
          </div>
          <a href="#" class="text-xl font-bold text-gray-700 block mb-2">
            Marketing Guide: 5 Steps way to Success.
          </a>
          <a href="#" class="inline-flex items-center gap-0.5 text-sm font-medium link-hover text-gray-500">Read More <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col">
        <a href="#" class="rounded  overflow-hidden">
          <img class="hover:-rotate-3 hover:scale-110 transition-all duration-300" src="{{asset('images/blog/4.jpg')}}" alt="">
        </a>
        <div class="py-3">
          <div class="mb-2 text-sm font-medium text-gray-500">
            <span>January 25,2022 - </span> <a href="#" class="link-hover">Drink</a>
          </div>
          <a href="#" class="text-xl font-bold text-gray-700 block mb-2">
            Marketing Guide: 5 Steps way to Success.
          </a>
          <a href="#" class="inline-flex items-center gap-0.5 text-sm font-medium link-hover text-gray-500">Read More <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
      </div>
      <div class="flex flex-col">
        <a href="#" class="rounded  overflow-hidden">
          <img class="hover:-rotate-3 hover:scale-110 transition-all duration-300" src="{{asset('images/blog/4.jpg')}}" alt="">
        </a>
        <div class="py-3">
          <div class="mb-2 text-sm font-medium text-gray-500">
            <span>January 25,2022 - </span> <a href="#" class="link-hover">Drink</a>
          </div>
          <a href="#" class="text-xl font-bold text-gray-700 block mb-2">
            Marketing Guide: 5 Steps way to Success.
          </a>
          <a href="#" class="inline-flex items-center gap-0.5 text-sm font-medium link-hover text-gray-500">Read More <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection