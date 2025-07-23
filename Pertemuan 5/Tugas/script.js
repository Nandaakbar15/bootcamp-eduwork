const products = [
      {
        name: "Neon Genesis Evangelion",
        description: "Manga karya Hideaki Anno",
        price: 12000,
        image: "assets/images/Evangelion Manga.jpg",
        category: "Manga"
      },
      {
        name: "Detektif Conan",
        description: "Manga Karya Aoyama Gosho.",
        price: 10000,
        image: "assets/images/komikdetektifconan.jpg",
        category: "Manga"
      },
      {
        name: "Final Fantasy 7 Remake",
        description: "Game RPG versi remake dari Final Fantasy 7 yang dikembangkan oleh Square Enix.",
        price: 850000,
        image: "assets/images/ff7remake.jpg",
        category: "Game"
      },
      {
        name: "Dualshock 4 PS4 Wireless",
        description: "Stik PS4 warna hitam wireless",
        price: 9500000,
        image: "assets/images/ps4dualshock.jpg",
        category: "Aksesori"
      },
      {
        name: "Persona 3 Reload",
        description: "Game RPG versi remake dari Persona 3 yang dikembangkan oleh ATLUS",
        price: 899000,
        image: "assets/images/Persona_3_Reload_box_art.jpg",
        category: "Game"
      }
    ];

    const productList = document.getElementById("productList");
    const searchInput = document.getElementById("searchInput");
    const categoryFilter = document.getElementById("categoryFilter");
    const priceSort = document.getElementById("priceSort");

    function renderProducts(filteredProducts) {
      productList.innerHTML = "";

      if (filteredProducts.length === 0) {
        productList.innerHTML = '<div class="col text-center"><p class="text-muted">Tidak ada produk ditemukan.</p></div>';
        return;
      }

      filteredProducts.forEach(product => {
        const card = `
          <div class="col-md-4 mb-4">
            <div class="card">
              <img src="${product.image}" class="card-img-top img-fit" alt="${product.name}">
              <div class="card-body">
                <h5 class="card-title">${product.name}</h5>
                <p class="card-text">${product.description}</p>
                <p class="card-text fw-bold text-primary">Rp${product.price.toLocaleString()}</p>
                <span class="badge bg-secondary">${product.category}</span>
              </div>
            </div>
          </div>`;
        productList.innerHTML += card;
      });
    }

    function populateCategories() {
      const categories = [...new Set(products.map(p => p.category))];
      categories.forEach(cat => {
        const option = document.createElement("option");
        option.value = cat;
        option.textContent = cat;
        categoryFilter.appendChild(option);
      });
    }

    function filterProducts() {
      let filtered = [...products];

      const searchValue = searchInput.value.toLowerCase();
      const selectedCategory = categoryFilter.value;
      const selectedSort = priceSort.value;

      // Filter by search
      if (searchValue) {
        filtered = filtered.filter(p =>
          p.name.toLowerCase().includes(searchValue)
        );
      }

      // Filter by category
      if (selectedCategory) {
        filtered = filtered.filter(p =>
          p.category === selectedCategory
        );
      }

      // Sort by price
      if (selectedSort === "asc") {
        filtered.sort((a, b) => a.price - b.price);
      } else if (selectedSort === "desc") {
        filtered.sort((a, b) => b.price - a.price);
      }

      renderProducts(filtered);
    }

    // Event Listeners
    searchInput.addEventListener("input", filterProducts);
    categoryFilter.addEventListener("change", filterProducts);
    priceSort.addEventListener("change", filterProducts);

    // Initial Load
    populateCategories();
    renderProducts(products);