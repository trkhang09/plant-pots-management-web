{{-- <a href="{{ route('product.show', ['code' => $product->code]) }}"> --}}
<div onclick="goToDetail('{{ route('product.show', ['code' => $product->code]) }}', event)"
    class="bg-white rounded shadow p-4">
    <img src="storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-80 object-cover rounded">
    <h3 class="mt-2 text-lg font-semibold">{{ $product->name }}</h3>
    <p class="text-gray-600">Mã: {{ $product->code }}</p>
    <p class="text-gray-600">Giá: {{ number_format($product->price, 0, ',', '.') }}₫</p>

    <div class="flex flex-row gap-1">
        <button
            @click="
                window.productModalMode = 'edit';
                window.editingProductId = product.id;
                $store.productModal.setEditData(product);
                showProductModal = true;
            "
            class="mt-2 px-4 py-2 bg-blue-400 text-white rounded-full hover:bg-blue-700">
            chỉnh sửa
        </button>
        {{-- <button class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Chỉnh Sửa</button> --}}
        <button onclick="deleteProduct({{ $product->id }})"
            class="mt-2 px-4 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 flex flex-row items-center justify-center">
            Xóa
        </button>
    </div>
</div>
{{-- </a> --}}

<script>
    function goToDetail(url, event) {
        const isButton = event.target.closest("button");
        if (!isButton) {
            window.location.href = url;
        }
    }

    async function deleteProduct(id) {
        if (!confirm('Bạn có chắc muốn xóa sản phẩm này?')) return;

        try {
            const response = await fetch(`/products/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                    'Accept': 'appication/json',
                }
            })
            const data = await response.json();
            if (response.ok) {
                showToast('✅ Xóa thành công', false);
                location.reload();
            } else {
                showToast(`❌ Xóa thất bại: ${data.message || 'Lỗi không xác định'}`, true);
            }

        } catch (error) {
            console.error(error);
            showToast('❌ Có lỗi xảy ra khi xóa', true);
        }
    }
</script>
