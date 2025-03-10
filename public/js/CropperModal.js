let cropper;
const cropperModal = new bootstrap.Modal(document.getElementById('cropperModal'));
const cropperImage = document.getElementById('cropperImage');
const cropImageBtn = document.getElementById('cropImageBtn');

const productImage = document.getElementById('productImage'); // ADD Product Image Input
const previewImage = document.getElementById('previewImage'); // ADD Product Preview

const editProductImage = document.getElementById('editProductImage'); // EDIT Product Image Input
const editPreviewImage = document.getElementById('editPreviewImage'); // EDIT Product Preview

let currentImageInput = null; // Track which input triggered the cropper

// Handle File Selection for both ADD & EDIT
function handleFileSelect(event, imageInput, previewImg) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            cropperImage.src = e.target.result;
            cropperModal.show(); // Show modal for cropping

            // Destroy existing cropper instance if exists
            if (cropper) cropper.destroy();

            // Initialize Cropper
            document.getElementById('cropperModal').addEventListener('shown.bs.modal', function () {
                if (cropper) cropper.destroy(); // Destroy existing instance

                // Initialize Cropper with a larger display area
                cropper = new Cropper(cropperImage, {
                    aspectRatio: 400 / 60,
                    viewMode: 2,
                    autoCropArea: 1,
                    zoomable: true,  // Allow zooming
                    scalable: true,  // Allow scaling
                    movable: true    // Allow moving the image
                });
            });

            // Store the current input field (ADD or EDIT)
            currentImageInput = { imageInput, previewImg };
        };
        reader.readAsDataURL(file);
    }
}

// Assign event listeners to both ADD & EDIT image inputs
productImage.addEventListener('change', (event) => handleFileSelect(event, productImage, previewImage));
editProductImage.addEventListener('change', (event) => handleFileSelect(event, editProductImage, editPreviewImage));

// Crop Image & Set Preview for the correct input
cropImageBtn.addEventListener('click', function () {
    const canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 60
    });

    // Convert cropped image to a Blob (file format)
    canvas.toBlob((blob) => {
        // Create a new file-like object
        const file = new File([blob], "cropped-image.png", { type: "image/png" });

        // Create a DataTransfer to replace the original file input
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        currentImageInput.imageInput.files = dataTransfer.files; // Assign cropped image to input field

        // Update the preview dynamically
        currentImageInput.previewImg.src = canvas.toDataURL();
        currentImageInput.previewImg.style.display = "block";

        cropperModal.hide(); // Close the cropper modal
    });
});