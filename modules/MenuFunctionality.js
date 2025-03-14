class MobileMenuFunc {
    constructor() {

    }
    
    toggleMenu() {
        const menuContainer = document.getElementById("mobile-menu-container");
        const body = document.body;

        if(menuContainer.classList.contains("active-mobile-menu")) {
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

export default MobileMenuFunc;
