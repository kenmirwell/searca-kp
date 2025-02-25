/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./modules/FaqAcc.js":
/*!***************************!*\
  !*** ./modules/FaqAcc.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class FaqAcc {
  constructor() {}
  handleFaqAcc(elementId, index) {
    const accElement = document.getElementById(elementId);
    const height = accElement.offsetHeight;
    for (let i = 0; i < 6; i++) {
      if (index !== i) {
        document.getElementById(`answer-container-${i}`).style.height = 0;
        document.getElementById(`faq-group-${i}`).classList.remove("active-faq");
      } else {
        document.getElementById(`answer-container-${i}`).style.height = height + "px";
        document.getElementById(`faq-group-${i}`).classList.add("active-faq");
      }
    }

    // if( accContainer.classList.contains("active") ) {
    //     accContainer.style.height = 0
    //     accContainer.classList.remove("active")
    //     accHead.style.paddingBottom = 0
    // } else {
    //     accContainer.style.height = height+"px"
    //     accContainer.classList.add("active")
    //     accHead.style.paddingBottom = "10px"
    // }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FaqAcc);

/***/ }),

/***/ "./modules/HomeResourceSearch.js":
/*!***************************************!*\
  !*** ./modules/HomeResourceSearch.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _src_config_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../src/config.js */ "./src/config.js");

class HomeResourcesSearch {
  constructor() {
    this.isSpinnerVisible = false;
    this.response = [];
    this.typingTimer;
    this.selectedTypeValue = null;
    this.selectedTypeName = null;
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

            // const response = await fetch(`https://bcsdevelopmentgator.site/wp-json/custom/v1/search?search=${this.searchQuery}${categoryQuery}&per_page=5`);
            const response = await fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}knowledge-management?search=${this.searchQuery}${categoryQuery}&per_page=5`);
            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            if (data.length > 0) {
              searched.innerHTML = "";
              if (!this.selectedTypeName) {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.searchQuery}</span></h6>`;
              } else if (!this.searchQuery) {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.selectedTypeName}</span></h6>`;
              } else {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.selectedTypeName} with ${this.searchQuery}</span></h6>`;
              }
              data.forEach(item => {
                searched.innerHTML += `<div class="home-search-item"><a href="${item.link}"><p class="text-[14px]">${item.title.rendered}</p></a></div>`;
              });
              this.isSpinnerVisible = false;
            } else {
              if (!this.selectedTypeName) {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.searchQuery}</span></h6>`;
              } else if (!this.searchQuery) {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.selectedTypeName}</span></h6>`;
              } else {
                searchedTitle.innerHTML = `<h6 class="font-[600]">Search Result for <span class="text-[#458753]">${this.selectedTypeName} with ${this.searchQuery}</span></h6>`;
              }
              searched.innerHTML = `<div class="loader-container"><p>No result</p></div>`;
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
      item.onclick = e => {
        this.selectedTypeValue = item.getAttribute('data-value');
        this.selectedTypeName = item.getAttribute('data-name');
        console.log("this.selectedTypeName", this.selectedTypeName);
        this.toggleSearch(e);
      };
    });
    if (inputField) {
      inputField.addEventListener("input", e => {
        this.toggleSearch(e);
      });
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (HomeResourcesSearch);

/***/ }),

