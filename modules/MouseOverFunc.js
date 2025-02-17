class MouseOverFunc {
    constructor() {
        this.onMouseHover();
    }

    onMouseHover() {
        for (let i = 0; i < 6; i++) {
            const elements = document.getElementsByClassName(`component-${i}`);

            
            Array.from(elements).forEach((elem) => {
                elem.addEventListener("mouseover", () => {
                    elem.classList.add("active-component");
                    elem.classList.remove("inactive-component");

                    for (let j = 0; j < 6; j++) {
                        if (j !== i) {
                            const otherElements = document.getElementsByClassName(`component-${j}`);

                            Array.from(otherElements).forEach((otherElement) => {
                                otherElement.classList.remove("active-component");
                                otherElement.classList.add("inactive-component");
                            });
                        }
                    }
                });
            });
        }
    }
}

export default MouseOverFunc;
