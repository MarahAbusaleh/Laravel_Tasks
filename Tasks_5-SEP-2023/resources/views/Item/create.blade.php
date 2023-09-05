<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexashop - Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/SClogo.png" />
    <link rel="stylesheet" href="{{ asset('../assets/css/styles.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

        <!----------------------------------------------- Sidebar ----------------------------------------------->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index.html" class="logo">
                            <img src="{{ asset('assets/images/logo.png') }}">
                        </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                        <a class="sidebar-link" href="./index.html" aria-expanded="false">
                            <span>
                            <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                        </li>
                        <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">PAGES</span>
                        </li>
                        <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('Category.categorytable') }}" aria-expanded="false">
                            <span>
                            <i class="ti ti-category"></i>
                            </span>
                            
                            <span class="hide-menu">Categories</span>
                        </a>
                        </li>
                        <li class="sidebar-item">
                        <a class="sidebar-link" href="./products.html" aria-expanded="false">
                            <span>
                            <i class="ti ti-shopping-cart"></i>
                            </span>
                            <span class="hide-menu">Items</span>
                        </a>
                        </li>           
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--///////////////////////////////////////// END Of Sidebar /////////////////////////////////////////-->
            
        <div class="body-wrapper">
            <!--------------------------------------------- Header --------------------------------------------->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-danger rounded-circle"></div>
                        </a>
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('../assets/images/profile/MyProfailPicture.jpeg') }}" alt="" width="35" height="35" class="rounded-circle">
                            </a>
                        </li>
                    </ul>
                </div>
                </nav>
            </header>
            <!--/////////////////////////////////////// END Of Header ///////////////////////////////////////-->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <!------------------------------------- Add Item Section ------------------------------------->
                    <div class="col-lg-10">
                        <h3>Add Item</h3>
                        <br>
                        <br>
                        <form action="{{ route('Item.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name :</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price :</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="myDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Category Name
                                </button>
                                <div class="dropdown-menu" aria-labelledby="myDropdownButton" id="myDropdownMenu">
                                    @foreach ($categories as $category)
                                        <a class="dropdown-item" href="#" onclick="selectCategory('{{ $category->name }}')">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                            <!-- Display selected category here -->
                            <input id="selectedCategory" type="text" class="form-control" id="category_name" name="category_name" value="">
                            {{-- <div ></div> --}}
                            <br>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image :</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    
                    <!--/////////////////////////////// END Of Add Item Section ///////////////////////////////-->
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function selectCategory(categoryName) {
        // Get the selected category name and display it
        document.getElementById('selectedCategory').value = categoryName;
    }
// Manually initialize the dropdown
document.addEventListener('DOMContentLoaded', function () {
    var myDropdownButton = document.getElementById('myDropdownButton');
    var myDropdownMenu = document.getElementById('myDropdownMenu');

    myDropdownButton.addEventListener('click', function () {
        if (myDropdownMenu.style.display === 'block') {
            myDropdownMenu.style.display = 'none';
        } else {
            myDropdownMenu.style.display = 'block';
        }
    });
});


</script>
