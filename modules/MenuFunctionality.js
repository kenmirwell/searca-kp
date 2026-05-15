class MobileMenuFunc {
    constructor() {

    }
    
    toggleMenu() {
        const menuContainer = document.getElementById("mobile-menu-container");
        const body = document.body;

        if(menuContainer.classList.contains("active-mobile-menu")) {
            // Closing - restore scroll
            body.style.overflow = "";
            body.style.position = "";
            body.style.width = "";
            
            menuContainer.classList.remove("active-mobile-menu");
            menuContainer.classList.add("inactive-mobile-menu");
        } else {
            // Opening - lock scroll
            body.style.overflow = "hidden";
            body.style.position = "fixed";
            body.style.width = "100%";

            menuContainer.classList.remove("inactive-mobile-menu");
            menuContainer.classList.add("active-mobile-menu");
        }
    }
    
}

export default MobileMenuFunc;
