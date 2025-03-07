<header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" id="mainNav">
        <div class="container-nav">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('img/admin-system-logo.png') }}" alt=""></a>
            <div class="profile" id="profileDropdown">
                <img src="{{ asset('img/profile.png') }}" alt="Profile">
                <div class="dropdown-menu" id="dropdownMenu">
                    <h4>{{ Auth::user()->name }}</h4>  
                    <hr style="margin: 0;">
                    <a href="{{ route('profile.edit') }}">View Profile</a>
                    <a href="{{ route('logout') }}">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Projects-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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