/***/ "./modules/MapFunc.js":
/*!****************************!*\
  !*** ./modules/MapFunc.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class MapFunc {
  constructor() {
    this.onMouseHoverMap();
  }
  onMouseHoverMap() {
    for (let i = 0; i < 12; i++) {
      const elements = document.getElementsByClassName(`country-${i}`);
      const maps = document.getElementsByClassName(`map-${i}`);
      Array.from(elements).forEach(element => {
        document.getElementById(`country-Philippines`)?.classList.add("active-icon");
        document.getElementById(`map-Philippines`)?.classList.add("active-map");

        //initialize an active country base on index 0
        for (let j = 0; j < 12; j++) {
          if (j !== 0) {
            const otherElements = document.getElementsByClassName(`country-${j}`);
            const otherMaps = document.getElementsByClassName(`map-${j}`);
            Array.from(otherElements).forEach(otherElement => {
              otherElement.classList.remove("active-icon");
              otherElement.classList.add("inactive-icon");
            });
            Array.from(otherMaps).forEach(otherMap => {
              otherMap.classList.remove("active-map");
              otherMap.classList.add("inactive-map");
            });
          }
        }
        element.addEventListener("mouseover", () => {
          element.classList.add("active-icon");
          element.classList.remove("inactive-icon");
          Array.from(maps).forEach(map => {
            map.classList.add("active-map");
            map.classList.remove("inactive-map");
          });
          for (let j = 0; j < 12; j++) {
            if (j !== i) {
              const otherElements = document.getElementsByClassName(`country-${j}`);
              const otherMaps = document.getElementsByClassName(`map-${j}`);
              Array.from(otherElements).forEach(otherElement => {
                otherElement.classList.remove("active-icon");
                otherElement.classList.add("inactive-icon");
              });
              Array.from(otherMaps).forEach(otherMap => {
                otherMap.classList.remove("active-map");
                otherMap.classList.add("inactive-map");
              });
            }
          }
        });
      });
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MapFunc);

/***/ }),

/***/ "./modules/MenuFunctionality.js":
/*!**************************************!*\
  !*** ./modules/MenuFunctionality.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class MobileMenuFunc {
  constructor() {}
  toggleMenu() {
    const menuContainer = document.getElementById("mobile-menu-container");
    if (menuContainer.classList.contains("active-mobile-menu")) {
      menuContainer.classList.remove("active-mobile-menu");
      menuContainer.classList.add("inactive-mobile-menu");
    } else {
      menuContainer.classList.remove("inactive-mobile-menu");
      menuContainer.classList.add("active-mobile-menu");
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenuFunc);

/***/ }),

/***/ "./modules/ModalManager.js":
/*!*********************************!*\
  !*** ./modules/ModalManager.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _src_config_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../src/config.js */ "./src/config.js");

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
    console.log("ENV", _src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"]);
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
    searchResults.innerHTML = `<div class="flex w-[100%] justify-center p-[20px]"><p>See your search results here</p></div>`;
    inputField.addEventListener("input", e => this.typingLogic(e, this.isSpinnerVisible));
  }
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
            const [pagesResponse, postsResponse, customPostsResponse] = await Promise.all([fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}pages?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res), fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}posts?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res), fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}knowledge-management?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then(res => res.status === 400 ? null : res)]);
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

/***/ }),

/***/ "./src/config.js":
/*!***********************!*\
  !*** ./src/config.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const ENV_VARS = {
  ROOT_URL: "https://cadre.searca.org/",
  API_URL: "https://cadre.searca.org/wp-json/wp/v2/"
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ENV_VARS);

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
/* harmony import */ var _modules_HomeResourceSearch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../modules/HomeResourceSearch */ "./modules/HomeResourceSearch.js");
/* harmony import */ var _modules_FaqAcc__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../modules/FaqAcc */ "./modules/FaqAcc.js");
/* harmony import */ var _modules_MapFunc__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../modules/MapFunc */ "./modules/MapFunc.js");
/* harmony import */ var _modules_MenuFunctionality__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../modules/MenuFunctionality */ "./modules/MenuFunctionality.js");





// import MouseOverFunc from "../modules/MouseOverFunc";

