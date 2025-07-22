import ENV_VARS from "../src/config.js";

class KnowledgeProductsSearch {
    constructor() {
        this.searchResultBox = document.getElementById("knowledge-products-search-result");
        this.resultContent = document.getElementById("kp-search-result-content");

        this.handleSearch();
    }

    handleSearch() {
        const input = document.getElementById("knowledge-products-search-input");
        const searchBytitle = document.getElementById("kp-search-title");
        const searchBykeyword = document.getElementById("kp-search-keyword");
        const searchByauthor = document.getElementById("kp-search-author");
        const searchBycountry = document.getElementById("kp-search-country");

        const categoryButtons = document.querySelectorAll(".kp-search-category");

        categoryButtons.forEach(button => {
            button.addEventListener("click", () => {
                // Remove 'kp-search-active' from all
                categoryButtons.forEach(btn => btn.classList.remove("kp-search-active"));

                // Add 'kp-search-active' to the clicked one
                button.classList.add("kp-search-active");
            });
        });

        if (!input) return;

        const debounced = this.debounce((e) => {
            const value = e.target.value.trim();
            this.toggleSection(value);

            if (value) {
                this.showLoader();
                // Simulate search request
                setTimeout(() => {
                    this.updateSearchResults(`<div>No results yet</div>`);
                }, 1500);
            }
        }, 1000);

        input.addEventListener("input", debounced);
    }

    toggleSection(value) {
        const mainSection = document.getElementById("knowledge-products-content");
        if (!mainSection) return;

        // Hide the main content if search has value
        mainSection.classList.toggle("hidden", !!value);

        // Show or hide the search result container
        if (value) {
            this.searchResultBox.classList.remove("hidden");
        } else {
            this.searchResultBox.classList.add("hidden");
        }
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


