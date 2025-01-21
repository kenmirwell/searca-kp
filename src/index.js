import ModalManager from "../modules/ModalManager";
import HomeResourceSearch from "../modules/HomeResourceSearch";

const modalManager = new ModalManager();
const homeResourceSearch = new HomeResourceSearch();

document.addEventListener("DOMContentLoaded", function () {


    if(window.location.search.includes('error_registration=true')) {
        const emailValidation = document.getElementsByClassName("email-validation");

        emailValidation[0].style.display = "block";
    } 
    
    if(window.location.search.includes('error_login=true')){
        const loginValidation = document.getElementsByClassName("login-validation");

        loginValidation[0].style.display = "block";
    }



    let tab = 0;
    let isShown = false;
    let onSearch = false;
    let modalStatus = false;
    let popupStatus = false;
    const overview = document.getElementById("material-overview")
    const content = document.getElementById("material-content")
    const testimonials = document.getElementById("material-testimonials")
    const authorsDropdown = document.getElementById("author-dropdown")
    const searchModal = document.getElementById("search-modal")
    
    if(overview) {
        if (tab == 0) {
            overview.style.display = "block"
            content.style.display = "none"
            testimonials.style.display = "none"
        }
    }

    window.handleAccordion = function(elementId, containerId, headId) {
        const accElement = document.getElementById(elementId)
        const accContainer = document.getElementById(containerId)
        const accHead = document.getElementById(headId)

        const height = accElement.offsetHeight;

        if( accContainer.classList.contains("active") ) {
            accContainer.style.height = 0
            accContainer.classList.remove("active")
            accHead.style.paddingBottom = 0
        } else {
            accContainer.style.height = height+"px"
            accContainer.classList.add("active")
            accHead.style.paddingBottom = "10px"
        }

        console.log(accContainer, accElement, height)
    }
    
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

    window.dropDown = function() {
        if(isShown) {
            authorsDropdown.style.display = "none"
            isShown = false;
        } else {
            authorsDropdown.style.display = "block"
            isShown = true
        }
    }

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

    homeResourceSearch.handleSearch();

    window.onModal = function(id, action) {
        modalManager.toggleModal(id);
        modalManager.handleSearch();    

        console.log("action", action)

        if(action === "close") {
            modalManager.enableScrolling();
        } else if(action === "open") {
            modalManager.disableScrolling();
        }
    };

    window.handlePopup = function(id) {
        const popup = document.getElementById('auth')

        if(popupStatus) {
            popup.style.display = "none"
            popupStatus = false;
            document.removeEventListener('click', handleOutsideClick);
        } else {
            popup.style.display = "flex"
            popupStatus = true;
            setTimeout(() => document.addEventListener('click', handleOutsideClick));
        }
    }

    //Close the popup when clicking anywhere outside the popup
    function handleOutsideClick(event) {
        const popup = document.getElementById('auth');
        
        if (!popup.contains(event.target)) { 
            popup.style.display = "none";
            popupStatus = false;
            document.removeEventListener('click', handleOutsideClick);
        }
    }

    window.selectedAuthor = function(author) {
        const selectedAuthor = document.getElementById("material__author").value
    }
    
    // const myButton = document.getElementById("ajax-request");
    // myButton.addEventListener('click', e => {
    //    console.log("ajax request triggered")
    // });

    // window.myButton = function(author) {
    //     const sample = document.getElementById("ajax-request");
    //     console.log("sample", sample)
    // }

    jQuery(document).ready(function($) {
        $('.banner-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,   
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
        });
    });

    jQuery(document).ready(function($) {
        $('.featured-material-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
        });
    });
});






