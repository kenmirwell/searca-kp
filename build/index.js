/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./modules/AgdomImageTransition.js":
/*!*****************************************!*\
  !*** ./modules/AgdomImageTransition.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class AgdomTransition {
  constructor() {}
  handleTrasition() {
    const keyPoints = document.querySelectorAll(".key-point");
    const images = document.querySelectorAll(".image-wrapper");
    keyPoints.forEach(item => {
      item.addEventListener("mouseenter", function () {
        let index = item.getAttribute("data-index");
        images.forEach(img => {
          img.style.opacity = img.getAttribute("data-index") === index ? "1" : "0";
        });
        keyPoints.forEach(kp => {
          kp.style.backgroundColor = kp.getAttribute("data-index") === index ? "#0C5C32" : "transparent";
        });
      });
    });

    // Show the first image by default
    if (images.length > 0) {
      images[0].style.opacity = "1";
    }
    if (keyPoints.length > 0) {
      keyPoints[0].style.backgroundColor = "#0C5C32";
    }

    // Optional: Reset to first image when mouse leaves key points
    document.querySelector(".flex").addEventListener("mouseleave", function () {
      images.forEach((img, idx) => {
        img.style.opacity = idx === 0 ? "1" : "0";
      });
      keyPoints.forEach((kp, idx) => {
        kp.style.backgroundColor = idx === 0 ? "#0C5C32" : "transparent";
      });
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (AgdomTransition);

/***/ }),

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
    console.log(height);
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

/***/ "./modules/FrontpageFilterAcc.js":
/*!***************************************!*\
  !*** ./modules/FrontpageFilterAcc.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class FrontpageFilterAcc {
  constructor() {}
  handleHomeFilterAcc(elementId, index) {
    const accElement = document.getElementById(elementId);
    const height = accElement.offsetHeight < 200 ? accElement.offsetHeight : 200;
    for (let i = 0; i < 4; i++) {
      if (index !== i) {
        document.getElementById(`home-side-filter-container-${i}`).style.height = 0;
        document.getElementById(`home-side-filter-container-${i}`).style.margin = "0";
      } else {
        document.getElementById(`home-side-filter-container-${i}`).style.height = height + "px";
        document.getElementById(`home-side-filter-container-${i}`).style.margin = "10px 0";
      }
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FrontpageFilterAcc);

/***/ }),

