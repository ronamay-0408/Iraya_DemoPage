document.addEventListener("DOMContentLoaded", function () {
    const editModeBtn = document.getElementById("editModeBtn");
    const productItems = document.querySelectorAll(".product-item");
    const editModalEl = document.getElementById("editProductModal");
    const editModal = new bootstrap.Modal(editModalEl);
    const closeModalBtns = editModalEl.querySelectorAll(".btn-close, .close-modal");

    editModeBtn.addEventListener("click", function () {
        productItems.forEach(item => {
            item.classList.toggle("edit-mode");
            item.querySelector(".edit-btn").style.display = item.classList.contains("edit-mode") ? "block" : "none";
        });
    });

    productItems.forEach(item => {
        const editBtn = item.querySelector(".edit-btn");
        editBtn.addEventListener("click", function () {
            const productId = item.dataset.id;
            const productDescription = item.dataset.description;
            const productImage = item.dataset.image;
            const productLink = item.dataset.link;

            // Set form action dynamically
            document.getElementById("editProductForm").action = `/products/${productId}`;

            // Set existing values
            document.getElementById("editPreviewImage").src = productImage;
            quillEdit.root.innerHTML = productDescription;
            document.getElementById("editProductLink").value = productLink;

            // Show modal
            editModal.show();
        });
    });

    // Close modal properly and remove the backdrop
    closeModalBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            editModal.hide();
            removeBackdrop();
        });
    });

    // Hide modal when clicking outside of it
    editModalEl.addEventListener("hidden.bs.modal", function () {
        removeBackdrop();
    });

    // Function to remove modal backdrop manually
    function removeBackdrop() {
        let backdrop = document.querySelector(".modal-backdrop");
        if (backdrop) {
            backdrop.remove();
        }
        document.body.classList.remove("modal-open");
        document.body.style.overflow = "auto"; // Ensure scrolling is enabled
    }
});

// Quill Editor for Edit Modal
var quillEdit = new Quill("#editEditor", {
    theme: "snow",
    modules: {
        toolbar: [
            [{ font: [] }, { size: [] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }, { background: [] }],
            [{ align: [] }],
            ["clean"]
        ]
    }
});

// Save content to textarea before submitting
document.getElementById("editProductForm").onsubmit = function () {
    document.getElementById("editProductDescription").value = quillEdit.root.innerHTML;
};