class FrontpageFilterAcc {
    constructor() {}

    handleHomeFilterAcc(elementId, index) {
        const accElement = document.getElementById(elementId)

        const height = accElement.offsetHeight;

        console.log("height", height);

        for(let i = 0; i < 4; i++) {
            if(index !== i) {
                document.getElementById(`home-side-filter-container-${i}`).style.height = 0;
            } else {
                document.getElementById(`home-side-filter-container-${i}`).style.height = height+"px";
            }
        }
    }
}

export default FrontpageFilterAcc;