/***/ "./modules/Gsap.js":
/*!*************************!*\
  !*** ./modules/Gsap.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class GsapControls {
  constructor() {}
  commonHeroAnimation() {
    if (document.querySelector('.text-element-container')) {
      gsap.set('.text-element-container', {
        opacity: 0,
        x: -100
      });
      gsap.set('.image-element-container', {
        opacity: 0,
        x: 100
      });

      // Animate the text first (left to right)
      gsap.to('.text-element-container', {
        duration: 1.5,
        x: 0,
        opacity: 1,
        ease: "power2.out"
      });

      // Animate the image second (right to left) with a delay
      gsap.to('.image-element-container', {
        duration: 1.5,
        x: 0,
        opacity: 1,
        ease: "power2.out",
        delay: 0.5 // Waits for text animation to start first
      });
    }
  }
  commonTwoColumn() {
    if (document.querySelectorAll("[class^='common-two-column-']")) {
      const sections = document.querySelectorAll("[class^='common-two-column-']");

      // Check how many sections are visible upon load
      let visibleSections = [];
      sections.forEach(section => {
        const rect = section.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          visibleSections.push(section);
        }
      });
      sections.forEach((section, index) => {
        const leftElement = section.querySelector('.gsap-element-left');
        const rightElement = section.querySelector('.gsap-element-right');

        // If multiple sections are visible, stagger their delays
        const applyDelay = visibleSections.length > 1;
        const staggerDelay = applyDelay ? index * 0.5 : 0;
        if (leftElement) {
          gsap.set(leftElement, {
            opacity: 0,
            x: 100
          });
          gsap.to(leftElement, {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
            delay: staggerDelay,
            scrollTrigger: {
              trigger: section,
              start: "top 75%",
              toggleActions: "play none none none"
            }
          });
        }
        if (rightElement) {
          gsap.set(rightElement, {
            opacity: 0,
            x: -100
          });
          gsap.to(rightElement, {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
            delay: staggerDelay + (applyDelay ? 0.3 : 0),
            // Slight delay if stagger applies
            scrollTrigger: {
              trigger: section,
              start: "top 75%",
              toggleActions: "play none none none"
            }
          });
        }
      });
    }
  }
  boxedThreeColumn() {
    if (document.querySelector('.boxed-item')) {
      gsap.set(".boxed-item", {
        opacity: 0,
        y: 100
      });
      gsap.to(".boxed-item", {
        duration: 1.5,
        y: 0,
        opacity: 1,
        ease: "power2.out",
        stagger: 0.2,
        // Delays each item for a natural staggered effect
        scrollTrigger: {
          trigger: ".boxed-three-column",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
    }
  }
  heroSlider() {
    if (document.querySelector('.hero-text-element')) {
      gsap.set('.hero-text-element', {
        opacity: 0,
        x: -100
      });
      gsap.to('.hero-text-element', {
        duration: 1.5,
        x: 0,
        opacity: 1,
        ease: "power2.out"
      });
    }
  }
  heroSection() {
    if (document.querySelector('.simple-header')) {
      gsap.set('.simple-header', {
        opacity: 0,
        y: 100
      });
      gsap.set('.component-item-element', {
        opacity: 0,
        y: 100
      });
      gsap.set('.ag-element-right', {
        opacity: 0,
        x: 100
      });
      gsap.set('.ag-element-left', {
        opacity: 0,
        x: -100
      });
      gsap.set('.comm-of-practice', {
        opacity: 0
      });
      gsap.set('.knowledge-resources', {
        opacity: 0
      });
      gsap.to('.simple-header', {
        duration: 1.5,
        y: 0,
        opacity: 1,
        ease: "power2.out"
      });
      gsap.to(".component-item-element", {
        duration: 1.5,
        y: 0,
        opacity: 1,
        ease: "power2.out",
        stagger: 0.2,
        // Delays each item for a natural staggered effect
        scrollTrigger: {
          trigger: ".component-item-element",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
      gsap.to('.ag-element-left', {
        duration: 1.5,
        x: 0,
        opacity: 1,
        ease: "power2.out",
        scrollTrigger: {
          trigger: ".ag-elements",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
      gsap.to('.ag-element-right', {
        duration: 1.5,
        x: 0,
        opacity: 1,
        ease: "power2.out",
        delay: 0.5,
        // Adds a 0.5s delay before starting the animation
        scrollTrigger: {
          trigger: ".ag-elements",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
      gsap.to('.comm-of-practice', {
        duration: 1.5,
        // Instantly applies the effect
        opacity: 1,
        delay: 0.1,
        // Waits 0.5s before making the element visible
        scrollTrigger: {
          trigger: ".comm-of-practice",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
      gsap.to('.knowledge-resources', {
        duration: 1.5,
        // Instantly applies the effect
        opacity: 1,
        delay: 0.1,
        // Waits 0.5s before making the element visible
        scrollTrigger: {
          trigger: ".knowledge-resources",
          start: "top 75%",
          toggleActions: "play none none none"
        }
      });
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GsapControls);

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
    this.searchQuery = "";
    this.selectedValues = {};
    this.searchBy = "search"; // Default to keyword-based search
    this.initEvents();
  }
  initEvents() {
    const searchByTitle = document.getElementById("search-by-title");
    const searchByKeyword = document.getElementById("search-by-keyword");
    if (!searchByTitle || !searchByKeyword) {
      return;
    }
    searchByTitle.addEventListener("click", () => {
      this.searchBy = "title_search"; // Switch to title-based search
      searchByTitle.classList.add("active-searchby");
      searchByTitle.classList.remove("inactive-searchby");
      searchByKeyword.classList.add("inactive-searchby");
      searchByKeyword.classList.remove("active-searchby");
      if (this.selectedValues["search"] && this.selectedValues["search"].length > 0) {
        this.selectedValues["title_search"] = this.selectedValues["search"];
        delete this.selectedValues["search"];
      } else {
        delete this.selectedValues["search"];
      }
      this.performSearch(this.selectedValues); //what am i doing wrong here
    });
    searchByKeyword.addEventListener("click", () => {
      this.searchBy = "search"; // Switch to keyword-based search
      searchByTitle.classList.add("inactive-searchby");
      searchByTitle.classList.remove("active-searchby");
      searchByKeyword.classList.add("active-searchby");
      searchByKeyword.classList.remove("inactive-searchby");
      console.log("this.selectedValues[title_search]", this.selectedValues["title_search"]);
      if (this.selectedValues["title_search"] && this.selectedValues["title_search"].length > 0) {
        this.selectedValues["search"] = this.selectedValues["title_search"];
        delete this.selectedValues["title_search"];
      } else {
        delete this.selectedValues["title_search"];
      }
      this.performSearch(this.selectedValues); //what am i doing wrong here
    });
  }
  handleSearch() {
    const inputField = document.getElementById("search-resources");
    const categoryContainers = document.querySelectorAll(".type-category-container, .author-category-container, .country-category-container, .date-category-container");
    if (!inputField || !categoryContainers) {
      return;
    }

    // Keep this.selectedValues local to function

    // Handle category filters dynamically
    categoryContainers.forEach(container => {
      container.addEventListener("click", e => {
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
        if (!this.selectedValues[taxonomy]) {
          this.selectedValues[taxonomy] = [];
        }

        // Toggle selection
        if (this.selectedValues[taxonomy].includes(value)) {
          this.selectedValues[taxonomy] = this.selectedValues[taxonomy].filter(v => v !== value);
          if (this.selectedValues[taxonomy].length === 0) delete this.selectedValues[taxonomy]; // Remove empty taxonomy
        } else {
          this.selectedValues[taxonomy].push(value);
        }
        this.performSearch(this.selectedValues);
      });
    });

    // Search input event listener with debounce
    let debounceTimer;
    inputField.addEventListener("input", e => {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(() => {
        const searchValue = e.target.value.trim();

        // Reset other search mode when switching
        if (this.searchBy === "search") {
          delete this.selectedValues["title_search"];
        } else {
          delete this.selectedValues["search"];
        }

        // Update the selected search filter
        if (searchValue.length > 0) {
          this.selectedValues[this.searchBy] = [searchValue];
        } else {
          delete this.selectedValues[this.searchBy];
        }
        this.performSearch(this.selectedValues);
      }, 500); // 500ms debounce delay
    });
  }
  performSearch(selectedValues) {
    let queryString = Object.keys(selectedValues).map(tax => selectedValues[tax].map(val => `${tax}=${encodeURIComponent(val)}`).join("&")).join("&");
    let apiUrl = `${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}knowledge-management?${queryString}`;
    console.log("apiUrl", apiUrl);
    requestAnimationFrame(() => {
      //built in javascript function
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
        const resultsHTML = data.map(item => `<div class="home-search-item"><a class="text-[16px]" href="${item.link}">${item.title.rendered}</a></div>`).join("");
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
    requestAnimationFrame(() => {
      //built in javascript function
      const searched = document.getElementById("home-search-result");
      if (searched) {
        searched.innerHTML = content;
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (HomeResourcesSearch);

/***/ }),

