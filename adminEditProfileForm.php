<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

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
    <link href="./stylesheets/header.css" rel="stylesheet">
    <link href="./stylesheets/footer.css" rel="stylesheet">
    <link href="./stylesheets/scrollbar.css" rel="stylesheet">
    <link href="./stylesheets/sidebarAdminDashboard.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Kumbh Sans', sans-serif;
        }

    </style>

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

        <a href="adminDashboard.php"> Dashboard </a>

        <div>
            <button class="dropdown-toggle dropdown-btn" data-toggle="dropdown" id="post-details"
                    style="align-items: center;"
                    type="button">
                Post Details
            </button>

            <div aria-labelledby="post-details" class="dropdown-menu"
                 style="background: rgba(131,131,131,0.18); backdrop-filter: blur(5px); border-radius: 20px">
                <a class="dropdown-item" href="./adminViewPost.php">View Post</a>
                <a class="dropdown-item" href="./adminEditPostList.php">Edit Post</a>
                <a class="dropdown-item" href="./adminDeletePostForm.php">Remove Post</a>
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

        <a href="adminUserMassegeForm.php"> User Message </a>

        <a href="adminPendingPost.php"> Pending Post </a>

        <a href="transactionHistory.php"> Transaction History </a>

    </div>

    <div style="padding: 0 0 1rem 0">
        <div class="btn-group dropup">
            <button aria-expanded="false" aria-haspopup="true" class="dropdown-toggle dropdown-btn"
                    data-toggle="dropdown"
                    id="user-account" style="align-items: center" type="button">
                <img alt="avatarIco" height="24" src="./res/header-login-avatar.svg" width="24">
                <?php if(isset($_SESSION['name']) && !empty($_SESSION['name'])) {
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

<div style="margin-left: 270px; padding-left: 2rem">
    <h1 style="text-align: center;color: #777676; margin: 3rem 3rem 1rem 3rem">Update Information</h1>
    <h5 style="text-align: center;color: #777676; font-weight: 200; margin-bottom: 3rem">Leave empty to keep previous
        data </h5>
    <div style="margin-left: 1rem; margin-right: 5rem">

        <?php
        include('dbConnection/dbconn.php');
        $qry = "SELECT * FROM admin";
        $result=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($result)){
        ?>

        <form role="form" action="adminEditProfile.php" method="POST" style="margin-right: 10rem; margin-left: 10rem">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="<?php echo $row['name']; ?>" readonly>
                <input type="hidden" name="p_id" value="<?php echo $row['a_id']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Enter New Email</label>
                <input type="text" class="form-control" name="a_email" value="<?php echo $row['a_email']; ?>">
            </div>
            <button type="submit" class="btn btn-success" onclick="myFunction()">Update</button>
            <script>
                function myFunction() {
                    alert("Update Successful");
                }
            </script>
        </form>
    </div>
    <?php } ?>
</div>

</body>
</html>