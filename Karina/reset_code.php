<?php
$servername='localhost';
$username='root';
$password='';
$dbname='imconcept';
//$conn = instance de l'objet mysqli
$conn=new mysqli(
    $servername,$username,$password,$dbname);
if($conn->connect_error){

    echo("echec de connection");
}
else{

  //  echo("connection a été établi avec sucees");
}

  $reset = $_POST['reset'];
  $pwd =$_POST['pwd'];
  $cpwd =$_POST['cpwd'];
 
  $result=$conn->query("SELECT COUNT(*) FROM visiteurs WHERE reset='$reset'");
  $row = $result->fetch_row();
  $reset_count = $row[0];
  if ($reset_count > 0)
  {
  if($pwd == $cpwd)
  {
    $t1="update client set password='$pwd' where reset='$reset'";
    if($conn ->query($t1) ===true)
    {
    $t2="update client set reset='0' where reset='$reset'";
    $conn ->query($t2);
         echo '<script>
    alert("Your password updated successfully");
       window.location.href = "login.php";
      </script>';
     
    }
    else
    {
        echo '<script>
alert("Error while updating password");
window.location.href = "login.php";
</script>';
     
    }
  }
  else
  {
        echo '<script>
alert("Password and Confirm Password do not match");
window.location.href = "pwdchange.php";
</script>';
   
  }
  }
  else
  {
      echo '<script>
alert("Reset code do not match");
window.location.href = "restpwd.php";
</script>';
}
     

?>