/***/ "./modules/KmFilter.js":
/*!*****************************!*\
  !*** ./modules/KmFilter.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class KmFilter {
  constructor() {}
  handleKmSearchby() {
    const searchByTitle = document.getElementById("km-search-by-title");
    const searchByKeyword = document.getElementById("km-search-by-keyword");
    const searchInput = document.getElementById("km-search-resources");
    if (searchInput.name === "searchby-title") {
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
      console.log("selected", selected);
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
    searchByTitle.addEventListener("click", function (e) {
      console.log(e);
      updateSearchOption("searchby-title");
    });
    searchByKeyword.addEventListener("click", function (e) {
      console.log(e);
      updateSearchOption("searchby-keyword");
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (KmFilter);

/***/ }),

/***/ "./modules/KmFilterAcc .js":
/*!*********************************!*\
  !*** ./modules/KmFilterAcc .js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class KmFilterAcc {
  constructor() {}
  handleKmFilterAcc(elementId, groupId, index) {
    const accElement = document.getElementById(elementId);
    const height = accElement.offsetHeight < 200 ? accElement.offsetHeight : 200;
    for (let i = 0; i < 4; i++) {
      if (index !== i) {
        document.getElementById(`km-side-filter-container-${i}`).style.height = 0;
        document.getElementById(`km-side-filter-container-${i}`).style.margin = "0";
      } else {
        document.getElementById(`km-side-filter-container-${i}`).style.height = height + "px";
        document.getElementById(`km-side-filter-container-${i}`).style.margin = "10px 0";
      }
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (KmFilterAcc);

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
    const body = document.body;
    if (menuContainer.classList.contains("active-mobile-menu")) {
      // Enable scrolling
      body.style.overflow = "";
      menuContainer.classList.remove("active-mobile-menu");
      menuContainer.classList.add("inactive-mobile-menu");
    } else {
      // Prevent scrolling
      body.style.overflow = "hidden";
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
    const itemsPerPage = 8;
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
        if (searchQuery) {
          try {
            const [pagesResponse, postsResponse, customPostsResponse] = await Promise.all([
            // fetch(`${ENV_VARS.API_URL}pages?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
            //     res.status === 400 ? null : res
            // ),
            // fetch(`${ENV_VARS.API_URL}posts?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
            //     res.status === 400 ? null : res
            // ),
            // fetch(`${ENV_VARS.API_URL}knowledge-management?search=${searchQuery}&per_page=${itemsPerPage}&page=${page}`).then((res) =>
            //     res.status === 400 ? null : res
            // ),
            fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}pages?search=${searchQuery}`).then(res => res.status === 400 ? null : res), fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}posts?search=${searchQuery}`).then(res => res.status === 400 ? null : res), fetch(`${_src_config_js__WEBPACK_IMPORTED_MODULE_0__["default"].API_URL}knowledge-management?search=${searchQuery}`).then(res => res.status === 400 ? null : res)]);
            const pages = !pagesResponse ? [] : await pagesResponse.json();
            const posts = !postsResponse ? [] : await postsResponse.json();
            const customPosts = !customPostsResponse ? [] : await customPostsResponse.json();

            // const totalPagesPages = !pagesResponse ? 1 : pagesResponse.headers.get("X-WP-TotalPages") || 1;
            // const totalPagesPosts = !postsResponse ? 1 : postsResponse.headers.get("X-WP-TotalPages") || 1;
            // const totalPagesCustomPosts = !customPostsResponse ? 1 : customPostsResponse.headers.get("X-WP-TotalPages") || 1;

            // this.totalPages = Math.max(totalPagesPages, totalPagesPosts, totalPagesCustomPosts);

            const response = [...pages, ...posts, ...customPosts];
            const filterResponse = response.filter(item => !item.acf.not_searchable);
            this.totalPages = Math.ceil(filterResponse.length / itemsPerPage);
            const startIndex = (this.currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginateResponse = filterResponse.slice(startIndex, endIndex);
            if (filterResponse.length > 0) {
              searchResults.innerHTML = paginateResponse.map(i => `
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
              this.renderPaginationControls(paginationContainer, this.currentPage, false, this.totalPages);
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
      this.pageButton("Prev", this.currentPage - 1, paginationContainer, this.currentPage === 1, "", "prev");
    }
    for (let i = this.initialPage; i <= Math.min(this.pageOffset, this.totalPages); i++) {
      this.pageButton(i, i, paginationContainer, false, "num", this.pageIndex++);
      this.pageIndex = this.pageIndex % 5;
    }
    if (this.totalPages > 1) {
      if (this.currentPage !== this.totalPages) {
        this.pageButton("Next", this.currentPage + 1, paginationContainer, this.currentPage === totalPages, "", "next");
      }
    }
  }
  changePage(activePage, index) {
    if (activePage < 1) {
      return;
    }
    ;
    this.currentPage = activePage;

    // if(index === 4) {
    //     if(activePage !== this.totalPages){
    //         this.initialPage = this.initialPage + 1;
    //         this.pageOffset = this.pageOffset + 1;
    //     }
    // } else if(index === 0) {
    //    if(activePage !== 1) {
    //         this.initialPage = this.initialPage - 1;
    //         this.pageOffset = this.pageOffset - 1;
    //     }
    // } 
    // else if(index === "prev") {
    //     if(activePage !== 1) {
    //         this.initialPage = this.initialPage - 1;
    //         this.pageOffset = this.pageOffset - 1;
    //     }
    // } else if(index ===  "next") {
    //     if(activePage !== this.totalPages) {
    //         this.initialPage = this.initialPage + 1;
    //         this.pageOffset = this.pageOffset + 1;
    //     } 
    // } 

    this.typingLogic({
      target: {
        value: document.getElementById("global-search").value.trim()
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ModalManager);

/***/ }),

