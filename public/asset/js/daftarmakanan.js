document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk dropdown select
    const categorySelect = document.getElementById('categorySelect');
    categorySelect.addEventListener('change', function() {
        const selectedCategory = categorySelect.value;

        updateCategoryTitle(selectedCategory);

        // Filter makanan berdasarkan kategori
        filterFoods(selectedCategory);
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

    document.addEventListener("DOMContentLoaded", function () {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.getAttribute('src');
        });
    });
});
