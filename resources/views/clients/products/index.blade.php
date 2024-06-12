@extends('layouts.clients.app')

@section('title', 'Products')

@section('content')
@include('partials.breadcrumb', ['name' => 'All Products'])
@include('partials.banner-offers')

<section class="main container mx-auto">
  <div class="flex gap-5 py-10">
    <div class="w-1/5">
      <form method="get" id="filterForm" action="{{route('products.all')}}">
        <input type="hidden" name="search" value="{{request('search')}}">
        <div class="px-4 flex flex-col divide-y border rounded">
          <div class="w-full py-3" x-data="{open: true}">
            <h3 class="flex justify-between items-center text-lg font-bold text-gray-500 cursor-pointer" @click="open = !open">
              Category <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 transition-all duration-300" :class="{'rotate-90' : open}">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </h3>
            <div class="mt-3 px-1 pt-3 pb-5 border-t flex flex-col gap-2 box-border overflow-hidden" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
              @foreach ($categories as $category)
              <label for="{{$category->name}}" class="flex cursor-pointer items-center gap-2 text-base font-medium text-slate-700 dark:text-slate-300 [&:has(input:checked)]:text-black dark:[&:has(input:checked)]:text-white [&:has(input:disabled)]:opacity-75 [&:has(input:disabled)]:cursor-not-allowed">
                <div class="relative flex items-center">
                  <input id="{{$category->name}}" name="category[]" value="{{$category->name}}" type="checkbox" class="before:content[''] peer relative size-4 cursor-pointer appearance-none overflow-hidden rounded border border-slate-300 bg-slate-100 before:absolute before:inset-0 checked:border-violet-700 checked:before:bg-violet-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-violet-700 active:outline-offset-0 disabled:cursor-not-allowed dark:border-slate-700 dark:bg-slate-800 dark:checked:border-violet-600 dark:checked:before:bg-violet-600 dark:focus:outline-slate-300 dark:checked:focus:outline-violet-600" @if (request('category') !=null && in_array($category->name, request('category'))) checked @endif
                  />
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4" class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-slate-100 peer-checked:visible dark:text-slate-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                </div>
                <span>{{$category->name}}</span>
              </label>
              @endforeach
            </div>
          </div>
          <div class="w-full py-3" x-data="{open: true}">
            <h3 class="flex justify-between items-center text-lg font-bold text-gray-500 cursor-pointer" @click="open = !open">
              Price <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 transition-all duration-300" :class="{'rotate-90' : open}">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </h3>
            <div class="mt-3 px-1 pt-3 pb-5 border-t flex flex-col gap-2 box-border overflow-hidden" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
              <div class="flex flex-col gap-2">
                @foreach ($filterPrice as $price => $name)
                <div class="flex items-center justify-start gap-2 font-medium text-slate-700 has-[:disabled]:opacity-75 dark:text-slate-300">
                  <input id="{{$price}}" type="radio" class="before:content[''] relative h-4 w-4 appearance-none rounded-full border border-slate-300 bg-slate-100 before:invisible before:absolute before:left-1/2 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-x-1/2 before:-translate-y-1/2 before:rounded-full before:bg-slate-100 checked:border-violet-700 checked:bg-violet-700 checked:before:visible focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-slate-800 checked:focus:outline-violet-700 disabled:cursor-not-allowed dark:border-slate-700 dark:bg-slate-800 dark:before:bg-slate-100 dark:checked:border-violet-600 dark:checked:bg-violet-600 dark:focus:outline-slate-300 dark:checked:focus:outline-violet-600" name="price" value="{{$price}}" @if(request('price')==$price) checked @endif />
                  <label for="{{$price}}" class="text-sm">{{$name}}</label>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="w-4/5">
      <div class="flex justify-between items-center mb-5">
        <div class="flex gap-4">
          <button type="submit" class="flex items-center gap-1 btn btn-primary" id="filterButton">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
            </svg>
            Filter
          </button>
          @if (request()->query('search') != null || request()->query('search') == null && request()->query('category') != null || request()->query('price') != null || request()->query('sortby') != null)
          <a href="{{route('products.all')}}" class="btn flex items-center gap-1 bg-gray-300 text-black hover:bg-red-600 hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 rotate-180">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
            </svg>
            Clear</a>
          @endif
        </div>
        <div>
          <div x-data="{
        selectOpen: false,
        selectedItem: {{request('sortby') ? '{ title: "'.ucfirst(request('sortby')).'", value: "'.request('sortby').'" }' : "{ title: 'Latest', value: 'latest', disabled: false }"}},
        selectableItems: [
            { title: 'Sale', value: 'sale', disabled: false },
            { title: 'Hot', value: 'hot', disabled: false },
            { title: 'Latest', value: 'latest', disabled: false },
            { title: 'Rate', value: 'rate', disabled: false },
            { title: 'View', value: 'view', disabled: false },
            { title: 'Name (asc)', value: 'name (asc)', disabled: false },
            { title: 'Name (desc)', value: 'name (desc)', disabled: false },
            { title: 'Price (asc)', value: 'price (asc)', disabled: false },
            { title: 'Price (desc)', value: 'price (desc)', disabled: false },
        ],
        selectableItemActive: null,
        selectId: $id('select'),
        selectKeydownValue: '',
        selectKeydownTimeout: 1000,
        selectKeydownClearTimeout: null,
        selectDropdownPosition: 'bottom',
        selectableItemIsActive(item) {
            return this.selectableItemActive && this.selectableItemActive.value == item.value;
        },
        selectableItemActiveNext(){
            let index = this.selectableItems.indexOf(this.selectableItemActive);
            if(index < this.selectableItems.length - 1){
                this.selectableItemActive = this.selectableItems[index + 1];
                this.selectScrollToActiveItem();
            }
        },
        selectableItemActivePrevious(){
            let index = this.selectableItems.indexOf(this.selectableItemActive);
            if(index > 0){
                this.selectableItemActive = this.selectableItems[index - 1];
                this.selectScrollToActiveItem();
            }
        },
        selectScrollToActiveItem(){
            if(this.selectableItemActive){
                let activeElement = document.getElementById(this.selectableItemActive.value + '-' + this.selectId);
                let newScrollPos = (activeElement.offsetTop + activeElement.offsetHeight) - this.$refs.selectableItemsList.offsetHeight;
                if(newScrollPos > 0){
                    this.$refs.selectableItemsList.scrollTop = newScrollPos;
                } else {
                    this.$refs.selectableItemsList.scrollTop = 0;
                }
            }
        },
        selectKeydown(event){
            if (event.keyCode >= 65 && event.keyCode <= 90) {
                this.selectKeydownValue += event.key;
                let selectedItemBestMatch = this.selectItemsFindBestMatch();
                if(selectedItemBestMatch){
                    if(this.selectOpen){
                        this.selectableItemActive = selectedItemBestMatch;
                        this.selectScrollToActiveItem();
                    } else {
                        this.selectedItem = this.selectableItemActive = selectedItemBestMatch;
                    }
                }
                if(this.selectKeydownValue != ''){
                    clearTimeout(this.selectKeydownClearTimeout);
                    this.selectKeydownClearTimeout = setTimeout(() => {
                        this.selectKeydownValue = '';
                    }, this.selectKeydownTimeout);
                }
            }
        },
        selectItemsFindBestMatch(){
            let typedValue = this.selectKeydownValue.toLowerCase();
            let bestMatch = null;
            let bestMatchIndex = -1;
            for (let i = 0; i < this.selectableItems.length; i++) {
                let title = this.selectableItems[i].title.toLowerCase();
                let index = title.indexOf(typedValue);
                if (index > -1 && (bestMatchIndex == -1 || index < bestMatchIndex) && !this.selectableItems[i].disabled) {
                    bestMatch = this.selectableItems[i];
                    bestMatchIndex = index;
                }
            }
            return bestMatch;
        },
        selectPositionUpdate(){
            let selectDropdownBottomPos = this.$refs.selectButton.getBoundingClientRect().top + this.$refs.selectButton.offsetHeight + parseInt(window.getComputedStyle(this.$refs.selectableItemsList).maxHeight);
            if(window.innerHeight < selectDropdownBottomPos){
                this.selectDropdownPosition = 'top';
            } else {
                this.selectDropdownPosition = 'bottom';
            }
        },
        redirectToProduct(value) {
            let params = new URLSearchParams(window.location.search);
            params.set('sortby', value);
            window.location.href = window.location.pathname + '?' + params.toString();
        }
    }" x-init="
        $watch('selectOpen', function(){
            if(!selectedItem){ 
                selectableItemActive = selectableItems[0];
            } else {
                selectableItemActive = selectedItem;
            }
            setTimeout(function(){
                selectScrollToActiveItem();
            }, 10);
            selectPositionUpdate();
            window.addEventListener('resize', (event) => { selectPositionUpdate(); });
        });
    " @keydown.escape="if(selectOpen){ selectOpen = false; }" @keydown.down="if(selectOpen){ selectableItemActiveNext(); } else { selectOpen = true; } event.preventDefault();" @keydown.up="if(selectOpen){ selectableItemActivePrevious(); } else { selectOpen = true; } event.preventDefault();" @keydown.enter="selectedItem = selectableItemActive; selectOpen = false; redirectToProduct(selectedItem.value);" @keydown="selectKeydown($event);" class="relative w-64">

            <button x-ref="selectButton" @click="selectOpen = !selectOpen" :class="{ 'focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400' : !selectOpen }" class="relative min-h-[38px] flex items-center justify-between w-full py-2 pl-3 pr-10 text-left bg-white border rounded-md shadow-sm cursor-default border-neutral-200/70 focus:outline-none text-sm">
              <span x-text="selectedItem ? selectedItem.title : 'Select Item'" class="truncate"></span>
              <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-gray-400">
                  <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd"></path>
                </svg>
              </span>
            </button>

            <ul x-show="selectOpen" x-ref="selectableItemsList" @click.away="selectOpen = false" x-transition:enter="transition ease-out duration-50" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100" :class="{ 'bottom-0 mb-10' : selectDropdownPosition == 'top', 'top-0 mt-10' : selectDropdownPosition == 'bottom' }" class="z-50 absolute w-full py-1 mt-1 overflow-auto text-sm bg-white rounded-md shadow-md max-h-56 ring-1 ring-black ring-opacity-5 focus:outline-none" x-cloak>

              <template x-for="item in selectableItems" :key="item.value">
                <li @click="selectedItem = item; selectOpen = false; $refs.selectButton.focus(); redirectToProduct(item.value);" :id="item.value + '-' + selectId" :data-disabled="item.disabled" :class="{ 'bg-neutral-100 text-gray-900' : selectableItemIsActive(item), '' : !selectableItemIsActive(item) }" @mousemove="selectableItemActive = item" class="relative flex items-center h-full py-2 pl-8 text-gray-700 cursor-default select-none data-[disabled]:opacity-50 data-[disabled]:pointer-events-none">
                  <svg x-show="selectedItem.value == item.value" class="absolute left-0 w-4 h-4 ml-2 stroke-current text-neutral-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                  <span class="block font-medium truncate" x-text="item.title"></span>
                </li>
              </template>

            </ul>

          </div>
        </div>
      </div>
      <div class="grid grid-cols-5 gap-5">
        @forelse ($products as $product)
        @include('partials.product-card', $product)
        @empty
        <div class="col-span-5">
          <div class="flex justify-center items-center h-96">
            <h1 class="text-2xl font-bold text-gray-500">No products found</h1>
          </div>
          @endforelse
        </div>
        <div class="py-10">
          {{ $products->links('partials.pagination') }}
        </div>
      </div>
    </div>

</section>
@endsection

@section('scripts')
<script>
  const filterButton = document.getElementById('filterButton');
  const filterForm = document.getElementById('filterForm');
  filterButton.addEventListener('click', () => {
    filterForm.submit();
  });
</script>
@endsection