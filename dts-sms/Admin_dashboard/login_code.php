
<?php 
session_start();

require_once('connection_db/connection.php');
    
$firstname = $lastname = $username = $password = '';

    if (isset($_POST['username'])) 
    {
        $firstname = $_POST['firstname']; 
        $lastname = $_POST['lastname'];  
        $username = $_POST['username'];
        $password = $_POST['password'];   


    }
if(!isset($_SESSION['attempt']))
  {
      $_SESSION['attempt'] = 0;
  }

$sql = "SELECT * FROM admin_account WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql); 

if(mysqli_num_rows($result) > 0) 
{   
    while ($row = mysqli_fetch_assoc($result))
    {
            $id = $row["id"];
            $username = $row["username"];

            session_start();
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $usertype = $row["usertype"];

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["usertype"] = $usertype;

    }
        $_SESSION['success'] = 'Logged in successfully';
        header("Location: navbar.php");
        unset($_SESSION['attempt']);
        $_SESSION['success1'] = 'Welcome '.$_SESSION['usertype'];
}
   else{
         $_SESSION['error'] = 'Invalid username and/or password';
         header("Location: index.php");
        //this is where we put our 3 attempt limit
        $_SESSION['attempt'] += 1;
        //set the time to allow login if third attempt is reach
        if($_SESSION['attempt'] == 3){
          $_SESSION['attempt_again'] = time() + (40);
           $_SESSION['error'] = 'Please wait 40 seconds before attempting to login again.';
          //note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
        }
    }
?>