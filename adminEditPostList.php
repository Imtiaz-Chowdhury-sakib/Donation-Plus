<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../tab.ico">

    <!-- Import BootStrap    -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">

    <!-- Import BootStrap JS   -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Import    -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@200;400&family=Lobster&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&display=swap" rel="stylesheet">

    <!-- Connect stylesheets  -->
    <link href="../stylesheets/header.css" rel="stylesheet">
    <link href="../stylesheets/footer.css" rel="stylesheet">
    <link href="../stylesheets/scrollbar.css" rel="stylesheet">
    <link href="../stylesheets/sidebarAdminDashboard.css" rel="stylesheet">

</head>

<body>

<div class="sidenav">
    <div>
        <div>
            <a class="mb-3" style="align-items: center; user-select: none">
                <img alt="donationIco"
                     height="30"
                     src="https://img.icons8.com/external-outline-juicy-fish/60/ffffff/external-donate-humanitarian-outline-outline-juicy-fish-4.png"
                     width="30">
                <h2 class="brand-text" style="color: white"> DonationPlus </h2>
            </a>
        </div>

        <a href="./adminDashboard.php"> Dashboard </a>

        <div>
            <button class="dropdown-toggle dropdown-btn" data-toggle="dropdown" id="post-details"
                    style="align-items: center;"
                    type="button">
                Post Details
            </button>

            <div aria-labelledby="post-details" class="dropdown-menu"
                 style="background: rgba(131,131,131,0.18); backdrop-filter: blur(5px); border-radius: 20px">
                <a class="dropdown-item" href="./adminViewPost.php">View Post</a>
                <a class="dropdown-item" href="adminEditPostList.php">Edit Post</a>
                <a class="dropdown-item" href="adminDeletePostForm.php">Remove Post</a>
            </div>
        </div>


        <div>
            <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle dropdown-btn"
                    data-toggle="dropdown"
                    id="user-details" style="align-items: center" type="button">
                User Details
            </button>
            <div aria-labelledby="user-details" class="dropdown-menu"
                 style="background: rgba(131,131,131,0.18); backdrop-filter: blur(5px); border-radius: 20px">
                <a class="dropdown-item" href="adminUserViewForm.php">View User</a>
                <a class="dropdown-item" href="adminUserRemoveForm.php">Remove User</a>
            </div>
        </div>

        <a href="#"> User Message </a>
        <a href="#"> Pending Post </a>
        <a href="#"> Transaction History </a>

    </div>


    <div style="padding: 0 0 1rem 0">
        <div class="btn-group dropup">
            <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle dropdown-btn"
                    data-toggle="dropdown"
                    id="user-account" style="align-items: center" type="button">
                <img alt="avatarIco" height="24" src="./res/header-login-avatar.svg" width="24">
                <?php if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
                    echo $_SESSION['name'];
                } ?>
            </button>
            <div aria-labelledby="user-account" class="dropdown-menu"
                 style="background: rgba(131,131,131,0.18); backdrop-filter: blur(5px); border-radius: 20px">
                <a class="dropdown-item" href="./adminEditProfileForm.php">Edit Profile</a>
                <a class="dropdown-item" href="./logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<div style="display:flex; flex-direction: column; margin-left: 270px; padding: 30px; font-family: 'Kumbh Sans', sans-serif">
    <h1 class="mb-3" style="text-align: center;color: #777676">Edit Post</h1>

    <!-- Table-->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class=".col-lg-12">
                    <h1 class="page-header">Post Details</h1>
                </div>
            </div>

            <div class="row">
                <div class=".col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Records of available post
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <?php

                                    include("dbConnection/dbconn.php");


                                    $qry = "SELECT user.name,post.category,post.p_id,post.title,post.details,post.date,post.asking_amount,post.collecting_amount
                                                     FROM post INNER JOIN user ON (post.user_id = user.id) WHERE status = 1 ";
                                    $result = mysqli_query($conn, $qry);


                                    echo "
						            <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Asking Amount</th>
                                        
                                        <th><img src='res/admin-post-view-edit-icon.svg' alt ='edit_icon'
                                        height='24' width='24'></th>
                                  
                                    </tr>
                                    </thead>";

                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tbody>
                                <tr>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['category'] . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['details'] . "</td>
                                    <td>" . $row['date'] . "</td>
                                    <td>" . $row['asking_amount'] . "</td>
                                    
                                    <td><a href='adminUpdatePostForm.php?p_id=" . $row['p_id'] . "'><img src='./res/adminEditPosticon.svg' alt='' height='22'></a></td>

                                </tr>
                                </tbody>";
                                    }

                                    ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

