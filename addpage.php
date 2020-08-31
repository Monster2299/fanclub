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
            ?>
            <ul>
              <li>
                <a href="addpage.php?celeb_id=<?php echo $id; ?>">  <h1 id="celeb"><?php echo $name;?></h1></a>
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

          <a href="index.php">home</a>
  </div>
  <button id="socialm" onclick="socialm()">Add social media</button>
  <script>
  function socialm(){
        var x = document.getElementById("url");
        if (x.style.display === "none") 
          {
            x.style.display = "block";
          } else 
            {
              x.style.display = "none";
            }
      }
  </script>
  <?php
     if(isset($_GET['celeb_id'])){
        $celeb_id = $_GET['celeb_id'];
        $query = "SELECT * FROM celebs WHERE id = $celeb_id";
        $celeb_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($celeb_query)){
            $name = $row['celebname'];
            $lastname = $row['clastname'];
           
        
  ?>
 <div class="url" id="url">
    <form action="" method="post">
      <p>Enter the social media name of <?php echo $name; ?></p>
      <input type="text"name="sname" required>
      <p>enter profile url</p>
      <input type="text"name="url" required>
      <input type="submit" name="submit1">
      <?php
      if(isset($_POST['submit1'])){
         $sname = $_POST['sname'];
         $url = $_POST['url'];
         $dname = strtolower("$name");
         $query = "INSERT INTO `$dname` (`id`, `sname`, `urls`) VALUES (NULL, '$sname', '$url');";
        $query_check = mysqli_query($connection,$query);
        if(!$query_check){
            echo "failed";
            
        }
        }
      ?>
        
    </form>
  </div>
  <div class="heading">
  <h2><?php echo "$name $lastname"; ?></h2>
  </div>
  <?php
  $dtname = strtolower($name);
  $query = "SELECT * FROM $dtname";
  $select = mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($select)){
    $sname = $row['sname'];
    $urls = $row['urls'];
    ?>

 <?php 
 echo "<ul>";
   echo "<li><p><a href='$urls' target='blank'><button id='sname'>$sname</button></a></p></li>";
 echo "</ul>";
 ?>
 
    
    <?php
  }
  ?> <iframe src="demo_iframe.html" name="iframe_a" height="900px" width="100%" title="iframe example" frameborder="0"></iframe>
  <?php } 
    } ?>
   




  
</body>
</html>




