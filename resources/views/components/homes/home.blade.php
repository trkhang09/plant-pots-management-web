<x-layouts.app>
    {{-- {{ dd($products) }} --}}
  <div class="pt-16 h-[100vh] flex">
      <!-- Cột bên trái: Danh mục -->
      <aside class="w-1/4 bg-white shadow-md p-4 overflow-y-auto max-h-full rounded-br-xl rounded-tr-xl" x-data="{ openTree: true, openPot: false }">
          <h2 class="text-lg font-semibold mb-4 ">Danh mục</h2>

          <!-- Danh mục Cây -->
          <div class="mb-4">
              <button @click="openTree =!openTree" class="flex items-center justify-between w-full text-left px-2 py-1 rounded bg-gray-100 hover:bg-gray-200">
                  <span class="font-medium">Cây</span>
                  <svg :class="{ 'rotate-180': openTree }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
              </button>
              <ul x-show="openTree" x-transition class="mt-2 space-y-1 pl-4">
                @foreach($plants as $plant)
                  <li><a href="#" class="block px-2 py-1 hover:bg-gray-200 rounded">{{ $plant->name }}</a></li>
                @endforeach
              </ul>
          </div>

          <!-- Danh mục Chậu -->
          <div>
              <button @click="openPot = !openPot" class="flex items-center justify-between w-full text-left px-2 py-1 rounded bg-gray-100 hover:bg-gray-200">
                  <span class="font-medium">Chậu</span>
                  <svg :class="{ 'rotate-180': openPot }" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
              </button>
              <ul x-show="openPot" x-transition class="mt-2 space-y-1 pl-4">
                @foreach($pots as $pot)
                  <li><a href="#" class="block px-2 py-1 hover:bg-gray-200 rounded">{{ $pot->name }}</a></li>
                @endforeach
              </ul>
          </div>
      </aside>

      <!-- Cột bên phải: Sản phẩm -->
      <main class="flex-1 p-6 overflow-y-auto max-h-full">
        <div x-data= "{showModal : false}">
          <button 
            @click="showModal = true"
            class="rounded-full py-2 px-5 border border-blue-600 bg-blue-200 hover:text-white hover:bg-blue-600 hover:border-blue-600 text-black hover:border"
            > 
            Thêm Cây Mới 
          </button>
          <div>
            <x-product-modal 
              :show-var="'showModal'" 
              :title="'Thêm sản phẩm mới'" 
              :action="route('product.show')"  
              :method="'POST'" 
              :plants="$plants" 
              :pots="$pots" 
            />
          </div>
        </div>
          <h2 class="text-xl font-bold mb-4">Danh sách sản phẩm</h2>

          <div class="grid grid-cols
          -1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <!-- Card sản phẩm -->
              @foreach($products as $product)
              <x-product-card 
                  :product="$product"
              />
              @endforeach
          </div>
      </main>
      <!-- modal add product -->
      
  </div>
</x-layouts.app>
