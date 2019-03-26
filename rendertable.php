<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cssfile.css">

    <script>
        mydata=undefined;
         $.get("allusers.php", function(data, status){
            mydata=data;
            console.log(mydata);
            printTable(JSON.parse(mydata))
        });

        function printTable(data){
            html = '<form method="post" action="#"><table border="7"><tr><th>FROM</th><th>TO</th><th>USER NAME</th><th>EMAIL</th><th>CURRENT CREDITS</th></tr>';

            data.forEach(element => {
                    html+="<tr>";
                    html+="<td><input type= 'radio' name='selectfromuser' value ='"+element.email+"'</td>";
                    html+="<td><input type= 'radio' name='selecttouser' value ='"+element.email+"'</td>";
                    html+="<td>"+element.name+"</td>";
                    html+="<td>"+element.email+"</td>";
                    html+="<td>"+element.credits+"</td>";
                    html+="</tr>";
                    //html+="<h1 class="productcontent">iMac pro</h1>";


                })
            html+="</table><input type='submit' value='Next' name='sub'></form>";
            $('#data-table').html(html)
        }


    </script>
</head>

<body>
  <ul>
    <li><a href="home.php">HOME</a></li>
      <li><a href="add_user.php">ADD USER</a></li>
    <li><a href="allusers.php" class="active">VIEW All USERS</a></li>
  </ul>
 <h3>TRANSFER CREDITS</h3>
    <div id="data-table"></div>
    <?php
    if(isset($_POST["sub"]) && isset($_POST["selectfromuser"]) && isset($_POST["selecttouser"])){
    if($_POST["selectfromuser"]==$_POST["selecttouser"]){
        die("INVALID TRANSACTION");
      }
      session_start();
      $_SESSION['fromuser']=$_POST["selectfromuser"];
      $_SESSION['touser']=$_POST["selecttouser"];
      ?>
      <script>
       window.location="transaction.php";
      </script>
      <?php
    }
    else{
      if(isset($_SESSION['fromuser']))
        session_destroy();
    }
     ?>
  </body>

</html>
