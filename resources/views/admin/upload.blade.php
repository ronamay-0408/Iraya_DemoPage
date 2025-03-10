<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iraya Energies | Upload Demo</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('Iraya-logo-favicon.png') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Quill Editor CSS & JS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    </head>
    @include('layouts.nav-custom')

    @include('sweetalert::alert')

    <body id="page-top">
        <div class="add-form">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">ADD PRODUCT</button>
            <!-- ADD PRODUCT MODAL -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog custom-modal-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Product Image Upload -->
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <div class="image-upload-container" id="imageUploadContainer">
                                        <i class="bi bi-image" id="uploadIcon"></i> <!-- Bootstrap Icon -->
                                        <img id="previewImage" src="" alt="Uploaded Image">
                                        <input type="file" id="productImage" name="productImage" accept="image/*" required>
                                        <input type="hidden" name="croppedImage" id="croppedImage">
                                    </div>
                                </div>

                                <!-- Description Field -->
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description</label>
                                    <div id="editor" style="height: 150px;"></div>
                                    <textarea name="description" id="productDescription" class="form-control" hidden></textarea>
                                </div>

                                <!-- Product Link Field -->
                                <div class="mb-3">
                                    <label for="productLink" class="form-label">Product Link</label>
                                    <input type="url" name="link" id="productLink" class="form-control" placeholder="Enter product link" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EDIT PRODUCT BUTTON -->
            <button id="editModeBtn">EDIT PRODUCT</button>
            <!-- EDIT PRODUCT MODAL -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog custom-modal-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Product Image Upload -->
                                <div class="mb-3">
                                    <label class="form-label">Upload New Image (Optional)</label>
                                    <div class="image-upload-container">
                                        <i class="bi bi-image" id="editUploadIcon"></i>
                                        <!-- Display existing product image -->
                                        <img id="editPreviewImage" src="" alt="Uploaded Image" style="max-width: 100%; height: auto; display: block;">
                                        <input type="file" id="editProductImage" name="productImage" accept="image/*">
                                        <input type="hidden" name="croppedImage" id="editCroppedImage">
                                    </div>
                                </div>

                                <!-- Description Field -->
                                <div class="mb-3">
                                    <label for="editProductDescription" class="form-label">Edit Description</label>
                                    <div id="editEditor" style="height: 150px;"></div>
                                    <textarea name="description" id="editProductDescription" class="form-control" hidden></textarea>
                                </div>
                                
                                <!-- Product Link Field -->
                                <div class="mb-3">
                                    <label for="editProductLink" class="form-label">Edit Product Link</label>
                                    <input type="url" name="link" id="editProductLink" class="form-control">
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cropper Modal -->
        <div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crop Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-img-container">
                            <img id="cropperImage" src="" alt="Crop Image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="cropImageBtn">Crop & Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="title">
            <h3>Interactive Iraya Energies Products Demos</h3>
            <hr>
        </div>

        <div class="container">
            @foreach ($products->reverse() as $product) 
                <div class="demo product-item" data-id="{{ $product->id }}" data-description="{{ $product->description }}" data-image="{{ asset($product->prod_img) }}" data-link="{{ $product->link }}">
                    <div class="title-img">
                        <img src="{{ asset($product->prod_img) }}" alt="Product Image" class="product-img">
                    </div>
                    <div class="details">
                        <h4>{!! $product->description !!}</h4>
                    </div>
                    <a href="{{ url('/demo?url=' . urlencode($product->link)) }}" class="view-demo">View Demo</a>
                    <button class="edit-btn btn btn-warning" style="display: none;">Edit</button>
                </div>
            @endforeach
        </div>

        <!--PREVIEW IMAGE JS--->
        <script src="{{ asset('js/PreviewImage.js') }}"></script>
        <!-- Add Cropper.js CDN -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
        <!--CROP IMAGE JS--->
        <script src="{{ asset('js/CropperModal.js') }}"></script>
        <!--TEXT EDITOR--->
        <script src="{{ asset('js/DescriptionTextEditor.js') }}"></script>
        
        <!--EDIT JS-->
        <!-- <script src="{{ asset('js/Edit.js') }}"></script> -->
        <script>
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
        </script>
    </body>
</html>
