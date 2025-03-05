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
    </head>
    <header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container-nav">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('img/admin-system-logo.png') }}" alt=""></a>
                <div class="profile" id="profileDropdown">
                    <img src="{{ asset('img/profile.png') }}" alt="Profile">
                    <div class="dropdown-menu" id="dropdownMenu">
                        <h4>Sam Houston</h4>
                        <hr style="margin: 0;">
                        <a href="#">Account</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <hr style="margin: 0;">
    </header>
    <body id="page-top">

        <div class="add-form">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                ADD PRODUCT
            </button>
            <!-- ADD PRODUCT MODAL -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="productForm">
                                <!-- Product Image Upload -->
                                <div class="mb-3">
                                    <label for="productImage" class="form-label">Upload Image</label>
                                    <div class="image-upload-container" id="imageUploadContainer">
                                        <i class="bi bi-image" id="uploadIcon"></i> <!-- Bootstrap Icon -->
                                        <img id="previewImage" src="" alt="Uploaded Image">
                                        <input type="file" id="productImage" accept="image/*" required onchange="previewSelectedImage(event)">
                                    </div>
                                </div>

                                <!-- Product Description -->
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" form="productForm">Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <button>EDIT PRODUCT</button>
        </div>

        <div class="title">
            <h3>Interactive Iraya Energies Products Demos</h3>
            <hr>
        </div>
        <div class="container">
            <div class="demo1">
                <div class="title-img">
                    <img src="{{ asset('img/DA-icon logo 1.png') }}" alt="" class="DA-logo1">
                    <img src="{{ asset('img/Data Atelier logo 1.png') }}" alt="" class="DA-logo2">
                </div>
                <div class="details">
                    <h4>Transforming energy data for <span>Sustainability</span>, powered by <span class="blue">Artificial Intelligence</span></h4>
                </div>
                <a href="#">View Demo</a>
            </div>

            <div class="demo2">
                <div class="title-img-elas">
                    <img src="{{ asset('img/elasticdocstm logo 1.png') }}" alt="" class="Elas-logo">
                </div>
                <div class="details">
                    <h4>The <span>AI Solution</span> for <span class="blue">Geoscience, Engineering,<br> and Energy Data</span></h4>
                </div>
                <a href="#">View Demo</a>
            </div>
        </div>
            
        <!-- Projects-->

        <!-- Footer-->
        <!-- <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Iraya Energies Inc.</div></footer> -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script>
            $(document).ready(function(){
                $("#profileDropdown").click(function(event){
                    event.stopPropagation();
                    $("#dropdownMenu").toggle();
                });

                $(document).click(function(){
                    $("#dropdownMenu").hide();
                });
            });
        </script>
        <script>
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
        </script>
    </body>
</html>
