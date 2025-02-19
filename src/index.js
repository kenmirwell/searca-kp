import ModalManager from "../modules/ModalManager";
import HomeResourceSearch from "../modules/HomeResourceSearch";
import FaqAcc from "../modules/FaqAcc";
import MapFunc from "../modules/MapFunc";
import MobileMenuFunc from "../modules/MenuFunctionality";
// import MouseOverFunc from "../modules/MouseOverFunc";


document.addEventListener("DOMContentLoaded", function () {

    const modalManager = new ModalManager();
    const homeResourceSearch = new HomeResourceSearch();
    const faqAcc = new FaqAcc();
    const mapFunc = new MapFunc();
    const menuFunc = new MobileMenuFunc();
    // const mousehover = new MouseOverFunc();


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
    let activePopupId = null;
    let activePopupIds = [];
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

    window.handleMapFunction = function(index) {
        mapFunc.onMouseHoverMap(index);
    }

    window.handleMobileMenu = function(event) {
        menuFunc.toggleMenu();
    }

    // window.mouseOverFunction = function(index) {
    //    mousehover.onMouseHover();
    // }

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
    

    window.dropDown = function() {
        if(isShown) {
            authorsDropdown.style.display = "none"
            isShown = false;
        } else {
            authorsDropdown.style.display = "block"
            isShown = true
        }
    }

    homeResourceSearch.handleSearch();

    window.onload = function() {
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
        if(accElement) {    
            const height = accElement.offsetHeight;
            
            accGroup.classList.add("active-faq");
            accContainer.style.height = height+"px";
        }

        //Initial setup for map
        if(map) {

            const rect = map.getBoundingClientRect();

           
            const x = event.clientX - rect.left; 
            const y = event.clientY - rect.top;

            console.log("x-coordinates", x)
            console.log("y-coordinates", y)
        }
    }

    window.handleFaqAccordion = function(elementId, containerId, headId, index) {
        faqAcc.handleFaqAcc(elementId, containerId, headId, index);
    }

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

    window.selectedAuthor = function(author) {
        const selectedAuthor = document.getElementById("material__author").value
    }


    let listenerStatus = {}; // Object to track the display status for each popup

    window.handlePopup = function(id, event) {
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
            listenerStatus[id] = { isOpen: true };
        }
    };
    
    // Close all modals when clicking outside
    document.addEventListener('click', function(event) {
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
    

    window.addEventListener('scroll', (event) => {
       
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

    jQuery(document).ready(function($) {
        $('.banner-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,   
            autoplaySpeed: 2000,
            dots: true,
            arrows: false,
        });
    });

    jQuery(document).ready(function($) {
        $('.featured-material-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: false,
        });
    });

    jQuery(document).ready(function($) {
        $('#home-featured-resources').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: false,
            infinite: true,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                },
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






