<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Mohammed Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title>Login</title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/x-icon" />

    <!--- Icons css --->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css"') }}" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('assets/css-rtl/sidemenu.css') }}">

    <!--- Custom Scroll bar --->
    <link href="{{ asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!--- Style css --->
    <link href="{{ asset('assets/css-rtl/style.css') }}" rel="stylesheet">

    <!--- Skinmodes css --->
    <link href="{{ asset('assets/css-rtl/skin-modes.css') }}" rel="stylesheet">

    <!--- Darktheme css --->
    <link href="{{ asset('assets/css-rtl/style-dark.css') }}" rel="stylesheet">

    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

</head>

<body class="pageSignup">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col">
                    <div class="card signup w-50 m-auto">
                        <div class="card-body" id="cartprogramme">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center"><a href="index.html"><img
                                                src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40"
                                                alt="logo"></a></div>
                                </div>
                                <div class="col">
                                    <div class="login align-items-center">
                                        <!-- Demo content-->
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label>البريد الإلكتروني</label> <input class="form-control"
                                                            placeholder="" type="text" id="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>كلمة السر</label> <input class="form-control"
                                                            placeholder="" type="password" id="password">

                                                        <div class="row">

                                                            <div class="col-8">

                                                                <div class="icheck-primary">

                                                                    <input type="checkbox" id="remember">

                                                                    <label for="remember">

                                                                        تذكرني

                                                                    </label>

                                                                </div>

                                                            </div>
                                                        </div><button onclick="login()" class="btn btn-dark-gradient btn-block" type="button">تسجيل دخول
                                                        </button>

                                                </form>

                                            </div>


                                        </div><!-- End -->
                                    </div>
                                </div><!-- End -->


                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- End Page -->

    <!--- JQuery min js --->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!--- Bootstrap Bundle js --->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--- Ionicons js --->
    <script src="{{ asset('assets/plugins/ionicons/ionicons.js') }}"></script>

    <!--- JQuery sparkline js --->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>


    <!--- Moment js --->
    <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

    <!--- Eva-icons js --->
    <script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

    <!--- Rating js --->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

    <!--- Custom js --->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('crudjs/crud.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function login() {

            var guard = '{{ request('guard') }}';

            axios.post('/dashboard/' + guard + '/login', {

                    email: document.getElementById('email').value,

                    password: document.getElementById('password').value,

                    remember_me: document.getElementById('remember').checked,

                    guard: guard

                })

                .then(function(response) {

                    window.location.href = '/dashboard/' + guard
                })

                .catch(function(error) {

                    if (error.response.data.errors !== undefined) {

                        showErrorMessages(error.response.data.errors);

                    } else {

                        showMessage(error.response.data);

                    }

                });

        }
    </script>
</body>

</html>
