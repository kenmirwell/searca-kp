class MapModal {
    constructor() {
        // don’t fetch elements yet
    }

    getModalElements() {
        this.modal = document.getElementById("mapModal");
        this.closeBtn = document.getElementById("closeModal");

        if (this.closeBtn && this.modal) {
            // Close with button
            this.closeBtn.addEventListener("click", () => this.closeMapModal());

            // Close with background click
            this.modal.addEventListener("click", (e) => {
                if (e.target === this.modal) {
                    this.closeMapModal();
                }
            });
        }
    }

    openMapModal() {
        this.getModalElements(); // fetch fresh elements
        if (this.modal) {
            this.modal.classList.remove("hidden");
        }
    }

    closeMapModal() {
        if (this.modal) {
            this.modal.classList.add("hidden");
        }
    }
}

export default MapModal;
