<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta content="900;url=logout.php" http-equiv="refresh"/>
    <title>DonationPlus | User Panel</title>
    <link href="../tab.ico" rel="icon">

    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <link href="../stylesheets/header.css" rel="stylesheet">
    <link href="../stylesheets/navbar.css" rel="stylesheet">

    <link href="../stylesheets/footer.css" rel="stylesheet">
    <link href="../stylesheets/dropdownItems.css" rel="stylesheet">
    <link href="../stylesheets/scrollbar.css" rel="stylesheet">


    <!-- Font Import    -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@200;400&family=Lobster&display=swap"
          rel="stylesheet">

    <!-- Import JS   -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>

        body {
            font-family: 'Kumbh Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;

        }

        .container-body {
            padding: 0 120px 0 120px;
            margin-top: 90px;
        }

        .container-body-donate-title {
            color: #777676;
            font-size: xx-large;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a {
            color: #777676;
        }

        .page-number {
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #777676;
            font-weight: bold;
            padding: 10px;
        }

        .results {
            display: grid;
            padding: 0 0 3rem 0;
            gap: 2rem;
            grid: auto / auto auto auto;
        }

        .custom-card {
            width: 18rem;
            border-radius: 10px
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top" id="navbar" style="position: absolute; margin-top: 55px; width: 100%">
    <div class="mr-auto p2">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../userPanel.php">
                    <div style="display: flex; align-items: center; gap: 5px">
                        <img alt="home" height="24" src="../res/navbar-home-button.svg" style="align-content: center"
                             width="24">
                        Home
                    </div>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                   style="display: flex; align-items: center; gap: 5px">
                    <img alt="home" height="24" src="../res/navbar-dropdown-menu-button.svg"
                         style="align-content: center" width="24">
                    Category
                </a>
                <div aria-labelledby="navbarDropdown" class="dropdown-menu">
                    <a class="dropdown-item" href="../category/medical_userpanel.php">
                        <div class="dropdown-icon-text">
                            <img alt="home" height="18" src="../res/navbar-dropdown-menu-medical-button.svg"
                                 style="align-content: center"
                                 width="18">
                            Medical
                        </div>
                    </a>
                    <a class="dropdown-item" href="../category/education_userpanel.php">
                        <div class="dropdown-icon-text">
                            <img alt="educationIco" height="18" src="../res/navbar-dropdown-menu-school-button.svg"
                                 width="18">
                            Education
                        </div>
                    </a>
                    <a class="dropdown-item" href="../category/animal_userpanel.php">
                        <div class="dropdown-icon-text">
                            <img alt="educationIco" height="18" src="../res/animal.svg"
                                 width="18">
                            Animal
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="../category/others_userpanel.php">
                        <div class="dropdown-icon-text">
                            <img alt="miscIco" height="18" src="../res/navbar-dropdown-menu-misc-button.svg" width="18">
                            Others
                        </div>
                    </a>
                    <a class="dropdown-item" href="../category/others_userpanel.php">
                        <div class="dropdown-icon-text">
                            <img alt="miscIco" height="18" src="../res/navbar-dropdown-menu-misc-button.svg" width="18">
                            Others 2
                        </div>
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../loggedInContact.php">
                    <img alt="home" height="24" src="../res/navbar-contact-button.svg"
                         style="align-content: center; gap: 5px"
                         width="24">
                    Contact
                </a>
            </li>
        </ul>
    </div>

    <div class="ml-auto p2">
        <form class="form-inline my-2 my-lg-0" method="get" action="../loggedInSearch.php">
            <input aria-label="Search" class="form-control" name="search" placeholder="Search By Title" type="search">
            <button class="btn btn btn-secondary" type="submit">
                <img alt="search" height="20" src="../res/navbar-search-button.svg" width="20">
            </button>
        </form>
    </div>
</nav>

<header class="d-flex sticky-top">
    <div class="p-2">
        <a href="../userPanel.php">
            <img alt="img"
                 height="30"
                 src="https://img.icons8.com/external-outline-juicy-fish/60/26e07f/external-donate-humanitarian-outline-outline-juicy-fish-4.png"
                 width="30">
            <h2 class="brand-text"> DonationPlus</h2>
        </a>
    </div>

    <div class="ml-auto p2 header-buttons">
        <button aria-expanded="false" aria-haspopup="true" class="btn dropdown-toggle btn-outline-success"
                data-toggle="dropdown"
                id="dropdownMenuButton" style="display: flex; align-items: center; gap: 5px"
                type="button">
            <img alt="avatarIco" height="24" src="../res/header-login-avatar.svg" width="24">
            <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])) {
                echo $_SESSION['name'];
            } ?>
        </button>

        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
            <a class="dropdown-item" href="../userEditProfileForm.php">
                <div style="display: flex; align-items: center; gap: 5px">
                    <img alt="navdrop" height="20" src="../res/user-navbar-dropdown-edit-button.svg" width="20">
                    Edit Profile
                </div>
            </a>

            <a class="dropdown-item" href="../viewProfile.php">
                <div style="display: flex; align-items: center; gap: 5px">

                    <img alt="navdrop" height="20" src="./res/header-login-avatar.svg" width="20">
                    View Profile
                </div>
            </a>


            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../logout.php" id="logout" name="logout">
                Log Out
            </a>
        </div>
    </div>