/***/ "./modules/VideoFunc.js":
/*!******************************!*\
  !*** ./modules/VideoFunc.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class CustomVideoButton {
  constructor() {}
  handleCustomVideoButton(elementId, index) {
    const video = document.getElementById("cadrein-action-video");
    const playPauseBtn = document.getElementById('play-pause-btn');
    const overlay = document.getElementById('c-a-video-overlay');
    const container = document.getElementById('c-a-video-container');
    container.addEventListener('click', e => {
      if (video.paused) {
        video.play();
        overlay.style.opacity = "0";
        playPauseBtn.style.opacity = "0";
      } else {
        video.pause();
        overlay.style.opacity = "0.5";
        playPauseBtn.style.opacity = "1";
      }
    });

    // container.addEventListener('click', (e) => {
    //     if (!video.paused) {
    //         console.log("e", e)
    //         video.pause();
    //         overlay.style.opacity = "0.5"
    //         playPauseBtn.style.opacity = "1"
    //     }
    // });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CustomVideoButton);

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
/* harmony import */ var _modules_FrontpageFilterAcc__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../modules/FrontpageFilterAcc */ "./modules/FrontpageFilterAcc.js");
/* harmony import */ var _modules_KmFilterAcc___WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../modules/KmFilterAcc  */ "./modules/KmFilterAcc .js");
/* harmony import */ var _modules_KmFilter__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../modules/KmFilter */ "./modules/KmFilter.js");
/* harmony import */ var _modules_AgdomImageTransition__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../modules/AgdomImageTransition */ "./modules/AgdomImageTransition.js");
/* harmony import */ var _modules_VideoFunc__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../modules/VideoFunc */ "./modules/VideoFunc.js");
/* harmony import */ var _modules_Gsap__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../modules/Gsap */ "./modules/Gsap.js");











