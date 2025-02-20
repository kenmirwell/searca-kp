class MapFunc {
    constructor() {
        this.onMouseHoverMap();
    }

    onMouseHoverMap() {
        for (let i = 0; i < 12; i++) {
            const elements = document.getElementsByClassName(`country-${i}`);
            const maps = document.getElementsByClassName(`map-${i}`);

            Array.from(elements).forEach((element) => {
                document.getElementById(`country-Philippines`)?.classList.add("active-icon");
                document.getElementById(`map-Philippines`)?.classList.add("active-map");

                //initialize an active country base on index 0
                for (let j = 0; j < 12; j++) {
                    if (j !== 0) {
                        const otherElements = document.getElementsByClassName(`country-${j}`);
                        const otherMaps = document.getElementsByClassName(`map-${j}`);

                        Array.from(otherElements).forEach((otherElement) => {
                            otherElement.classList.remove("active-icon");
                            otherElement.classList.add("inactive-icon");
                        });

                        Array.from(otherMaps).forEach((otherMap) => {
                            otherMap.classList.remove("active-map");
                            otherMap.classList.add("inactive-map");
                        });
                    }
                }

                element.addEventListener("mouseover", () => {
                    element.classList.add("active-icon");
                    element.classList.remove("inactive-icon");

                    Array.from(maps).forEach((map) => {
                        map.classList.add("active-map");
                        map.classList.remove("inactive-map");
                    });

                    for (let j = 0; j < 12; j++) {
                        if (j !== i) {
                            const otherElements = document.getElementsByClassName(`country-${j}`);
                            const otherMaps = document.getElementsByClassName(`map-${j}`);

                            Array.from(otherElements).forEach((otherElement) => {
                                otherElement.classList.remove("active-icon");
                                otherElement.classList.add("inactive-icon");
                            });

                            Array.from(otherMaps).forEach((otherMap) => {
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

export default MapFunc;
