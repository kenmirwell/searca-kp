class HomeResourcesSearch {
  constructor() {
    this.isSpinnerVisible = false;
    this.response = [];
    this.typingTimer;
    this.selectedTypeValue = null; 
    this.selectedTypeName =  null;
    this.searchQuery = '';
  }

  toggleSearch(e) {
    const featured = document.getElementById("home-featured-resources");
    const searched = document.getElementById("home-search-result");
    const searchedTitle = document.getElementById("search-result-title");
    const searchContainer = document.getElementById("home-search-container");

    if (e.target && e.target.id === 'search-resources') {
      this.searchQuery = e.target.value.trim();
    } 

    clearTimeout(this.typingTimer);

    if (this.searchQuery || this.selectedTypeValue) {
      featured.style.display = "none";
      searched.style.display = "flex";
      searchContainer.style.display = "block";
      searchedTitle.style.display = "block";

      if (!this.isSpinnerVisible) {
        searched.innerHTML = '<div class="loader-container"><div class="loader"></div></div>';
        this.isSpinnerVisible = true;
      }

      this.typingTimer = setTimeout(() => {
        const getData = async () => {
          try {
            const categoryQuery = this.selectedTypeValue ? `&km_category=${this.selectedTypeValue}` : "";

            const response = await fetch(`https://bcsdevelopmentgator.site/wp-json/wp/v2/knowledge-management?search=${this.searchQuery}${categoryQuery}&per_page=5`);

            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();

            if (data.length > 0) {
              searched.innerHTML = "";

              data.forEach(item => {
                searched.innerHTML += `<div class="home-search-item"><a href="${item.link}"><p class="text-[14px]">${item.title.rendered}</p></a></div>`;
              });

              this.isSpinnerVisible = false;
            } else {
              searched.innerHTML = `<div class="loader-container"><p>No results for "${this.searchQuery}", "${this.selectedTypeName}"</p></div>`;
              this.isSpinnerVisible = true;
            }
          } catch (err) {
            console.error("Error fetching data:", err);
          }
        };

        getData();  
      });
    } else {
      featured.style.display = "block";
      searched.style.display = "none";
      searchedTitle.style.display = "none";
    }
  }

  handleSearch() {
    const inputField = document.getElementById("search-resources");
    const listItems = document.querySelectorAll('.category-container li'); 
    
    listItems.forEach(item => {
      item.onclick = (e) => {
        this.selectedTypeValue = item.getAttribute('data-value'); 
        this.selectedTypeName = item.getAttribute('data-name');

        console.log("this.selectedTypeName", this.selectedTypeName);
        this.toggleSearch(e);
      };
    });

    if (inputField) {
      inputField.addEventListener("input", (e) => {
        this.toggleSearch(e);
      });
    }
  }
}

export default HomeResourcesSearch;
