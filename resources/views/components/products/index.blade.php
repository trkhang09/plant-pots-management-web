<x-layouts.app>
    <div class="absolute rounded-lg shadow-lg  mx-10 inset-x-0 top-[15%] bg-white p-5">
        <div class="relative grid grid-cols-10 gap-2">
            <div class="col-span-3">
                <div class=" flex rounded-md h-[300px] w-[300px] sm:h-[200px] sm:w-[200px] 
                overflow-hidden">
                    <img class="flex-1 max-h-[100%] " src="{{ asset('storage/uploads/'. $product->image) }}" alt="">
                </div>
            </div>
            <div class="col-span-7">
                <div class="flex flex-col h-[100%]">
                    <h2 class=" text-[52px] font-semibold">{{ $product->name }}</h2>
                    <p>mã: {{ $product->code }}</p>
                    <p class="flex-1">{{ $product->description }}</p>
                    <div id="bottom-content" class="flex ">
                        <h4 class="flex-1 text-[20px]">Giá tiền: {{ number_format($product->price, 0, ',', '.') . ' đ' }}</h4>
                        <div id="badge">
                            {{-- <span
                                class="inline-flex items-center rounded-md bg-yellow-100 px-4 py-1.5 text-sm font-medium text-yellow-700">Warning</span> --}}
                            {{-- <span
                                class="inline-flex items-center rounded-md bg-red-100 px-4 py-1.5 text-sm font-medium text-red-700">Broken</span> --}}
                            <span
                                class="inline-flex items-center rounded-md bg-green-100 px-4 py-1.5 text-sm font-medium text-green-700">Safe</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>