document.addEventListener("DOMContentLoaded", function () {
  const modalManager = new _modules_ModalManager__WEBPACK_IMPORTED_MODULE_0__["default"]();
  const homeResourceSearch = new _modules_HomeResourceSearch__WEBPACK_IMPORTED_MODULE_1__["default"]();
  const faqAcc = new _modules_FaqAcc__WEBPACK_IMPORTED_MODULE_2__["default"]();
  const mapFunc = new _modules_MapFunc__WEBPACK_IMPORTED_MODULE_3__["default"]();
  const menuFunc = new _modules_MenuFunctionality__WEBPACK_IMPORTED_MODULE_4__["default"]();
  // const mousehover = new MouseOverFunc();

  document.getElementById("contactus-header-button").addEventListener("click", function () {
    document.getElementById("footer").scrollIntoView({
      behavior: "smooth"
    });
  });
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
  let activePopupId = null;
  let activePopupIds = [];
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
  window.handleMapFunction = function (index) {
    mapFunc.onMouseHoverMap(index);
  };
  window.handleMobileMenu = function (event) {
    menuFunc.toggleMenu();
  };

  // window.mouseOverFunction = function(index) {
  //    mousehover.onMouseHover();
  // }

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
  window.dropDown = function () {
    if (isShown) {
      authorsDropdown.style.display = "none";
      isShown = false;
    } else {
      authorsDropdown.style.display = "block";
      isShown = true;
    }
  };
  homeResourceSearch.handleSearch();
  window.onload = function () {
    const accElement = document.getElementById("answer-0");
    const accContainer = document.getElementById("answer-container-0");
    const accHead = document.getElementById("faq-head-0");
    const accGroup = document.getElementById("faq-group-0");
    const map = document.getElementById("map-container");
    const phil = document.getElementById("country-Philippines");
    const laos = document.getElementById("country-Laos");
    const indo = document.getElementById("country-Indonesia");
    const camb = document.getElementById("country-Cambodia");
    const myan = document.getElementById("country-Myanmar");
    const brun = document.getElementById("country-Brunei");

    //initial setup for accordion in FAQ in homepage
    if (accElement) {
      const height = accElement.offsetHeight;
      accGroup.classList.add("active-faq");
      accContainer.style.height = height + "px";
    }
  };
  window.handleFaqAccordion = function (elementId, containerId, headId, index) {
    faqAcc.handleFaqAcc(elementId, containerId, headId, index);
  };
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
  window.selectedAuthor = function (author) {
    const selectedAuthor = document.getElementById("material__author").value;
  };
  let listenerStatus = {}; // Object to track the display status for each popup

  window.handlePopup = function (id, event) {
    event.stopPropagation(); // Prevents the click from being detected as an outside click

    const popup = document.getElementById(id);

    // Close all other popups
    for (let otherId in listenerStatus) {
      if (otherId !== id && listenerStatus[otherId].isOpen) {
        const otherPopup = document.getElementById(otherId);
        if (otherPopup) {
          otherPopup.style.display = "none"; // Close other popups
          listenerStatus[otherId].isOpen = false; // Update status
        }
      }
    }

    // Toggle the selected popup
    if (listenerStatus[id] && listenerStatus[id].isOpen === true) {
      popup.style.display = "none"; // Close it
      listenerStatus[id].isOpen = false;
    } else {
      popup.style.display = "flex"; // Open it
      listenerStatus[id] = {
        isOpen: true
      };
    }
  };

  // Close all modals when clicking outside
  document.addEventListener('click', function (event) {
    for (let id in listenerStatus) {
      const popup = document.getElementById(id);
      if (listenerStatus[id].isOpen && popup && !popup.contains(event.target)) {
        popup.style.display = "none"; // Close it
        listenerStatus[id].isOpen = false;
      }
    }
  });

  //for scrolling behavior of header
  let lastScrollTop = 0;
  const header = document.getElementById('header');
  const triggerHeight = 300;
  window.addEventListener('scroll', event => {
    const currentScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (currentScrollTop > triggerHeight) {
      if (currentScrollTop > lastScrollTop) {
        header.classList.add('hide-header');
      } else {
        header.classList.remove('hide-header');
      }
    }
    lastScrollTop = Math.max(0, currentScrollTop); // Prevent negative values

    //This will close all open modal in the header
    for (let id in listenerStatus) {
      const popup = document.getElementById(id);
      if (listenerStatus[id].isOpen && popup && !popup.contains(event.target)) {
        popup.style.display = "none"; // Close it
        listenerStatus[id].isOpen = false;
      }
    }
  });
  jQuery(document).ready(function ($) {
    $('.banner-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      arrows: false
    });
  });
  jQuery(document).ready(function ($) {
    $('.featured-material-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      arrows: false
    });
  });
  jQuery(document).ready(function ($) {
    $('#home-featured-resources').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots: true,
      arrows: false,
      infinite: true,
      responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // {
      //   breakpoint: 600,
      //   settings: {
      //     slidesToShow: 2,
      //     slidesToScroll: 2
      //   }
      // },
      // {
      //   breakpoint: 480,
      //   settings: {
      //     slidesToShow: 1,
      //     slidesToScroll: 1
      //   }
      // }
      ]
    });
  });
});
/******/ })()
;
//# sourceMappingURL=index.js.map