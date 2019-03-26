
        <?php
          include "conn.php";
          $query="select name,email,credits from user";
          $result=mysqli_query($conn,$query);
          $my_array=array();
          while($row = mysqli_fetch_assoc($result))
              {
                  $my_array[] = $row;
              }
               print json_encode($my_array);


                  ?>
