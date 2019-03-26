<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="cssfile.css">
  </HEAD>
  <BODY>
    <ul>
      <li><a href="home.php">HOME</a></li>
        <li><a href="add_user.php" class="active">ADD USER</a></li>
      <li><a href="rendertable.php" >VIEW All USERS</a></li>
    </ul>

      <h4>ADD USER</h4>
      <form action="#" method="post">
        <br>Enter username<input name="uname">
        <br>Enter email<input name="email">
        <br>Enter age<input type="number" name="age">
        <br><input type="submit" name="add" value="add user">
      </form>
      <?php
      if(isset($_POST['add']) && isset($_POST['uname']) && isset($_POST['age']) && isset($_POST['email'])){
        include "conn.php";
        $adduserquery="insert into user(name,age,email) values('".$_POST['uname']."',".$_POST['age'].",'".$_POST['email']."')";
        if(!mysqli_query($conn,$adduserquery)){
          echo "error in entered values";
        }
        else{
          echo "<script>alert('User added!!  500 credits have been added');window.location='rendertable.php'; </script>";
        }
      }
      ?>
  </BODY>
</HTML>
