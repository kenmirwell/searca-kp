import ENV_VARS from "../src/config.js";

class KnowledgeProductsSearch {
    constructor() {
        this.searchResultBox = document.getElementById("knowledge-products-search-result");
        this.resultContent = document.getElementById("kp-search-result-content");
        this.searchBy = "search";
        this.selectedFilters = new Set();

        this.handleSearch();
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

            // 🟩 Attach filter selection behavior inside the opened dropdown
            const filterItems = accElement.querySelectorAll("[data-slug]");
            filterItems.forEach(item => {
                item.addEventListener("click", () => {
                    const slug = item.getAttribute("data-slug");
                    const checked = item.querySelector(".checked-box");
                    const unchecked = item.querySelector(".unchecked-box");

                    const isSelected = !checked.classList.contains("hidden");

                    if (isSelected) {
                        this.selectedFilters.delete(slug);
                        checked.classList.add("hidden");
                        unchecked.classList.remove("hidden");
                        item.classList.remove("font-[600]");
                    } else {
                        this.selectedFilters.add(slug);
                        checked.classList.remove("hidden");
                        unchecked.classList.add("hidden");
                        item.classList.add("font-[600]");
                    }

                    const input = document.getElementById("knowledge-products-search-input");
                    if (input && input.value.trim()) {
                        this.performSearch(input.value.trim());
                    }
                });
            });
        }
    }

    handleSearch() {
        const input = document.getElementById("knowledge-products-search-input");
        const categoryButtons = document.querySelectorAll(".kp-search-category");

        categoryButtons.forEach(button => {
            button.addEventListener("click", () => {
                categoryButtons.forEach(btn => btn.classList.remove("kp-search-active"));
                button.classList.add("kp-search-active");

                const clickedId = button.id;
                if (clickedId === "kp-search-title") this.searchBy = "title_search";
                else if (clickedId === "kp-search-keyword") this.searchBy = "search";
                else if (clickedId === "kp-search-author") this.searchBy = "author";
                else if (clickedId === "kp-search-country") this.searchBy = "country";

                console.log("Search category set to:", this.searchBy);
            });
        });

        if (!input) return;

        const debouncedInput = this.debounce((e) => {
            const value = e.target.value.trim();
            this.performSearch(value);
        }, 1000);

        input.addEventListener("input", debouncedInput);

        input.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                this.performSearch(input.value.trim());
            }
        });
    }

    performSearch(value) {
        const query = typeof value === "string" ? value.trim() : "";

        this.toggleSection(query);
        this.showLoader();

        setTimeout(() => {
            if (query) {
                const filters = Array.from(this.selectedFilters);
                const filterQuery = filters.length ? `&filters=${filters.join(",")}` : "";

                const apiUrl = `${ENV_VARS.API_URL}knowledge-management?${this.searchBy}=${encodeURIComponent(query)}${filterQuery}`; //I'm not sure if the value here will really fetch anything
                console.log("API URL:", apiUrl);

                this.updateSearchResults(`
                    <div>No results yet for "<strong>${query}</strong>"<br/>
                `);
            } else {
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
