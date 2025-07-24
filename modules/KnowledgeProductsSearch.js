import ENV_VARS from "../src/config.js";

class KnowledgeProductsSearch {
    constructor() {
        this.searchResultBox = document.getElementById("knowledge-products-search-result");
        this.resultContent = document.getElementById("kp-search-result-content");
        this.searchBy = "search"; // default
        this.searchValue = "";

        this.handleSearch();
        this.handleFilter();
    }

    handleFilter(elementId, index) {
        const accElement = document.getElementById(elementId);

        if (accElement) {
            const height = accElement.offsetHeight < 200 ? accElement.offsetHeight : 200;

            for (let i = 0; i < 4; i++) {
                const container = document.getElementById(`kp-filter-container-${i}`);
                if (index !== i) {
                    container.style.height = "0";
                    container.style.margin = "0";
                } else {
                    if (container.offsetHeight === 0) {
                        container.style.height = `${height}px`;
                        container.style.margin = "10px 0";
                    } else {
                        container.style.height = "0";
                        container.style.margin = "0";
                    }
                }
            }
        }
    }

    handleSearch() {
        const input = document.getElementById("knowledge-products-search-input");
        const categoryButtons = document.querySelectorAll(".kp-search-category");

        // Handle search by category
        categoryButtons.forEach(button => {
            button.addEventListener("click", () => {
                categoryButtons.forEach(btn => btn.classList.remove("kp-search-active"));
                button.classList.add("kp-search-active");

                const clickedId = button.id;

                if (clickedId === "kp-search-title") {
                    this.searchBy = "title_search";
                } else if (clickedId === "kp-search-keyword") {
                    this.searchBy = "search";
                } else if (clickedId === "kp-search-author") {
                    this.searchBy = "author";
                } else if (clickedId === "kp-search-country") {
                    this.searchBy = "country";
                }

                // Optional: immediately trigger search again with new category
                if (this.searchValue) this.performSearch(this.searchValue);
            });
        });

        if (!input) return;

        // Attach debounced input handler
        const debouncedInput = this.debounce((e) => {
            const value = e.target.value.trim();
            this.searchValue = value;
            this.performSearch(value);
        }, 1000);

        input.addEventListener("input", debouncedInput);
    }

    performSearch(value) {
        const query = typeof value === "string" ? value.trim() : "";

        const apiUrl = `${ENV_VARS.API_URL}knowledge-management?${this.searchBy}=${encodeURIComponent(query)}`;
        console.log("apiUrl", apiUrl);

         this.showLoader(); // ✅ always show loader first

        setTimeout(() => {
            if (query) {
                this.toggleSection(query);
                this.updateSearchResults(`<div>No results yet for "<strong>${query}</strong>"</div>`);
            } else {
                this.toggleSection("");
                this.updateSearchResults(`<div>No results yet</div>`);
            }
        }, 1500);
    }

    toggleSection(value) {
        const mainSection = document.getElementById("knowledge-products-content");
        if (!mainSection) return;

        mainSection.classList.toggle("hidden", !!value);
        this.searchResultBox.classList.toggle("hidden", !value);
    }

    showLoader() {
        this.updateSearchResults(`
            <div class="loader-container"><div class="loader"></div></div>
        `);
    }

    updateSearchResults(html) {
        if (this.resultContent) {
            this.resultContent.innerHTML = html;
        }
    }

    debounce(fn, delay) {
        let timeout;
        return (...args) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => fn.apply(this, args), delay);
        };
    }
}

export default KnowledgeProductsSearch;
