
document.getElementById('productForm').addEventListener('submit',
    async function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        // console.log(formData);

        try {
            const response = await fetch("/product", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });
            const data = await response.json();
            if (data.message === 'Success') {
                showToast("🎉 Đã thêm sản phẩm!", false);
            } else {
                showToast("❌ Thêm sản phẩm thất bại!", true);
            }
            resetModal();
            this.showModal = false;
        } catch (err) {
            showToast('❌ Có lỗi xảy ra!', true)
        }
    })

function showToast(message, isError = false) {
    const toast = document.createElement('div');
    toast.className = `fixed bottom-4 right-4 px-4 py-2 rounded shadow text-white z-50 ${isError ? 'bg-red-500' : 'bg-green-500'}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000)
}

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    } else {
        preview.src = "#";
        preview.classList.add('hidden');
    }
}

function toggleNewPlantInput(select) {
    const newInput = document.getElementById('newPlantInput');
    newInput.classList.toggle('hidden', select.value !== 'new');
}

function toggleNewPotInput(select) {
    const newInput = document.getElementById('newPotInput');
    newInput.classList.toggle('hidden', select.value !== 'new');
}

function resetModal() {
    // Reset input file
    this.fileName = '';
    this.previewUrl = '';

    // Reset form nếu có
    const form = document.getElementById('productForm');
    if (form) form.reset();

    // Ẩn input thêm mới nếu cần
    document.getElementById('newPlantInput')?.classList.add('hidden');
    document.getElementById('newPotInput')?.classList.add('hidden');
}
function productModalData() {
    return {
        fileName: '',
        previewUrl: '',
        resetModal() {
            this.fileName = '';
            this.previewUrl = '';

            // Reset form
            const form = document.getElementById('productForm');
            if (form) form.reset();

            // Ẩn input thêm mới nếu có
            document.getElementById('newPlantInput')?.classList.add('hidden');
            document.getElementById('newPotInput')?.classList.add('hidden');
        }
    }
}


