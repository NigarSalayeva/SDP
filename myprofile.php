<?php 
 if(isset($_SESSION["user_token"])) {
    $user_control = $db->query("SELECT * FROM user WHERE  `user_token`='$session_user_token'"); 
    while ($row = $user_control->fetch(PDO::FETCH_ASSOC)) {
        $user_name=$row["user_name"];
        $user_email=$row["user_email"];

echo'<form action="" method="POST" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 row">
<label class="block text-sm col-md-3">
  <span class="text-gray-700 dark:text-gray-400 ">Name</span>
  <input value="'.$user_name.'" name="user_name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Name">
</label>


<label class="block text-sm col-md-3">
  <span class="text-gray-700 dark:text-gray-400 ">Email</span>
  <input value="'.$user_email.'" name="user_email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Email">
</label>

<label class="block text-sm col-md-3">
  <span class="text-gray-700 dark:text-gray-400">Password</span>
  <input name="user_password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Password">
</label>

<label class="block text-sm col-md-3">
<button type="submit" name="up_profile"
  class=" block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
  Update
</button>
</label>

</form>';
    }
}


if(isset($_POST["up_profile"])){
    $user_name= strip_tags($_POST["user_name"]);
    $user_email= strip_tags($_POST["user_email"]);
    $user_password= md5(md5(strip_tags($_POST["user_password"])));
  if($email_control = $db->query("SELECT user_email FROM user WHERE user_email='$user_email' AND  `user_token`!='$session_user_token'")->fetchColumn()){
    header("Location:logout.php");
  }else{ 
    if(empty($_POST["user_password"])){
    $db->exec( "UPDATE user SET user_name='$user_name', user_email='$user_email' WHERE  `user_token`='$session_user_token'");
    header("Location:index.php?go=myprofile");
    }else{
    $db->exec( "UPDATE user SET user_name='$user_name',user_email='$user_email', user_password='$user_password' WHERE  `user_token`='$session_user_token' ");
    header("Location:index.php?go=myprofile");

    }

  }
}
?>

