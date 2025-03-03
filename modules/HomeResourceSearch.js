import ENV_VARS from "../src/config.js";

class HomeResourcesSearch {
  constructor() {
    this.isSpinnerVisible = false;
    this.response = [];
    this.typingTimer;
    this.selectedTypeValue = null;
    this.selectedTypeName = null;
    this.searchQuery = "";
    this.searchBy = "search"; // Default to keyword-based search
    this.initEvents();
  }

  initEvents() {
    const searchByTitle = document.getElementById("search-by-title");
    const searchByKeyword = document.getElementById("search-by-keyword");

    if (!searchByTitle || !searchByKeyword) {
      console.error("Search filter elements missing!");
      return;
    }

    searchByTitle.addEventListener("click", () => {
      this.searchBy = "title_search"; // Switch to title-based search
      searchByTitle.classList.add("active-searchby");
      searchByKeyword.classList.remove("active-searchby");
    });

    searchByKeyword.addEventListener("click", () => {
      this.searchBy = "search"; // Switch to keyword-based search
      searchByKeyword.classList.add("active-searchby");
      searchByTitle.classList.remove("active-searchby");
    });
  }

  handleSearch() {
    const inputField = document.getElementById("search-resources");
    const categoryContainers = document.querySelectorAll(
      ".type-category-container, .author-category-container, .country-category-container, .date-category-container"
    );

    let selectedValues = {}; // Keep selectedValues local to function

    // Handle category filters dynamically
    categoryContainers.forEach((container) => {
      container.addEventListener("click", (e) => {
        const item = e.target.closest("li");
        if (!item) return;

        const taxonomy = item.getAttribute("data-taxonomy"); // Get taxonomy name
        const value = item.getAttribute("data-value"); // Get selected value
        const filterItem = document.getElementById(`filter-item-${value}`);

        if (!taxonomy || !value || !filterItem) return;

        const checkedBox = filterItem.querySelector(".checked-box");
        const uncheckedBox = filterItem.querySelector(".unchecked-box");

        if (checkedBox && uncheckedBox) {
          checkedBox.classList.toggle("hidden");
          uncheckedBox.classList.toggle("hidden");
        }

        // Initialize taxonomy array if not exists
        if (!selectedValues[taxonomy]) {
          selectedValues[taxonomy] = [];
        }

        // Toggle selection
        if (selectedValues[taxonomy].includes(value)) {
          selectedValues[taxonomy] = selectedValues[taxonomy].filter((v) => v !== value);
          if (selectedValues[taxonomy].length === 0) delete selectedValues[taxonomy]; // Remove empty taxonomy
        } else {
          selectedValues[taxonomy].push(value);
        }

        this.performSearch(selectedValues);
      });
    });

    // Search input event listener with debounce
    let debounceTimer;
    inputField.addEventListener("input", (e) => {
      clearTimeout(debounceTimer);

      debounceTimer = setTimeout(() => {
        const searchValue = e.target.value.trim();

        // Reset other search mode when switching
        if (this.searchBy === "search") {
          delete selectedValues["title_search"];
        } else {
          delete selectedValues["search"];
        }

        // Update the selected search filter
        if (searchValue.length > 0) {
          selectedValues[this.searchBy] = [searchValue];
        } else {
          delete selectedValues[this.searchBy];
        }

        this.performSearch(selectedValues);
      }, 500); // 500ms debounce delay
    });
  }

  performSearch(selectedValues) {
    let queryString = Object.keys(selectedValues)
      .map((tax) => selectedValues[tax].map((val) => `${tax}=${encodeURIComponent(val)}`).join("&"))
      .join("&");

    let apiUrl = `${ENV_VARS.API_URL}knowledge-management?${queryString}`;

    requestAnimationFrame(() => { //built in javascript function
      this.toggleSearch(apiUrl, selectedValues);
    });
  }

  toggleSearch(apiUrl, selectedValues) {
    const featured = document.getElementById("home-featured-resources");
    const searchContainer = document.getElementById("home-search-container");

    if (Object.values(selectedValues).length !== 0) {
      
      clearTimeout(this.typingTimer);

      featured.style.display = "none";
      searchContainer.style.display = "block";

      if (!this.isSpinnerVisible) {
        this.updateSearchResults(`<div class="loader-container"><div class="loader"></div></div>`);
        this.isSpinnerVisible = true;
      }

      this.typingTimer = setTimeout(() => {
        this.fetchData(apiUrl);
      }, 500); // 500ms debounce delay
    } else {
      featured.style.display = "block";
      searchContainer.style.display = "none";
    }
  }

  async fetchData(apiUrl) {
    try {
      if (!apiUrl) throw new Error("API URL is undefined or empty");

      const response = await fetch(apiUrl);

      if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

      const data = await response.json();

      if (data.length > 0) {
        const resultsHTML = data
          .map((item) => `<div class="home-search-item"><a class="text-[16px]" href="${item.link}">${item.title.rendered}</a></div>`)
          .join("");

        this.updateSearchResults(resultsHTML);
        this.isSpinnerVisible = false;
      } else {
        this.updateSearchResults(`<div class="loader-container"><p>No result</p></div>`);
        this.isSpinnerVisible = true;
      }
    } catch (err) {
      console.error("Error fetching data:", err);
    }
  }

  updateSearchResults(content) {
    requestAnimationFrame(() => { //built in javascript function
      const searched = document.getElementById("home-search-result");
      if (searched) {
        searched.innerHTML = content;
      }
    });
  }
}

export default HomeResourcesSearch;
