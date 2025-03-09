class FrontpageFilterAcc {
    constructor() {}

    handleHomeFilterAcc(elementId, index) {
        const accElement = document.getElementById(elementId)

        const height = accElement.offsetHeight < 200 ? accElement.offsetHeight : 200;

        for(let i = 0; i < 4; i++) {
            if(index !== i) {
                document.getElementById(`home-side-filter-container-${i}`).style.height = 0;
                document.getElementById(`home-side-filter-container-${i}`).style.margin = "0";
            } else {
                document.getElementById(`home-side-filter-container-${i}`).style.height = height+"px";
                document.getElementById(`home-side-filter-container-${i}`).style.margin = "10px 0";
            }
        }
    }
}

export default FrontpageFilterAcc;