<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexashop - Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/SClogo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
                    <img src="{{ asset('assets/images/logo.png') }}">
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
                        <a class="sidebar-link" href="{{ route('Item.create') }}" aria-expanded="false">
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
            <!----------------------------------------------- Header ----------------------------------------------->
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
                            <img src="../assets/images/profile/MyProfailPicture.jpeg" alt="" width="35" height="35" class="rounded-circle">
                            
                        </li>
                    </ul>
                </div>
                </nav>
            </header>
            <!--/////////////////////////////////////// END Of Header ///////////////////////////////////////-->

            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <h2>Items</h2>
                    <center><div class="col-lg-2">
                        <a href="{{ route('Item.create') }}" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"><i class="ti ti-plus"></i> Add Item</a>
                    </div></center>
                </div>
                <!--  Row 2 -->
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>   
                                <th scope="col">Action</th>                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row">{{ $item-> id }}</th>
                                    <td>{{ $item-> name }}</td>     
                                    <td>{{ $item-> price }}</td>                            
                                    <td><img src="{{ asset($item->image) }}"  class="categoryimages"></td>
                                    <td>
                                        <br><br><br><br><br>
                                        <a href="{{ route('Item.edit', $item->id) }}"><button type="button" class="btn btn-outline-success m-1"><i class="ti ti-pencil"></i>Edit</button></a>
                                        {{-- becuse delete method don't have a saparet file  --}}
                                        <form action="{{ route('Item.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <div class="main-border-button">
                                                    <a><button type="submit" class="btn btn-outline-danger m-1 "><i class="ti ti-trash"></i>Delete</button></a>
                                                </div>                                                                        
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>