// import MouseOverFunc from "../modules/MouseOverFunc";

document.addEventListener("DOMContentLoaded", function () {
  const modalManager = new _modules_ModalManager__WEBPACK_IMPORTED_MODULE_0__["default"]();
  const homeResourceSearch = new _modules_HomeResourceSearch__WEBPACK_IMPORTED_MODULE_1__["default"]();
  const faqAcc = new _modules_FaqAcc__WEBPACK_IMPORTED_MODULE_2__["default"]();
  const homeFilterAcc = new _modules_FrontpageFilterAcc__WEBPACK_IMPORTED_MODULE_5__["default"]();
  const mapFunc = new _modules_MapFunc__WEBPACK_IMPORTED_MODULE_3__["default"]();
  const menuFunc = new _modules_MenuFunctionality__WEBPACK_IMPORTED_MODULE_4__["default"]();
  const kmFilterAcc = new _modules_KmFilterAcc___WEBPACK_IMPORTED_MODULE_6__["default"]();
  const knFilter = new _modules_KmFilter__WEBPACK_IMPORTED_MODULE_7__["default"]();
  const agdomImageTransition = new _modules_AgdomImageTransition__WEBPACK_IMPORTED_MODULE_8__["default"]();
  const customVideoButton = new _modules_VideoFunc__WEBPACK_IMPORTED_MODULE_9__["default"]();
  const gsapControls = new _modules_Gsap__WEBPACK_IMPORTED_MODULE_10__["default"]();
  // const mousehover = new MouseOverFunc();

  gsapControls.heroSlider();
  gsapControls.heroSection();
  gsapControls.commonHeroAnimation();
  gsapControls.commonTwoColumn();
  gsapControls.boxedThreeColumn();
  document.getElementById("contactus-header-button").addEventListener("click", function () {
    document.getElementById("footer").scrollIntoView({
      behavior: "smooth"
    });
  });
  const sections = document.querySelectorAll('[id^="topic-"]'); // all sections with id like topic-1, topic-2...
  const buttons = {};

  // Add click listeners
  sections.forEach((section, index) => {
    const id = section.id;
    const button = document.getElementById(`${id}-button`);
    if (button) {
      buttons[id] = button;
      button.addEventListener("click", function () {
        section.scrollIntoView({
          behavior: "smooth"
        });
      });
    }
  });

  // Scroll event to highlight the active button
  window.addEventListener("scroll", () => {
    let currentSection = null;
    sections.forEach(section => {
      const rect = section.getBoundingClientRect();
      if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
        currentSection = section.id;
      }
    });

    // Highlight only the active button
    for (const id in buttons) {
      if (id === currentSection) {
        buttons[id].classList.add("active-topic-button");
      } else {
        buttons[id].classList.remove("active-topic-button");
      }
    }
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
  const overview = document.getElementById("material-overview");
  const content = document.getElementById("material-content");
  const testimonials = document.getElementById("material-testimonials");
  const authorsDropdown = document.getElementById("author-dropdown");
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
    console.log("on load");
    const accElement = document.getElementById("answer-0");
    const accContainer = document.getElementById("answer-container-0");
    const accGroup = document.getElementById("faq-group-0");
    const homeaccElement = document.getElementById("home-side-filter-content-0");
    const homeaccContainer = document.getElementById("home-side-filter-container-0");
    const kmAccElement = document.getElementById("km-side-filter-content-0");
    const kmAccContainer = document.getElementById("km-side-filter-container-0");
    const searchByTitle = document.getElementById("km-search-by-title");
    const agdomKeypoint = document.getElementById('agdom-keypoints');
    const cadreVideo = document.getElementById("cadrein-action-video");

    //initial setup for accordion in FAQ in homepage
    if (accElement) {
      const height = accElement.offsetHeight;
      accGroup.classList.add("active-faq");
      accContainer.style.height = height + "px";
    }
    if (homeaccContainer) {
      const height = homeaccElement.offsetHeight;
      homeaccContainer.style.height = height + "px";
      homeaccContainer.style.margin = "10px 0";
    }
    if (kmAccContainer) {
      const height = kmAccElement.offsetHeight;
      kmAccContainer.style.height = height + "px";
      kmAccContainer.style.margin = "10px 0";
    }
    if (agdomKeypoint) {
      agdomImageTransition.handleTrasition();
    }
    if (cadreVideo) {
      customVideoButton.handleCustomVideoButton();
    }
    if (document.getElementById("swiper-wrapper")) {
      const swiper = new Swiper(".mySwiper", {
        effect: "cards",
        grabCursor: true,
        cardsEffect: {
          perSlideOffset: 10,
          perSlideRotate: 7,
          rotate: true
        }
      });
    }
    if (searchByTitle) {
      knFilter.handleKmSearchby();
    }
  };
  window.handleFaqAccordion = function (elementId, containerId, headId, index) {
    faqAcc.handleFaqAcc(elementId, containerId, headId, index);
  };
  window.handleHomeAccordion = function (elementId, containerId, headId, index) {
    homeFilterAcc.handleHomeFilterAcc(elementId, containerId, headId, index);
  };
  window.handleKmFilterAccordion = function (elementId, groupId, index) {
    kmFilterAcc.handleKmFilterAcc(elementId, groupId, index);
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
      autoplaySpeed: 10000,
      dots: true,
      arrows: false
    });
  });
  jQuery(document).ready(function ($) {
    $('.agri-featured-resources').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      dots: true,
      arrows: false
    });
  });
  jQuery(document).ready(function ($) {
    $('#home-featured-resources').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
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