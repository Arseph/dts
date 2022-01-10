
<?php 
session_start();

require_once('connection_db/connection.php');
    
$firstname = $lastname = $username = $password = $usertype ='';

    if (isset($_POST['username'])) 
    {
        $firstname = $_POST['firstname']; 
        $lastname = $_POST['lastname'];
        $usertype = $_POST['usertype'];  
        $username = $_POST['username'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        $email = $_POST['email'];


    }
if(!isset($_SESSION['attempt']))
  {
      $_SESSION['attempt'] = 0;
  }

$sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password' AND usertype = 'Department Head'";

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
            $department = $row["department"];
            $email = $row["email"];

            session_start();
            $_SESSION['id'] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            $_SESSION["usertype"] = $usertype;
            $_SESSION["department"] = $department;
            $_SESSION["email"] = $email;

    }
        #$_SESSION['success'] = 'Logged in successfull!';
        header("Location: navbar.php");
        unset($_SESSION['attempt']);

}
?>