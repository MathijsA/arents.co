<?php
   session_start();
 ?>

 <div id="content">

 <form method="POST">
     <h3>Username:</h3>
     <input name="username"><br>
     <h3>Password:</h3>
     <input name="password" type="password"><br>
   <br>
   <button name="login"> Login </button>
 </form>
 </div>
<?php
include("/site/sql.php");
 if (isset($_POST['login'])) { //check of de user niet al ingelogd is
   $userUsername = $_POST['username'];
   $userPassword = $_POST['password'];

   include("mysql.php");//Maak een nieuwe MySQL connection aan

   $checkPassword = "SELECT type, username, password FROM users WHERE username='" . $userUsername . "';";//het MySQL statement dat de user zoekt
   $result = $conn->query($checkPassword);//voer het statement uit

     if ($result->num_rows > 0) {//check of er 1 of meer resultaten zijn
       while($row = $result->fetch_assoc()) {//vraag alle rows uit de database op
         if(!password_verify(hash("ripemd160", $userPassword), $row['password'])){//check of het wachtwoord correct is
           echo "<script>alert('Login faild, wrong credentails') </script>";//Alert met javascript dat de login gegevens fout zijn.
           header("Location: /login.php");//refresh de webpage
           return;
         }else{

         $_SESSION['user']=$row['username'];//Zet de session tag user naar de username
         $_SESSION['login']=true;//zet de session tag login naar true
         $_SESSION['permission']=$row['type'];//zet de session tag permission naar de permission van de gebruiker

         $redirect= $_GET["redirect"];

         if(isset($_GET["redirect"])){
           header("Location: google.com" . $redirect);//redirect naar de home page
         }else{
           header("Location: bing.com");//redirect naar de home page
         }
         return;
         }
       }
     }else{
       echo "<script> alert('Login faild, user does not exists') </script>";//Alert met javascript dat de user niet bestaat
       header("Location: youtube.com");//refresh de webpage
     }

   $conn->close();//sluit de MySQL verbinding weer
 }
$_SESSION['login'] = $mathijs;
echo $mathijs;
?>
