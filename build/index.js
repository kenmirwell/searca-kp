/******/ (() => { // webpackBootstrap
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
console.log("Javascript running now");
document.addEventListener("DOMContentLoaded", function () {
  //learnimg material tabs switching

  let tab = 0;
  let isShown = false;
  let onSearch = false;
  let modalStatus = false;
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
  window.hideShow = function (tabIndex) {
    tab = tabIndex;
    if (tab == 0) {
      overview.style.display = "block";
      content.style.display = "none";
      testimonials.style.display = "none";
    } else if (tab == 1) {
      overview.style.display = "none";
      content.style.display = "block";
      testimonials.style.display = "none";
    } else if (tab == 2) {
      overview.style.display = "none";
      content.style.display = "none";
      testimonials.style.display = "block";
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
  window.onSearch = function () {
    if (onSearch) {
      searchModal.style.display = "none";
      onSearch = false;
    } else {
      searchModal.style.display = "flex";
      onSearch = true;
    }
  };
  window.onModal = function (id) {
    const modal = document.getElementById(id);
    console.log("id", id);
    if (modalStatus) {
      modal.style.display = "none";
      modalStatus = false;
    } else {
      modal.style.display = "flex";
      modalStatus = true;
    }
  };
  window.selectedAuthor = function (author) {
    const selectedAuthor = document.getElementById("material__author").value;
    console.log("selectedAuthor", selectedAuthor);
  };
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