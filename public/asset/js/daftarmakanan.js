document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk tab
    document.querySelectorAll('.item').forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Hapus kelas 'bg-warning' dan 'text-white' dari semua item
            document.querySelectorAll('.item').forEach(i => {
                i.classList.remove('bg-warning','px-4','bg-opacity-75', 'shadow');
            });

            // Tambahkan kelas 'bg-warning' dan 'text-white' pada item yang diklik
            this.classList.add('bg-warning','px-4','bg-opacity-75', 'shadow', 'fade-in');

            // Ubah teks judul berdasarkan kategori yang dipilih
            const category = this.getAttribute('data-category');
            updateCategoryTitle(category);

            // Filter makanan berdasarkan kategori
            filterFoods(category);
        });
    });

    // Fungsi untuk memperbarui judul kategori
    function updateCategoryTitle(category) {
        const titleMap = {
            makanan: 'Daftar Makanan',
            snack: 'Daftar Snack',
            minuman: 'Daftar Minuman',
            steak: 'Daftar Steak'
        };
        const titleElement = document.getElementById('categoryTitle');
        titleElement.textContent = titleMap[category] || 'Daftar List'; // Default jika kategori tidak ditemukan
        
        titleElement.classList.add('fade-in');
        setTimeout(() => {
            titleElement.classList.remove('fade-in');
        }, 500);
    }

    // Fungsi untuk memfilter makanan berdasarkan kategori
    function filterFoods(category) {
        const foodItems = document.querySelectorAll('.col.mb-5'); // Mengambil semua elemen kolom
        foodItems.forEach(food => {
            const foodCategory = food.getAttribute('data-category'); // Ambil kategori dari data-category
            if (foodCategory === category || category === '') {
                food.classList.add('fade-in');
                food.style.display = 'block';
            } else {
                food.classList.add('fade-out');
                setTimeout(() => {
                    food.style.display = 'none';
                    food.classList.remove('fade-out');
                }, 500);
            }
        });
    }
});
