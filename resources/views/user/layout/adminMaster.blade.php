<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Favicon -->
    <link href="{{asset('user/img/favicon.ico" rel="icon')}}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> --}}

    <!-- Libraries Stylesheet -->
    <link href="{{asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->

    {{-- <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">CODE LAB</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
        </div>
    </div> --}}

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                {{-- CODELAB SHOP --}}
                {{-- <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a> --}}
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('order#list')}}" class="nav-item nav-link active">
                                <i
                    class="fa-solid fa-arrow-left me-1"></i> Back
                            </a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                                </a>
                                {{-- DROPDOWN BUTTON  --}}
                                <div class="dropdown d-inline">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-user "></i> {{Auth::user()->name}}
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item my-2" href="{{ route('user#view')}}"><i class="fa-solid fa-user"></i> Account</a></li>
                                      <li><a class="dropdown-item my-2" href="{{ route('user#changePassword')}}"><i class="fa-solid fa-lock"></i> Change Password</a></li>
                                      <li> <span class="dropdown-item my-2" >
                                        <form action="{{route('logout')}}" method="post" class=" d-block m-auto">
                                            @csrf
                                            <button class="btn bg-dark" type="submit">
                                                <i class="fa-solid fa-right-from-bracket text-white"></i> <span class="text-white ">Log Out</span>
                                            </button>
                                        </form>
                                        </span> </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->


    {{-- <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div> --}}


    <!-- Breadcrumb End -->


   @yield('content')


    <!-- Footer Start -->

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('user/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    {{-- <script src="{{asset('user/mail/jqBootstrapValidation.min.js')}}"></script> --}}
    {{-- <script src="{{asset('user/mail/contact.js')}}"></script> --}}

    <!-- Template Javascript -->
    <script src="{{asset('user/js/main.js')}}"></script>

    {{-- JQUERY CDN LINK --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
@yield('scriptSource')
</html>
