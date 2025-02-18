class MobileMenuFunc {
    constructor() {

    }
    
    toggleMenu() {
        const menuContainer = document.getElementById("mobile-menu-container");

        if(menuContainer.classList.contains("active-mobile-menu")) {
            menuContainer.classList.remove("active-mobile-menu");
            menuContainer.classList.add("inactive-mobile-menu");
        } else {
            menuContainer.classList.remove("inactive-mobile-menu");
            menuContainer.classList.add("active-mobile-menu");
        }

    }
    
}

export default MobileMenuFunc;
