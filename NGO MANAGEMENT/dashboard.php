<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
   $fetch = mysqli_fetch_assoc($select);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="dashboard.css">
</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <p>Age: <?php echo $fetch['age']; ?></p>
      <p>Contact Number: <?php echo $fetch['contact_number']; ?></p>
      <p>Email: <?php echo $fetch['email']; ?></p>
      <p>Address: <?php echo $fetch['address']; ?></p>
      <br>
      <a href="update_profile.php" class="btn">Update Profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>
      <p>New <a href="login.php">Login</a> or <a href="register.php">Register</a></p>
   </div>

   <div class="admin-content">
      <center><h1>Welcome to the Admin Panel</h1></center>
      
      <div class="user-management">
         <h2>User Management</h2>
         <button class="button">View All Users</button>
<button class="button"><a href="adduser.php">Add User</a></button>

         <!-- <a href="adduser.php" class="button">Add User</a>
         <a href="userlist.html" class="button">User Management</a> -->
      </div>

      
      <div class="program-management">
         <h2>Program Management</h2>
         <div class="program-functions">
            <a href="#" id="createProgramBtn">Create Program</a>
            <a href="#" id="updateProgramBtn">Update Program</a>
            <a href="#" id="partnershipsBtn">Coaching Institute Partnerships</a>
            <a href="#" id="sessionSchedulesBtn">Session Schedules</a>
         </div>
      </div>
      
      <div class="volunteer-coordination">
         <h2>Volunteer Coordination</h2>
         <div class="volunteer-functions">
            <a href="#" id="onboardVolunteersBtn">Onboard New Volunteers</a>
            <a href="#" id="assignTasksBtn">Assign Tasks</a>
            <a href="#" id="monitorPerformanceBtn">Monitor Performance</a>
         </div>
      </div>
      
      <div class="documentation-recognition">
         <h2>Documentation and Recognition</h2>
         <div class="documentation-functions">
            <a href="#" id="generateCertificateBtn">Generate Certificate</a>
            <!-- Other documentation functions can be added here -->
         </div>
      </div>
  
    </div>
   
</div>
<script src="dashboard.js"></script>
</body>
</html>
