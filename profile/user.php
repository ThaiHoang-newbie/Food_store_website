<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
</head>
<body>
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" onclick="window.location = '../profile/user.php'" target="__blank">Profile</a>
    </nav>
    <br>
    <div class="row">
        <?php 
            include('../check_out/connectdb.php');
                $sql = "SELECT * FROM User where user_id = 1 ;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-12">
            <div class="card mb-12 mb-xl-0">
                <div class="card-header">User Information</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="https://haycafe.vn/wp-content/uploads/2022/02/Hi%CC%80nh-avatar-trang-ne%CC%80n-den.jpg" alt="">
                    Name: <div class="small font-italic text-muted mb-4"><?php echo $row['username']?></div>
                    Email: <div class="small font-italic text-muted mb-4"><?php echo $row['email']?></div>
                    Phone Numbe: <div class="small font-italic text-muted mb-4"><?php echo $row['phone_number']?></div>
                    Address: <div class="small font-italic text-muted mb-4"><?php echo $row['address']?></div>
                    <button class="btn btn-primary" type="button" onclick="editProfile()">Edit Profile</button>
                </div>
            </div>
        </div>
        <?php }}?>
    </div>
   <hr class="mt-0 mb-4">
</div>
</body>
</html>