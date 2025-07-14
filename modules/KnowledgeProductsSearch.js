import ENV_VARS from "../src/config.js";

class KnowledgeProductsSearch { 
    constructor() {
        
    }

    handleSearch() {
        const inputField = document.getElementById("knowledge-products-search-input");

        inputField.addEventListener("input", (e) => {
        
            const searchValue = e.target.value.trim();
                    
            this.performSearch(searchValue);
            
        });
    }

    performSearch(selectedValues) {
        console.log("selectedValues", selectedValues)
    }
}

export default KnowledgeProductsSearch;