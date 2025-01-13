/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./modules/ModalManager.js":
/*!*********************************!*\
  !*** ./modules/ModalManager.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class ModalManager {
  constructor() {
    this.modalStatus = false;
    this.currentModal = null;
    this.typingTimer;
    this.isSpinnerVisible = false;
    this.currentPage = 1;
    this.pageOffset = 5;
    this.initialPage = 1;
    this.totalPages;
    this.pageIndex = 0;
  }
  toggleModal(id) {
    const modal = document.getElementById(id);
    if (this.modalStatus && this.currentModal === modal) {
      this.closeModal(modal);
    } else {
      if (this.currentModal) {
        this.closeModal(this.currentModal);
      }
      this.openModal(modal);
    }
  }
  openModal(modal) {
    modal.style.display = "flex";
    this.modalStatus = true;
    this.currentModal = modal;
  }
  closeModal(modal) {
    modal.style.display = "none";
    this.modalStatus = false;
    this.currentModal = null;
    const inputField = document.getElementById("global-search");
    inputField.value = null;
  }
  handleSearch() {
    const inputField = document.getElementById("global-search");
    const searchResults = document.getElementById("global-search-content");
    // inputField.addEventListener("keydown", this.typingLogic(inputField));

    searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]"><p>See your search results here</p></div>`;
    inputField.addEventListener("input", e => this.typingLogic(e, this.isSpinnerVisible));
  }

  // typingLogic() {
  //     const searchResults = document.getElementById("global-search-content");

  //     clearTimeout(this.typingTimer);

  //     searchResults.innerHTML = '<div class="loader-container"><div class="loader"></div></div>'

  //     this.typingTimer = setTimeout(function() {
  //         searchResults.innerHTML = '<h1>Results....</h1>>'
  //     }, 1000) 
  // }

  disableScrolling() {
    document.body.style.overflow = 'hidden';
  }
  enableScrolling() {
    document.body.style.overflow = 'scroll';
  }
  typingLogic(e) {
    const searchResults = document.getElementById("global-search-content");
    const paginationContainer = document.getElementById("pagination-container");
    const searchQuery = e.target.value.trim();
    const itemsPerPage = 2;
    clearTimeout(this.typingTimer);
    if (!paginationContainer) {
      console.error("Pagination container not found!");
      return;
    }
    if (!this.isSpinnerVisible) {
      searchResults.innerHTML = '<div class="loader-container"><div class="loader"></div></div>';
      this.isSpinnerVisible = true;
      this.renderPaginationControls(paginationContainer, this.currentPage, true);
    }
    this.typingTimer = setTimeout(() => {
      const getData = async (page = this.currentPage) => {
        console.log("page", page);
        if (searchQuery) {
          try {
            const [pagesResponse, postsResponse, customPostsResponse] = await Promise.all([fetch(`https://bcsdevelopmentgator.site/wp-json/wp/v2/pages?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res), fetch(`https://bcsdevelopmentgator.site/wp-json/wp/v2/posts?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res), fetch(`https://bcsdevelopmentgator.site/wp-json/wp/v2/knowledge-management?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res)]);
            const pages = !pagesResponse ? [] : await pagesResponse.json();
            const posts = !postsResponse ? [] : await postsResponse.json();
            const customPosts = !customPostsResponse ? [] : await customPostsResponse.json();
            const totalPagesPages = !pagesResponse ? 1 : pagesResponse.headers.get("X-WP-TotalPages") || 1;
            const totalPagesPosts = !postsResponse ? 1 : postsResponse.headers.get("X-WP-TotalPages") || 1;
            const totalPagesCustomPosts = !customPostsResponse ? 1 : customPostsResponse.headers.get("X-WP-TotalPages") || 1;
            this.totalPages = Math.max(totalPagesPages, totalPagesPosts, totalPagesCustomPosts);
            const response = [...pages, ...posts, ...customPosts];
            const filterResponse = response.filter(item => !item.acf.not_searchable);
            if (filterResponse.length > 0) {
              searchResults.innerHTML = filterResponse.map(i => `
                                    <div class="flex flex-col gap-[5px] border-b-[1px] py-[20px]">
                                        <h1 class="font-[600]">${i.title.rendered}</h1>
                                        <div class="search-item-content text-[14px]">${i.content.rendered}</div>
                                        <div class="w-[100%] flex">
                                            <button class="text-left font-[600] text-[#196129] text-[14px]">
                                                <a href="${i.link}">View more</a>
                                            </button>
                                        </div>
                                    </div>
                                `).join("");
              this.renderPaginationControls(paginationContainer, this.currentPage, false);
              this.isSpinnerVisible = false;
            } else {
              this.isSpinnerVisible = false;
              searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]">
                                <p>No search matches for <span class="font-[600]">"${searchQuery}"</span></p>
                            </div>`;
            }
          } catch (error) {
            console.error("Error fetching data:", error);
          }
        } else {
          searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]">
                        <p>See your search results here</p>
                    </div>`;
          this.isSpinnerVisible = false;
        }
      };
      getData();
    }, 1000);
  }
  pageButton(textContent, activePage, paginationContainer, disabled, from, index) {
    const button = document.createElement("button");
    button.textContent = textContent;
    button.disabled = disabled;
    if (from === "elipsis") {
      button.className = "elipsis";
    }
    if (from === "num") {
      button.className = "numbered-pagination-button";
      if (textContent === this.currentPage) {
        button.classList.add("active-page");
      }
    }
    button.addEventListener("click", () => this.changePage(activePage, index));
    paginationContainer.appendChild(button);
  }
  renderPaginationControls(paginationContainer, currentPage, isNotVisible, totalPages) {
    paginationContainer.innerHTML = "";
    if (isNotVisible) {
      return;
    }
    if (this.currentPage !== 1) {
      console.log("initialPage", this.initialPage);
      this.pageButton("Prev", this.currentPage - 1, paginationContainer, this.currentPage === 1, "", "prev");
    }

    // if(this.initialPage !== 1) {
    //     this.pageButton("1", 1, paginationContainer, null, "num", "first")
    //     this.pageButton("...", null, paginationContainer, true, "elipsis", null)
    // }

    for (let i = this.initialPage; i <= this.pageOffset; i++) {
      this.pageButton(i, i, paginationContainer, false, "num", this.pageIndex++);
      this.pageIndex = this.pageIndex % 5;
    }

    // if(this.pageOffset < this.totalPages - 1) {
    //     this.pageButton("...", null, paginationContainer, true, "elipsis", null)
    //     this.pageButton(this.totalPages, this.totalPages, paginationContainer, null, "num", "last")
    // }

    if (this.currentPage !== this.pageOffset) {
      this.pageButton("Next", this.currentPage + 1, paginationContainer, this.currentPage === totalPages, "", "next");
    }
  }
  changePage(activePage, index) {
    if (activePage < 1) {
      return;
    }
    ;
    this.currentPage = activePage;
    if (index === 4) {
      if (activePage !== this.totalPages) {
        this.initialPage = this.initialPage + 1;
        this.pageOffset = this.pageOffset + 1;
      }
    } else if (index === 0) {
      if (activePage !== 1) {
        this.initialPage = this.initialPage - 1;
        this.pageOffset = this.pageOffset - 1;
      }
    } else if (index === "prev") {
      if (activePage !== 1) {
        this.initialPage = this.initialPage - 1;
        this.pageOffset = this.pageOffset - 1;
      }
    } else if (index === "next") {
      if (activePage !== this.totalPages) {
        this.initialPage = this.initialPage + 1;
        this.pageOffset = this.pageOffset + 1;
      }
    }
    this.typingLogic({
      target: {
        value: document.getElementById("global-search").value.trim()
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ModalManager);

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_ModalManager__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../modules/ModalManager */ "./modules/ModalManager.js");

