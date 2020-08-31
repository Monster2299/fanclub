<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <style>
     <?php
      include ('style.php')
      ?>
   </style>
    <title>The Telonter</title>
</head>
<body>
<div class="navbar">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
       <?php
         $connection = mysqli_connect('localhost','root','','database');
         if(!$connection)
           {
               echo "not connected";
           }
           $query = "SELECT * FROM celebs";
           $select_details = mysqli_query($connection,$query);
           while($row = mysqli_fetch_assoc($select_details))
           {
             $id = $row['id'];
             $name = $row['celebname'];
             $lastname = $row['clastname'];
            ?>
            <ul>
              <li>
          <a href="addpage.php?celeb_id=<?php echo $id; ?>">  <h1 id="celeb"><?php echo"$name $lastname";?></h1></a>
            
              </li> 
            </ul>
<?php } ?>
 
</div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

      <script>
        function openNav() 
          {
            document.getElementById("mySidenav").style.width = "250px";
          }

        function closeNav()
         {
          document.getElementById("mySidenav").style.width = "0";
          }
      </script>

  </div>

    <button id="addc" onclick="addfun()">Add celebrity profile</button>
 <div class="addform" id="addform">
     <form action="" method="post">
        <p>Please enter the First name of the celebrity</p>
        <input type="text" name="namec" placeholder="Mr.Celeb" required>
        <p>Last name of the Celebrity !</p>
        <input type="text" name="clastname" placeholder="Last name">
        <input type="submit" name="submit" id="submit">
        <?php
      



          if (isset($_POST['submit'])) 
            {
              $name = $_POST['namec'];
              $lastname = $_POST['clastname'];

              $tname = strtolower($name);
              $query1 = "SELECT * FROM celebs WHERE celebname = '$tname' ";
              $res = mysqli_query($connection,$query1);
              if(mysqli_num_rows($res) > 0) { // email checks here
                // output data of each row
                $row = mysqli_fetch_assoc($res);
                if($name==$row['celebname'])
                {
                    echo "<h3>Celebrity name already exists !!! please change it for new entry !</h3></br>";
                }
            }
            else{
              $query = "INSERT INTO `celebs` (`id`, `celebname`, `clastname`) VALUES (NULL, '$name', '$lastname');";
              $insert = mysqli_query($connection,$query);
              if(!$insert)
                {
                  echo "data inserted";
                }
                $name = strtolower("$name");
                $objects_table = 
                "CREATE TABLE IF NOT EXISTS $name (
                    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                    sname varchar(255) NOT NULL,
                    urls text not null,
                    PRIMARY KEY (ID)
                )";
            $create_table = mysqli_query($connection,$objects_table);
            if($create_table){
              echo "yayyy";
            }
            }
           header("Location:index.php");
          }
          ?>
 
       </form>

 <script>
    function addfun()
      {
        var x = document.getElementById("addform");
        if (x.style.display === "none") 
          {
            x.style.display = "block";
          } else 
            {
              x.style.display = "none";
            }
      }
  </script>
 </div>

</body>
</html>