</header>

<div class="container container-body" >
        <div style="display: flex; flex-direction: row; gap: 22px">
            <img src="./res/header-login-avatar.svg" style="height: 150px; width: 150px; margin-left: 300px; margin-top: 30px">

            <div style="display: flex; flex-direction: column; justify-content: center;">
                <div style="display:flex;flex-direction: row; gap: 20px; justify-content: center">
                    <h3 style="text-decoration: none">John wick</h3>
                    <img src="./res/icons8-warranty-48.png" style="height: 30px; width: 30px;">
                </div>
                <h6>Donor for 4 month</h6>
            </div>


        </div>

    <div style="margin-top: 40px; display: flex; flex-direction: column; margin-left: 330px; margin-right: 230px; gap: 10px; margin-bottom: 100px">
        <div>
            
        </div>
        <div class="btn-background " style="margin-right: 50px">

            <button class="btn btn-outline-success btn-lg" style="width: 100%" type="submit"
                    name="donate">
                   Donation History
            </button>

        </div>
        <div class="btn-background " style="margin-right: 50px">

            <button class="btn btn-outline-success btn-lg" style="width: 100%" type="submit"
                    name="donate">
                Previous Post
            </button>

        </div>


    </div>



</div>



<footer class="mt-auto">
    <div class="footer-content">
        <div class="footer-copyright">
            <p> &copy; Copyright 2022 DonationPlus</p>
        </div>
        <div class="footer-below-copyright">
            <div class="mr-auto" style="display: flex; gap: 10px; flex-direction: column">
                <a href="../index.php">
                    <img alt="ico"
                         height="30"
                         src="https://img.icons8.com/external-outline-juicy-fish/60/26e07f/external-donate-humanitarian-outline-outline-juicy-fish-4.png"
                         width="30">
                    <h2 class="brand-text"> DonationPlus</h2>
                </a>
                <li style="margin-left: 20px">English</li>
            </div>

            <div style="display: flex; gap: 5px; flex-direction: column">
                <p style="color: mediumseagreen; font-weight: 600">Learn More</p>
                <a class="link" href="#">How DonationPlus works</a>
                <a class="link" href="#">Common questions</a>
                <a class="link" href="#">Success stories</a>
                <a class="link" href="#">Supported countries</a>
                <a class="link" href="#">Pricing</a>
            </div>
        </div>

        <div class="divider"></div>

        <div class="footer-below-copyright">
            <div class="mr-auto">
                <p style="font-weight: 200; color: #777676; margin-top: 16px"> &copy; 2018-2022 DonationPlus</p>
            </div>

            <div style="display: flex; gap: 20px; flex-direction: row">
                <a href="#">
                    <svg class="bi bi-facebook" fill="#0075ff" height="16" viewBox="0 0 16 16" width="16"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                </a>

                <a href="#">
                    <svg class="bi bi-youtube" fill="#ff0100" height="16" viewBox="0 0 16 16" width="16"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                    </svg>
                </a>

                <a href="#">
                    <svg class="bi bi-twitter" fill="#0075ff" height="16" viewBox="0 0 16 16" width="16"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </a>

                <a href="#">
                    <svg class="bi bi-instagram" fill="#000000" height="16" viewBox="0 0 16 16"
                         width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                </a>

                <a href="#">
                    <svg class="bi bi-medium" fill="#000000" height="16" viewBox="0 0 16 16" width="16"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.025 8c0 2.485-2.02 4.5-4.513 4.5A4.506 4.506 0 0 1 0 8c0-2.486 2.02-4.5 4.512-4.5A4.506 4.506 0 0 1 9.025 8zm4.95 0c0 2.34-1.01 4.236-2.256 4.236-1.246 0-2.256-1.897-2.256-4.236 0-2.34 1.01-4.236 2.256-4.236 1.246 0 2.256 1.897 2.256 4.236zM16 8c0 2.096-.355 3.795-.794 3.795-.438 0-.793-1.7-.793-3.795 0-2.096.355-3.795.794-3.795.438 0 .793 1.699.793 3.795z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>