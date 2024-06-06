<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Art Bros</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="/images/logo.png" alt="" srcset="" style="width: 80px;margin-right: 20px;">
                        </a>
                        <a href="#" class="logo">ART BROS</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/client_home">Home</a></li>
                            <li class="scroll-to-section"><a href="/arts">Arts</a></li>
                            <li class="scroll-to-section"><a href="/orders">Orders</a></li>
                            <li class="scroll-to-section"><a href="/payments">Payments</a></li>
                            <li class="scroll-to-section"><a href="/signout">Logout</a></li>
                            <li style="display:flex"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg></a>
                                <p style="color:red" id="count"></p>
                            </li>
                            <li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** ABOUT US ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Orders</h5>
                        <h1 class="display-5 mb-0">Items on Cart</h1>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table border mb-0" id="sortTable">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                    <div style="border: 1px solid black">
                                        @foreach ($carts as $cart)
                                        <form id="update-form-{{$cart->id}}" action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div style="display:flex; width:100%; justify-content:space-between; padding:5px;">
                                                <div style="width:100%">
                                                    <img style="width:50px; height:50px" src="data:image/jpeg;base64,{{ base64_encode($cart->img_data) }}" alt="img">
                                                </div>
                                                <div style="display:flex; justify-content:start; align-items:center; width:100%">
                                                    {{$cart->art_name}}
                                                </div>
                                                <div style="display:flex; justify-content:start; align-items:center; width:100%">
                                                    {{$cart->artist}}
                                                </div>
                                                <div style="display:flex; justify-content:start; align-items:center; width:100%">
                                                    ${{$cart->price}}
                                                </div>
                                                <div style="display:flex; justify-content:space-between; gap:10px; width:50%">
                                                    <div style="display:flex; justify-content:start; align-items:center" id="quantity">
                                                        {{$cart->quantity}}
                                                    </div>
                                                    <div style="display:flex; align-items: center; justify-content: center; gap:10px; font-weight:bolder; font-size:large">
                                                        <div style="display:flex; justify-content:center; align-items:center">
                                                            <button type="button" style="width:35px" id="increase">+</button>
                                                        </div>
                                                        <div style="display:flex; justify-content:center; align-items:center">
                                                            <button type="button" style="width:35px" id="decrease">-</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="margin-left:10px">
                                                    <button style="width: 120px;" type="submit" class="btn btn-danger" onclick="decreaseCount()">Remove Item</button>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach

                                    </div>
                                    <div style=" width:100%; display:flex; justify-content:end; margin-top:10px">
                                        <button style="width: 150px;" type="button" class="btn btn-primary">Checkout</button>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About US End ***** -->



    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2023 Art Bros Company</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
        function clickSignUP() {
            let btn = document.getElementById('signup');
            btn.click();
        }
    </script>
    <div class="modal fade " id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signUpModalLabel">Signup</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="/signup" method="POST" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate onsubmit="return false">
                            @csrf
                            <div class="form-group">
                                <input required class="form-control" type="text" name="firstName" id="fn" placeholder="First Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="text" name="middleName" id="mn" placeholder="Middle Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <input class="form-control" type="text" name="lastName" id="ln" placeholder="Last Name">
                            </div>
                            <br>
                            <div class="form-group">
                                <textarea required class="form-control" name="address" id="" cols="10" rows="3" placeholder="Address"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="birthDate" class="for" style="float:left;margin-bottom: 10px;">Birth
                                    Date</label>
                                <input required type="date" name="birthDate" id="" class="form-control">
                            </div>
                            <br>
                            <div class="form-group">
                                <input required type="number" name="phoneNumber" id="" class="form-control" placeholder="Phone Number">
                            </div>
                            <br>
                            <div class="form-group">
                                <input required class="form-control" type="email" name="email" id="un" placeholder="Email">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label for="validationPassword">Password</label>
                                <input type="password" class="form-control" id="validationPassword" minlength="8" name="password" value required>
                                <div class="progress" style="height: 5px;">
                                    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your password must be 8-20 characters long, must contain special
                                    characters "!@#$%&*_?", numbers, lower and upper letters only.
                                </small>

                                <div id="feedbackin" class="valid-feedback">
                                    Strong Password!
                                </div>
                                <div id="feedbackirn" class="invalid-feedback">
                                    Atlead 8 characters,
                                    Number, special character
                                    Caplital Letter and Small letters
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validationConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="validationConfirmPassword" minlength="8" name="confirmPass" value required>
                                <div class="progress" style="height: 5px;">
                                    <div id="confirmProgressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your password must be 8-20 characters long, must contain special
                                    characters "!@#$%&*_?", numbers, lower and upper letters only.
                                </small>

                                <div id="confirmFeedbackin" class="valid-feedback">
                                    Strong Password!
                                </div>
                                <div id="confirmFeedbackirn" class="invalid-feedback">
                                    Atlead 8 characters,
                                    Number, special character
                                    Caplital Letter and Small letters
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnSignup" value="yes">Signup</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="/login" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <center>
                                <div class="form-group">
                                    <input required class="form-control" type="email" name="email" id="un" placeholder="Email">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input required class="form-control" type="password" name="password" id="pw" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    {{-- <a href="#" style="margin-left: -50px;">Create Account</a> --}}
                                    <a href="#" style="float: right;">Forgot Password?</a>
                                </div>
                            </center>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white !important;">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnLogin" value="yes" style="color:white !important;">Login</button>

                </div>
                </form>
            </div>
        </div>
    </div>


    @if (session()->pull('successLogin'))
    <script>
        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Successfully Login',
                showConfirmButton: false,
                timer: 1200
            });
        }, 500);
    </script>
    {{ session()->forget('successLogin') }}
    @endif

    @if (session()->pull('errorCreate'))
    <script>
        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Failed to create account, please try again later',
                showConfirmButton: false,
                timer: 800
            });
        }, 500);
    </script>
    {{ session()->forget('errorCreate') }}
    @endif

    @if (session()->pull('errorLogin'))
    <script>
        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Wrong Username or Password',
                showConfirmButton: false,
                timer: 800
            });
        }, 500);
    </script>
    {{ session()->forget('errorLogin') }}
    @endif

    @if (session()->pull('emailExist'))
    <script>
        setTimeout(() => {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Email Already Exists, Please Use A New One',
                showConfirmButton: false,
                timer: 800
            });
        }, 500);
    </script>
    {{ session()->forget('emailExist') }}
    @endif

    <script>
        // Retrieve count from localStorage if available, otherwise default to 0
        let count = localStorage.getItem('count') || 0;

        // Update count display
        document.getElementById('count').textContent = count;

        function increment() {
            // Increment count
            count++;
            // Update count display
            document.getElementById('count').textContent = count;
            // Store count in localStorage
            localStorage.setItem('count', count);
        }
    </script>
    <script>
        // Retrieve count from localStorage if available, otherwise default to 0
        let decrease = localStorage.getItem('count') || 0;

        // Update count display
        document.getElementById('count').textContent = count;

        function decreaseCount() {
            // Decrement count
            count--;
            // Update count display
            document.getElementById('count').textContent = count;
            // Store count in localStorage
            localStorage.setItem('count', count);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantityElement = document.getElementById("quantity");
            const increaseButton = document.getElementById("increase");
            const decreaseButton = document.getElementById("decrease");

            increaseButton.addEventListener("click", function() {
                let currentQuantity = parseInt(quantityElement.textContent);
                quantityElement.textContent = currentQuantity + 1;
            });

            decreaseButton.addEventListener("click", function() {
                let currentQuantity = parseInt(quantityElement.textContent);
                if (currentQuantity > 0) {
                    quantityElement.textContent = currentQuantity - 1;
                }
            });
        });
    </script>


    <script src="/passValidation.js"></script>
</body>

</html>