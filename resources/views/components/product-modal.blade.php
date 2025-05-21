<!-- resources/views/components/product-modal.blade.php -->
@props(['plants' => [], 'pots' => []])
<div 
    x-data="productModalData()"
    x-show="{{ $showVar }}" 
    x-transition 
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    style="display: none;">
    {{-- <div class="absolute inset-0 bg-black opacity-50"></div> --}}

    <div @click.away="resetModal(), {{ $showVar }} = false"
        class="bg-white opacity-100 p-6 rounded shadow-md w-full max-w-lg z-51 max-h-screen overflow-y-auto scrollbar-hide">
        <h2 class="text-xl font-semibold mb-4">
            {{ $title ?? 'Thêm / Sửa Sản Phẩm' }}
        </h2>

        <form id="productForm" enctype="multipart/form-data">
            @csrf

            <!-- Ảnh -->
            <div class="mb-4">
                <!-- Label -->
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Hình ảnh sản phẩm</label>

                <!-- Input file ẩn -->
                <input type="file" id="image" name="image" class="hidden" accept="image/*"
                    @change="
                        fileName = $event.target.files[0]?.name;
                        const file = $event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = e => previewUrl = e.target.result;
                            reader.readAsDataURL(file);
                        }
                    ">

                <!-- Nút chọn ảnh -->
                <label for="image"
                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Chọn ảnh
                </label>

                <!-- Hiển thị tên file -->
                <template x-if="fileName">
                    <p class="mt-2 text-sm text-gray-600">Đã chọn: <span x-text="fileName"></span></p>
                </template>

                <!-- Preview hình -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" alt="Preview" class="mt-4 w-40 h-40 object-cover rounded border">
                </template>
            </div>


            <!-- Tên sản phẩm -->
            <div class="mb-4">
                <label for="name" class="block font-medium">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Mã sản phẩm -->
            {{-- <div class="mb-4">
                <label for="code" class="block font-medium">Mã sản phẩm</label>
                <input type="text" id="code" name="code" class="w-full border rounded px-3 py-2" required>
            </div> --}}

            <!-- Giá sản phẩm -->
            <div class="mb-4">
                <label for="price" class="block font-medium">Giá</label>
                <input type="number" id="price" name="price" class="w-full border rounded px-3 py-2" required>
            </div>

            <!-- Loại cây -->
            <div class="mb-4">
                <label for="plant" class="block font-medium">Loại cây</label>
                <select id="plant" name="plant" class="w-full border rounded px-3 py-2"
                    onchange="toggleNewPlantInput(this)">
                    <option value="">-- Chọn loại cây --</option>
                    @foreach ($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                    @endforeach
                    <option value="new">+ Thêm mới loại cây</option>
                </select>
                <input type="text" name="new_plant" id="newPlantInput"
                    class="w-full mt-2 border rounded px-3 py-2 hidden" placeholder="Nhập tên loại cây mới">
            </div>

            <!-- Loại chậu -->
            <div class="mb-4">
                <label for="pot" class="block font-medium">Loại chậu</label>
                <select id="pot" name="pot" class="w-full border rounded px-3 py-2"
                    onchange="toggleNewPotInput(this)">
                    <option value="">-- Chọn loại chậu --</option>
                    @foreach ($pots as $pot)
                        <option value="{{ $pot->id }}">{{ $pot->name }}</option>
                    @endforeach
                    <option value="new">+ Thêm mới loại chậu</option>
                </select>
                <input type="text" name="new_pot" id="newPotInput"
                    class="w-full mt-2 border rounded px-3 py-2 hidden" placeholder="Nhập tên loại chậu mới">
            </div>

            <div class="text-right">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">Lưu</button>
                {{-- <button type="button" @click="openModal = false; resetModal()" class="px-4 py-2 bg-gray-500 hover:bg-red-500 text-white rounded-full">
                    &times; Hủy
                </button> --}}
            </div>
        </form>
    </div>
</div>
{{-- script here --}}
<script src="{{ asset('js/product-modal.js') }}"></script>

