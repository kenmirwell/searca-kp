import ModalManager from "../modules/ModalManager";
import HomeResourceSearch from "../modules/HomeResourceSearch";
import FaqAcc from "../modules/FaqAcc";
import MapFunc from "../modules/MapFunc";
import MobileMenuFunc from "../modules/MenuFunctionality";
import HomeFilterAcc from "../modules/FrontpageFilterAcc"
import KmFilterAcc from "../modules/KmFilterAcc ";
import KmFilter from "../modules/KmFilter";
import AgdomTransition from "../modules/AgdomImageTransition";
import CustomVideoButton from "../modules/VideoFunc";
import GsapControls from "../modules/Gsap";
// import MouseOverFunc from "../modules/MouseOverFunc";


document.addEventListener("DOMContentLoaded", function () {
    console.log("#agri-featured-resources", document.getElementById("agri-featured-resources"));

    const modalManager = new ModalManager();
    const homeResourceSearch = new HomeResourceSearch();
    const faqAcc = new FaqAcc();
    const homeFilterAcc = new HomeFilterAcc();
    const mapFunc = new MapFunc();
    const menuFunc = new MobileMenuFunc();
    const kmFilterAcc = new KmFilterAcc();
    const knFilter  = new KmFilter();
    const agdomImageTransition = new AgdomTransition();
    const customVideoButton = new CustomVideoButton();
    const gsapControls = new GsapControls();
    // const mousehover = new MouseOverFunc();

    gsapControls.heroSlider();
    gsapControls.heroSection();
    gsapControls.commonHeroAnimation();
    gsapControls.commonTwoColumn();
    gsapControls.boxedThreeColumn();

    document.getElementById("contactus-header-button").addEventListener("click", function() {
        document.getElementById("footer").scrollIntoView({ behavior: "smooth" });
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
                section.scrollIntoView({ behavior: "smooth" });
            });
        }
    });

    // Scroll event to highlight the active button
    window.addEventListener("scroll", () => {
        let currentSection = null;

        sections.forEach((section) => {
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
    const overview = document.getElementById("material-overview")
    const content = document.getElementById("material-content")
    const testimonials = document.getElementById("material-testimonials")
    const authorsDropdown = document.getElementById("author-dropdown")
    
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
        console.log("on load")
        const accElement = document.getElementById("answer-0");
        const accContainer = document.getElementById("answer-container-0");
        const accGroup = document.getElementById("faq-group-0");

        const homeaccElement = document.getElementById("home-side-filter-content-0");
        const homeaccContainer = document.getElementById("home-side-filter-container-0");

        const kmAccElement = document.getElementById("km-side-filter-content-0");
        const kmAccContainer = document.getElementById("km-side-filter-container-0");

        const searchByTitle = document.getElementById("km-search-by-title");

        const agdomKeypoint = document.getElementById('agdom-keypoints');

        const cadreVideo = document.getElementById("cadrein-action-video")

        //initial setup for accordion in FAQ in homepage
        if(accElement) {    
            const height = accElement.offsetHeight;
            
            accGroup.classList.add("active-faq");
            accContainer.style.height = height+"px";
        }

        if(homeaccContainer) {    
            const height = homeaccElement.offsetHeight;
            
            homeaccContainer.style.height = height+"px";
            homeaccContainer.style.margin = "10px 0";
        }

        if(kmAccContainer) {    
            const height = kmAccElement.offsetHeight;
            
            kmAccContainer.style.height = height+"px";
            kmAccContainer.style.margin = "10px 0";
        }

        if(agdomKeypoint) {
            agdomImageTransition.handleTrasition();
        }

        if(cadreVideo) {
            customVideoButton.handleCustomVideoButton();
        }

        if(document.getElementById("swiper-wrapper")) {
            const swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                cardsEffect: {
                    perSlideOffset: 10,
                    perSlideRotate: 7,
                    rotate: true,
                  },
              });
        }

        if(searchByTitle) {
           knFilter.handleKmSearchby();
        }

    }

    window.handleFaqAccordion = function(elementId, containerId, headId, index) {
        faqAcc.handleFaqAcc(elementId, containerId, headId, index);
    }

    window.handleHomeAccordion = function(elementId, containerId, headId, index) {
        homeFilterAcc.handleHomeFilterAcc(elementId, containerId, headId, index)
    }

    window.handleKmFilterAccordion = function(elementId, groupId, index) {
        kmFilterAcc.handleKmFilterAcc(elementId, groupId, index)
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
            autoplaySpeed: 10000,
            dots: true,
            arrows: false,
        });
    });

    jQuery(document).ready(function($) {
        $('#agri-featured-resources').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
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
        $('#home-featured-resources').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
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
        $('.featured-publications').each(function() {
            $(this).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: false,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 1024, // screens smaller than 1024px
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480, // screens smaller than 480px
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    });
});