const modalManager = new _modules_ModalManager__WEBPACK_IMPORTED_MODULE_0__["default"]();
document.addEventListener("DOMContentLoaded", function () {
  if (window.location.search.includes('error_registration=true')) {
    const emailValidation = document.getElementsByClassName("email-validation");
    emailValidation[0].style.display = "block";
  }
  if (window.location.search.includes('error_login=true')) {
    const loginValidation = document.getElementsByClassName("login-validation");
    loginValidation[0].style.display = "block";
  }
  let tab = 0;
  let isShown = false;
  let onSearch = false;
  let modalStatus = false;
  let popupStatus = false;
  const overview = document.getElementById("material-overview");
  const content = document.getElementById("material-content");
  const testimonials = document.getElementById("material-testimonials");
  const authorsDropdown = document.getElementById("author-dropdown");
  const searchModal = document.getElementById("search-modal");
  if (overview) {
    if (tab == 0) {
      overview.style.display = "block";
      content.style.display = "none";
      testimonials.style.display = "none";
    }
  }
  window.handleAccordion = function (elementId, containerId, headId) {
    const accElement = document.getElementById(elementId);
    const accContainer = document.getElementById(containerId);
    const accHead = document.getElementById(headId);
    const height = accElement.offsetHeight;
    if (accContainer.classList.contains("active")) {
      accContainer.style.height = 0;
      accContainer.classList.remove("active");
      accHead.style.paddingBottom = 0;
    } else {
      accContainer.style.height = height + "px";
      accContainer.classList.add("active");
      accHead.style.paddingBottom = "10px";
    }
    console.log(accContainer, accElement, height);
  };

  // window.hideShow = function(tabIndex) {
  //     tab = tabIndex
  //     if (tab == 0) {
  //     overview.style.display = "block"
  //     content.style.display = "none"
  //     testimonials.style.display = "none"
  //     }
  //     else if (tab == 1) { 
  //     overview.style.display = "none"
  //     content.style.display = "block"
  //     testimonials.style.display = "none"
  //     }
  //     else if (tab == 2) { 
  //     overview.style.display = "none"
  //     content.style.display = "none"
  //     testimonials.style.display = "block"
  //     }
  // }

  window.dropDown = function () {
    if (isShown) {
      authorsDropdown.style.display = "none";
      isShown = false;
    } else {
      authorsDropdown.style.display = "block";
      isShown = true;
    }
  };

  // window.onSearch = function() {
  //     if(onSearch) {
  //         searchModal.style.display = "none"
  //         onSearch = false;
  //     } else {
  //         searchModal.style.display = "flex"
  //         onSearch = true;
  //     }
  // }

  // window.onModal = function(id) {
  //     const modal = document.getElementById(id)

  //     if(modalStatus) {
  //         modal.style.display = "none"
  //         modalStatus = false;
  //     } else {
  //         modal.style.display = "flex"
  //         modalStatus = true;
  //     }   
  // }

  window.onModal = function (id, action) {
    modalManager.toggleModal(id);
    modalManager.handleSearch();
    console.log("action", action);
    if (action === "close") {
      modalManager.enableScrolling();
    } else if (action === "open") {
      modalManager.disableScrolling();
    }
  };
  window.handlePopup = function (id) {
    const popup = document.getElementById('auth');
    if (popupStatus) {
      popup.style.display = "none";
      popupStatus = false;
      document.removeEventListener('click', handleOutsideClick);
    } else {
      popup.style.display = "flex";
      popupStatus = true;
      setTimeout(() => document.addEventListener('click', handleOutsideClick));
    }
  };

  //Close the popup when clicking anywhere outside the popup
  function handleOutsideClick(event) {
    const popup = document.getElementById('auth');
    if (!popup.contains(event.target)) {
      popup.style.display = "none";
      popupStatus = false;
      document.removeEventListener('click', handleOutsideClick);
    }
  }
  window.selectedAuthor = function (author) {
    const selectedAuthor = document.getElementById("material__author").value;
  };

  // const myButton = document.getElementById("ajax-request");
  // myButton.addEventListener('click', e => {
  //    console.log("ajax request triggered")
  // });

  // window.myButton = function(author) {
  //     const sample = document.getElementById("ajax-request");
  //     console.log("sample", sample)
  // }

  jQuery(document).ready(function ($) {
    $('.banner-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false
    });
  });
  jQuery(document).ready(function ($) {
    $('.featured-material-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false
    });
  });
});
/******/ })()
;
//# sourceMappingURL=index.js.map