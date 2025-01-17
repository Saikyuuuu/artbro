<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Art Bros</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="./Dashboard_files/simplebar.css">
    <link rel="stylesheet" href="./Dashboard_files/simplebar(1).css">

    <link href="./Dashboard_files/style.css" rel="stylesheet">

    <link rel="stylesheet" href="./Dashboard_files/prism.css">
    <link href="./Dashboard_files/examples.css" rel="stylesheet">
    <script async="" src="./Dashboard_files/gtm.js.download"></script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
    </script>
    <link href="./Dashboard_files/coreui-chartjs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Sen", sans-serif;
        }
    </style>
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex" style="background-color: white !important;">
            <img class="sidebar-brand-full" src="/images/logo.png" width="118" height="46" alt="ArtBros">
            <img class="sidebar-brand-narrow" src="/images/logo.png" width="46" height="46" alt="ArtBros">

        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right:
              0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <li class="nav-item"><a class="nav-link active" href="/admin_dashboard">
                                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-speedometer2"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                                            <path fill-rule="evenodd"
                                                d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                                        </svg> Dashboard</a>
                                </li>
                                <li class="nav-title">Management</li>
                                <li class="nav-item"><a class="nav-link" href="/admin_users">
                                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path
                                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                        </svg> Users</a></li>
                                <li class="nav-item"><a class="nav-link" href="/admin_artists">
                                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-person-vcard"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                            <path
                                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                        </svg>Artists</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin_projects">
                                        <img src="/projects.svg" class="nav-icon" alt="" srcset="">
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-divider"></li>
                                {{-- SETTINGS START --}}
                                <li class="nav-title">SETTINGS</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <svg class="nav-icon" width="16px" height="16px" viewBox="0 -0.5 21 21"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="#FFFFFF"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-59.000000, -200.000000)" fill="#FFFFFF">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path
                                                            d="M14.55,60 L24,60 L24,51 L14.55,51 L14.55,60 Z M3,60 L12.45,60 L12.45,51 L3,51 L3,60 Z M14.55,49 L24,49 L24,40 L14.55,40 L14.55,49 Z M3,49 L12.45,49 L12.45,40 L3,40 L3,49 Z"
                                                            id="menu_navigation_grid-[#1530]">

                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>Featured Items
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_banner" class="nav-link">
                                        <svg class="nav-icon" width="16px" height="16px" viewBox="0 0 24 24"
                                            id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: #FFFFFF;
                                                        stroke: #020202;
                                                        stroke-miterlimit: 10;
                                                        stroke-width: 1.92px;
                                                    }
                                                </style>
                                            </defs>
                                            <rect class="cls-1" x="2.42" y="4.33" width="19.17" height="15.33" />
                                            <line class="cls-1" x1="0.5" y1="19.67" x2="23.5"
                                                y2="19.67" />
                                            <path class="cls-1"
                                                d="M13.43,15.83h1.93a2.39,2.39,0,0,1,2.39,2.39v1.44a0,0,0,0,1,0,0H11a0,0,0,0,1,0,0V18.22A2.39,2.39,0,0,1,13.43,15.83Z" />
                                        </svg>Banner
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin_payments" class="nav-link">
                                        <svg class="nav-icon" fill="#FFFFFF" width="16" height="16"
                                            viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.961 26.732h-6.739c-0.273 0-0.536-0.12-0.711-0.334s-0.246-0.487-0.197-0.76l4.321-23.505c0.257-1.285 1.313-2.139 2.637-2.139h10.371c4.168 0 6.974 2.664 6.974 6.63 0 3.999-2.757 11.465-9.392 11.465h-4.535l-1.827 7.926c-0.098 0.421-0.47 0.717-0.903 0.717zM4.332 24.889l4.896-0 1.822-7.926c0.098-0.421 0.47-0.717 0.903-0.717h5.273c5.268 0 7.543-6.367 7.543-9.616 0-2.948-1.964-4.781-5.125-4.781h-10.371c-0.257 0-0.711 0.082-0.82 0.64zM13.161 32.005l-6.739 0c-0.274 0-0.531-0.12-0.706-0.328s-0.252-0.487-0.202-0.755l0.864-4.923c0.088-0.503 0.563-0.837 1.067-0.749s0.837 0.569 0.749 1.067l-0.673 3.84h4.896l1.745-8.003c0.093-0.427 0.47-0.728 0.903-0.728h5.273c5.268 0 7.543-6.367 7.543-9.616 0-2.117-0.892-3.577-2.642-4.338-0.465-0.202-0.684-0.749-0.476-1.214 0.202-0.47 0.749-0.684 1.214-0.481 2.418 1.050 3.752 3.195 3.752 6.034 0 3.999-2.757 11.465-9.392 11.465h-4.529l-1.745 8.003c-0.093 0.427-0.47 0.728-0.903 0.728h0zM14.37 12.909h-1.816c-0.274 0-0.531-0.12-0.711-0.334-0.175-0.208-0.252-0.487-0.202-0.755l1.214-6.739c0.077-0.438 0.46-0.76 0.908-0.76h2.937c1.11 0 1.997 0.356 2.56 1.023 0.613 0.728 0.815 1.761 0.596 3.080-0.443 3.134-2.084 4.485-5.486 4.485zM13.659 11.060l0.711-0c2.746 0 3.391-0.985 3.665-2.921 0.088-0.542 0.126-1.236-0.18-1.603-0.257-0.306-0.771-0.366-1.154-0.366h-2.166l-0.875 4.89z">
                                            </path>
                                        </svg>Payments
                                    </a>
                                </li>
                                {{-- SETTINGS END --}}
                                <li class="nav-divider"></li>
                                <li class="nav-title">OTHER</li>
                                <li class="nav-item">
                                    <a href="/signout" class="nav-link">
                                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-box-arrow-left"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>Logout
                                    </a>
                                </li>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 256px; height: 841px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility:
          hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display:
            none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 247px; transform: translate3d(0px, 0px, 0px);
            display: block; "></div>
            </div>
        </ul>
        {{-- <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button> --}}
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector(&#39;#sidebar&#39;)).toggle()">
                    <img src="/menu.svg" class="icon icon-lg" alt="" srcset="">
                </button>
                <a class="header-brand d-md-none" href="">
                    <img class="sidebar-brand-narrow" src="/images/logo.png" width="118" height="46"
                        alt="ArtBros">
                </a>
                <ul class="header-nav d-none d-md-flex">
                </ul>
                <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="">
                            <svg class="icon icon-lg">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                            </svg></a></li>
                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img class="avatar-img" src="/images/admin.png" alt="user@email.com">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                                </svg> Notifications<span class="badge badge-sm bg-danger ms-2">1</span></a>
                            <a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                </svg> Messages<span class="badge badge-sm bg-success ms-2">1</span></a>
                            <a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-comment-square"></use>
                                </svg> Comments<span class="badge badge-sm bg-warning ms-2">1</span></a>
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Settings</div>
                            </div><a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Profile</a><a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Settings</a><a class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Payments<span class="badge badge-sm bg-secondary ms-2">1</span></a><a
                                class="dropdown-item" href="">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                </svg> Projects<span class="badge badge-sm bg-primary ms-2">1</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/signout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <span>Home</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Payments</span></li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-12">
                        @if ($userType == 4)
                            <button class="btn btn-primary" data-coreui-toggle="modal"
                                data-coreui-target="#paymentModal">Add Payment Method/Gateway</button>
                        @endif

                    </div>

                </div>
                <div class="row mt-2">
                    @foreach ($payments as $item)
                        <div class="col-sm-6 col-lg-3">
                            @if ($userType == 4)
                                <a style="text-decoration: none; cursor: pointer;"
                                    data-coreui-target="#paymentInfo{{ $item['paymentID'] }}"
                                    data-coreui-toggle="modal">

                                    <div class="card mb-4 text-white bg-white"
                                        style="height:165px;background-image: url({{ asset($item['imagePath']) }}); background-size: contain; background-repeat: no-repeat; background-position: center top 40px;">

                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start"
                                            style="">
                                            {{-- <div>
                                        <div class="fs-4 fw-semibold">{{ $item['paymentName'] }} </div>
                                        <div class="text-danger">{{ $item['status'] }}</div>

                                    </div> --}}
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a style="text-decoration: none; cursor: pointer;">

                                    <div class="card mb-4 text-white bg-white"
                                        style="height:165px;background-image: url({{ asset($item['imagePath']) }}); background-size: contain; background-repeat: no-repeat; background-position: center top 40px;">

                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start"
                                            style="">
                                            {{-- <div>
                                            <div class="fs-4 fw-semibold">{{ $item['paymentName'] }} </div>
                                            <div class="text-danger">{{ $item['status'] }}</div>

                                        </div> --}}
                                        </div>
                                    </div>
                                </a>
                            @endif

                            <div class="modal fade " id="paymentInfo{{ $item['paymentID'] }}" tabindex="-1"
                                role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="paymentInfoModalLabel{{ $item['paymentID'] }}">View Payment</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <form action="/admin_payments" method="POST"
                                                    enctype="multipart/form-data" autocomplete="off">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="paymentName"><b>Payment Name:</b></label>
                                                        <br>
                                                        <input required type="text" name="paymentName"
                                                            id="" class="form-control"
                                                            value="{{ $item['paymentName'] }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="clientID"><b>Client ID:</b></label>
                                                        <br>
                                                        <input type="text" name="clientID" id=""
                                                            class="form-control" value="{{ $item['clientID'] }}">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="secret"><b>Secret:</b></label>
                                                        <br>
                                                        <input type="text" name="secret" id=""
                                                            class="form-control" value="{{ $item['secret'] }}">
                                                    </div>

                                                    <div class="mb-2">
                                                        <label for="logo"><b>Logo:</b></label>
                                                        <br>
                                                        <input type="file" name="logo" id=""
                                                            class="form-control" accept=".jpeg, .jpg, .png">
                                                    </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                style="color:white !important;"
                                                data-coreui-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="btnAdminAddPayment"
                                                value="yes">Proceed
                                                Updating</button>

                                            <a href="/payment_delete/{{ $item['paymentID'] }}"
                                                class="btn btn-danger text-white">Delete</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="footer">

            <div class="ms-auto">Copyright &copy; {{ date('Y', strtotime(now())) }} Art Bros Company</div>
        </footer>
    </div>

    <script src="./Dashboard_files/coreui.bundle.min.js.download"></script>
    <script src="./Dashboard_files/simplebar.min.js.download"></script>

    <script src="./Dashboard_files/chart.min.js.download"></script>
    <script src="./Dashboard_files/coreui-chartjs.js.download"></script>
    <script src="./Dashboard_files/coreui-utils.js.download"></script>
    <script src="./Dashboard_files/main.js.download"></script>
    <script></script>
    <div class="modal fade " id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Add Payment Method/Gateway</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="/admin_payments" method="POST" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <div class="mb-2">
                                <label for="paymentName"><b>Payment Name:</b></label>
                                <br>
                                <input required type="text" name="paymentName" id=""
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="clientID"><b>Client ID:</b></label>
                                <br>
                                <input type="text" name="clientID" id="" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="secret"><b>Secret:</b></label>
                                <br>
                                <input type="text" name="secret" id="" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label for="logo"><b>Logo:</b></label>
                                <br>
                                <input type="file" name="logo" id="" class="form-control"
                                    accept=".jpeg, .jpg, .png">
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" style="color:white !important;"
                        data-coreui-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnAdminAddPayment" value="yes">Proceed
                        Adding</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @if (session()->pull('paymentAddedError'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed To Add Payment, Please Try Again Later',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('paymentAddedError') }}
    @endif
    @if (session()->pull('paymentAddedSuccess'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Added Payment Method',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('paymentAddedSuccess') }}
    @endif
    @if (session()->pull('successDelete'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Deleted Payment',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('successDelete') }}
    @endif
</body>

</html>
