class KmFilter {
  constructor() {}

  handleKmSearchby() {
    const searchByTitle = document.getElementById("km-search-by-title");
    const searchByKeyword = document.getElementById("km-search-by-keyword");
    const searchInput = document.getElementById("km-search-resources");

    if(searchInput.name === "searchby-title") {
      searchByTitle.querySelector(".km-checked-box").classList.remove("hidden");
      searchByTitle.querySelector(".km-unchecked-box").classList.add("hidden");
      searchByKeyword.querySelector(".km-checked-box").classList.add("hidden");
      searchByKeyword.querySelector(".km-unchecked-box").classList.remove("hidden");
    } else {
      searchByKeyword.querySelector(".km-checked-box").classList.remove("hidden");
      searchByKeyword.querySelector(".km-unchecked-box").classList.add("hidden");
      searchByTitle.querySelector(".km-checked-box").classList.add("hidden");
      searchByTitle.querySelector(".km-unchecked-box").classList.remove("hidden");
    }

    function updateSearchOption(selected) {
      console.log("selected", selected)
        if (selected === "searchby-title") {
            searchInput.name = "searchby-title";
            searchByTitle.querySelector(".km-checked-box").classList.remove("hidden");
            searchByTitle.querySelector(".km-unchecked-box").classList.add("hidden");
            searchByKeyword.querySelector(".km-checked-box").classList.add("hidden");
            searchByKeyword.querySelector(".km-unchecked-box").classList.remove("hidden");
        } else {
            searchInput.name = "searchby-keyword";
            searchByKeyword.querySelector(".km-checked-box").classList.remove("hidden");
            searchByKeyword.querySelector(".km-unchecked-box").classList.add("hidden");
            searchByTitle.querySelector(".km-checked-box").classList.add("hidden");
            searchByTitle.querySelector(".km-unchecked-box").classList.remove("hidden");
        }
    }

    searchByTitle.addEventListener("click", function(e) {
      console.log(e)
        updateSearchOption("searchby-title");
    });

    searchByKeyword.addEventListener("click", function(e) {
      console.log(e)
        updateSearchOption("searchby-keyword");
    });
  }
}

export default KmFilter;