import ENV_VARS from "../src/config.js";

class KnowledgeProductsSearch {
    constructor() {
        this.searchResultBox = document.getElementById("knowledge-products-search-result");
        this.resultContent = document.getElementById("kp-search-result-content");
        this.searchBy = "search";
        // this.selectedFilters = new Set();
        this.selectedFilters = {}

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

            const filterItems = accElement.querySelectorAll("[data-slug]");
            
            filterItems.forEach(item => {
                item.addEventListener("click", () => {
                    const slug = item.getAttribute("data-slug");
                    const dataValue = item.getAttribute("data-value")
                    const dataTaxonomy = item.getAttribute("data-taxonomy")
                    const checked = item.querySelector(".checked-box");
                    const unchecked = item.querySelector(".unchecked-box");
                    const isSelected = !checked.classList.contains("hidden");

                    if (isSelected) {
                        // Remove the value from the array
                        if (this.selectedFilters[dataTaxonomy]) {
                            this.selectedFilters[dataTaxonomy] = this.selectedFilters[dataTaxonomy].filter(v => v !== dataValue);
                            // If the array becomes empty, optionally delete it
                            if (this.selectedFilters[dataTaxonomy].length === 0) {
                                delete this.selectedFilters[dataTaxonomy];
                            }
                        }

                        checked.classList.add("hidden");
                        unchecked.classList.remove("hidden");
                        item.classList.remove("font-[600]");

                    } else {
                        // Add the value to the array
                        if (!this.selectedFilters[dataTaxonomy]) {
                            this.selectedFilters[dataTaxonomy] = [];
                        }

                        // Add only if it doesn't already exist
                        if (!this.selectedFilters[dataTaxonomy].includes(dataValue)) {
                            this.selectedFilters[dataTaxonomy].push(dataValue);
                        }

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

        if (!query) {
            this.updateSearchResults(`<div>No results yet</div>`);
            return;
        }

        // const filters = Array.from(this.selectedFilters);
        // const filterQuery = filters.length ? `&filters=${filters.join(",")}` : "";
        

        let queryString = Object.keys(this.selectedFilters)
        .map((tax) => this.selectedFilters[tax].map((val) => `${tax}=${encodeURIComponent(val)}`).join("&"))
        .join("&");

        console.log("queryString", queryString)

        const apiUrl = `${ENV_VARS.API_URL}knowledge-management?${this.searchBy}=${encodeURIComponent(query)}&${queryString}`;
        console.log("API URL:", apiUrl);

        fetch(apiUrl)
            .then(res => {
                if (!res.ok) throw new Error("Failed to fetch");
                return res.json();
            })
            .then(data => {
                if (!Array.isArray(data) || data.length === 0) {
                    this.updateSearchResults(`<div>No results found for "<strong>${query}</strong>"</div>`);
                    return;
                }

                console.log("data", data)

                // this.updateSearchResults(`<div>No results found for "<strong>${query}</strong>"</div>`);
                const html = data.map(item => {
                    const imageUrl = item.custom_fields.featured_image;

                    return `  
                        <div class="kp-searched-item">
                            <div class="bg-[#F5F8FC] p-[20px]">
                                 <div class="bg-[#DBE1E9] p-[5px] rounded-[8px] overflow-hidden">
                                    <div class="relative flex h-[250px] xl:h-[300px] rounded-[8px] overflow-hidden">
                                        <div class="bg-black opacity-5 w-[100%] h-[100%] absolute top-0 left-0 z-10 group-hover:opacity-0 transition-all duration-200 ease">
                                        </div>
                                         ${imageUrl ? `<img src="${imageUrl}" alt="Knowledge Products Item" class="absolute w-full h-full object-cover rounded-[5px]" />` : ""}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pb-[10px]">
                                    <p class="text-sm text-gray-600">${item.custom_fields.author_name || "Unknown author"}</p>
                                </div>
                                <div>
                                    <h6 class="flex items-end md:text-display-18 font-[600] pt-[10px]">${item.custom_fields.title || "No title"}</h6>
                                    <div class="text-display-16 pt-[10px] font-[200]">
                                        ${(item.custom_fields.content?.length > 100) 
                                        ? item.custom_fields.content.slice(0, 100) + "..." 
                                        : item.custom_fields.content || "No summary available."}
                                    </div>
                                </div>
                                <div>
                                    <a href="${item.custom_fields.permalink || "/"}" class="rounded-full px-[20px] py-[10px] border-[1px] border-[#096936] text-display-16 text-[#096936]">Read More</a>
                                </div>
                            </div>
                        </div>
                    `
                }).join("");

                this.updateSearchResults(html);
            })
            .catch(err => {
                console.error("Error during search:", err);
                this.updateSearchResults(`<div class="text-red-600">Error loading results. Please try again later.</div>`);
            });
    }

    toggleSection(value) {
        const mainSection = document.getElementById("knowledge-products-content");
        if (!mainSection) return;

        mainSection.classList.toggle("hidden", !!value);
        this.searchResultBox.classList.toggle("hidden", !value);
    }

    showLoader() {
        this.updateSearchResults(`
            <div class="loader-container flex justify-center py-10">
                <div class="loader border-4 border-blue-400 border-t-transparent rounded-full w-10 h-10 animate-spin"></div>
            </div>
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
