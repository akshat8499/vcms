<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="cssfile.css">
      <title>Page 1</title>
  </HEAD>
  <BODY>
    <ul>
      <li><a href="home.php">HOME</a></li>
      <li><a href="allusers.php">VIEW All USERS</a></li>
    </ul>
<h2>Enter the amount</h2>

    <form action="#" method="post">
      <input type="number" name="amount">
      <input type="submit" value="transfer" name="sub">
    </form>
    <?php
      if(isset($_POST['sub'])){
        $amt=$_POST['amount'];
        if($amt<=0){
          echo "cannot process";
        }
        else{
          session_start();
          include "conn.php";
          $getfromquery="select credits from user where email='".$_SESSION['fromuser']."'";
          $result=mysqli_query($conn,$getfromquery);
          $fromusercredits=mysqli_fetch_assoc($result)["credits"];
          if($amt>$fromusercredits || $fromusercredits<10){
            echo "<script>alert('not enough balance');window.location='rendertable.php';</script>";
          }
          else{
            $fromupdatequery="update user set credits=credits-$amt where email='".$_SESSION['fromuser']."'";
            $fromupdate=mysqli_query($conn,$fromupdatequery);
            $toupdatequery="update user set credits=credits+$amt where email='".$_SESSION['touser']."'";
            $toupdate=mysqli_query($conn,$toupdatequery);
            echo "<script>alert('TRANSACTION SUCCESS');window.location='rendertable.php';</script>";
            $addtransactionquery="insert into transaction(sender,reciever,amt) values('".$_SESSION['fromuser']."','".$_SESSION['touser']."',$amt)";
            mysqli_query($conn,$addtransactionquery);
          }
        }
      }
    ?>

  </BODY>
</html>
