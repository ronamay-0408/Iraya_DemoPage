function previewSelectedImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('previewImage');
            const uploadIcon = document.getElementById('uploadIcon');

            previewImage.src = e.target.result;
            previewImage.style.display = "block"; // Show image
            uploadIcon.style.display = "none"; // Hide icon
        };
        reader.readAsDataURL(file);
    }
}