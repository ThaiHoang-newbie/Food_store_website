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
    <link rel="stylesheet" href="user.css">
</head>
<body>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="user.php" target="__blank">Profile</a>
        <a class="nav-link" href="securityuser.php" target="__blank">Security</a>
    </nav>
    <br>
    <div class="row">
        <?php 
            include('connectdb.php');
                $sql = "SELECT * FROM User where user_id = 1 ;";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-12">
            <!-- Profile picture card-->
            <div class="card mb-12 mb-xl-0">
                <div class="card-header">User Information</div>
               
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="https://haycafe.vn/wp-content/uploads/2022/02/Hi%CC%80nh-avatar-trang-ne%CC%80n-den.jpg" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"><?php echo $row['username']?></div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"><?php echo $row['email']?></div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"><?php echo $row['phone_number']?></div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"><?php echo $row['address']?></div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button" onclick="editProfile()">Edit Profile</button>
                </div>
            </div>
        </div>
        <?php }}?>
    </div>

   <hr class="mt-0 mb-4">
   <script>
    
   </script>
   <!-- <div class="row">
        <div class="col-xl-4">
            
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
               
                <div class="card-body text-center">
                 
                    <img class="img-account-profile rounded-circle mb-2" src="https://haycafe.vn/wp-content/uploads/2022/02/Hi%CC%80nh-avatar-trang-ne%CC%80n-den.jpg" alt="">
                   
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                  
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
        
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                      
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username">
                        </div>
                      
                        <div class="row gx-3 mb-3">
                            Form Group (first name)
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                            </div>
                            Form Group (last name)
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                            </div>
                        </div> 
                     
                        <div class="row gx-3 mb-3">
                           
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                            </div>
                           
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                            </div>
                        </div>
                   
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                        </div>
                       
                        <div class="row gx-3 mb-3">
                          
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                            </div>
                          
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                            </div>
                        </div>
                
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div> 
    </div> -->
</div>
</body>

</html>