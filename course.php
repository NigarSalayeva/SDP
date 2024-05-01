          <div class="container px-6 mx-auto grid">
            <?php
            
if(isset($_GET["edit_course"])){   
   $GelenCourse=$_GET["edit_course"];

  $UPsql_query_course = $db->query("SELECT * FROM course WHERE course_token='$GelenCourse'");
  while ($UProw = $UPsql_query_course->fetch(PDO::FETCH_ASSOC)) {
    $course_id=$UProw["course_id"];
    $UPcourse_name=$UProw["course_name"];
    $UPcourse_description=$UProw["course_description"];
    $course_imgUP=$UProw["course_img"];
    $course_token=$UProw["course_token"];
    $students_csvUP=$UProw["students_csv"];
    $UPchatBox=$UProw["chatBox"];
    $UPdiscBords=$UProw["discBords"];
echo' <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">'.$course_name.'  Edit course </h2>        
        <form method="POST" action="" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 row"  enctype="multipart/form-data">
              <label class="block text-sm  col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course image</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                ';
                if($course_imgUP){
                  echo'<label class="block text-sm col-md-6" for="course_img" style="cursor:pointer">
                  <img width="100" src="'.$course_imgUP.'"/>
                  <input hidden name="course_img" id="course_img" type="file"   class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image"></label>';
                }else{
                  echo'<input  name="course_img" type="file"   accept=".jpg, .png, .gif" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-image" style="font-size:1.1rem;"></i>
                  </div>';

                }
                  echo'
                </div>
              </label>
              <label class="block text-sm  col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course name</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input value="'.$UPcourse_name.'" name="course_name" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course name">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-bar-chart-steps" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course description</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <textarea name="course_description" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course description">'.$UPcourse_description.'</textarea>
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-blockquote-left" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
         
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Students CSV</span>
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="students_csv" type="file" multiple  accept=".csv" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-filetype-csv" style="font-size:1.1rem;"></i>
                  </div>
                  '.$students_csvUP.'
                </div>
              </label>
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Chat Box</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input  value="'.$UPchatBox.'" type="number" id="chatBox" onchange="ChatBoxValue(this.value)" name="chatBox" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Chat Box">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-percent" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Discussion Board</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input  value="'.$UPdiscBords.'"  type="number" name="discBords"  id="discBords" oninput="DiscBordsValue(this.value)" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Discussion Board">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-percent" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3 mt-4 text-center">
              <button type="submit" name="update_course" style="float:right;" class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                 <i class="bi bi-download w-2 mr-4" viewBox="0 0 20 20" style="font-size:1rem;"></i>
                  <span>Update course</span>
                </button>
                </label>
 </form>
        
        
        
        ';
}}else{
            ?>
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add course </h2>
<form method="POST" action="" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 row"  enctype="multipart/form-data">
              <label class="block text-sm  col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course image</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="course_img" type="file" multiple  accept=".jpg, .png, .gif" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-image" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course name</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="course_name" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course name">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-bar-chart-steps" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm col-md-4">
                <span class="text-gray-700 dark:text-gray-400">Course description</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <textarea name="course_description" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course description"></textarea>
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-blockquote-left" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
         
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Students CSV</span>
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="students_csv" type="file" multiple  accept=".csv" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-filetype-csv" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Chat Box</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input  type="number" id="chatBox" onchange="ChatBoxValue(this.value)" name="chatBox" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Chat Box">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-percent" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Discussion Board</span>
                <!-- focus-within sets the color for the icon when input is focused -->
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input type="number" name="discBords"  id="discBords" oninput="DiscBordsValue(this.value)" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Discussion Board">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-percent" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3 mt-4 text-center">
              <button type="submit" name="add_course" style="float:right;" class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                 <i class="bi bi-download w-2 mr-4" viewBox="0 0 20 20" style="font-size:1rem;"></i>
                  <span>Add course</span>
                </button>
                </label>
 </form>
        
        <?php } ?>

            <div class="row">
            <?php 

if(isset($_POST["search"])){
  $GelenSearch=$_POST["search"];
  $sql_query_course = $db->query("SELECT * FROM course WHERE course_user_token='$session_user_token' AND course_name LIKE '%$GelenSearch%'");
}else{
  $sql_query_course = $db->query("SELECT * FROM course WHERE course_user_token='$session_user_token'");
}


while ($row = $sql_query_course->fetch(PDO::FETCH_ASSOC)) {
  $course_id=$row["course_id"];
  $course_name=$row["course_name"];
  $course_description=$row["course_description"];
  $course_img=$row["course_img"];
  $course_token=$row["course_token"];
  $students_csv=$row["students_csv"];
  $chatBox=$row["chatBox"];
  $discBords=$row["discBords"];
  
      $CountDiscussion = $db->query("SELECT COUNT(*) FROM file where file_course='$course_token' AND file_user='$session_user_token' AND file_type='DiscussionBoard'")->fetchColumn();
      $CountChatBox    = $db->query("SELECT COUNT(*) FROM file where file_course='$course_token' AND file_user='$session_user_token' AND file_type='ChatBox'")->fetchColumn();


echo'<div class="col-md-4 g-1">
<article>
  <div>
    <img src="'.$course_img.'" alt="">
  </div>
  <h2>'.$course_name.'</h2>
  <p>'.$course_description.'</p>
  <p>DiscussionBoard:'.$CountDiscussion.' Files / '.$discBords.' %</p>
  <p>ChatBox:'.$CountChatBox.' Files / '.$chatBox.' %</p>
<div class="d-flex">
  <a  href="index.php?go=file&view_course='.$course_token.'" class="flex mr-2 items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
  </svg>
</a>
  <a  href="index.php?go=course&edit_course='.$course_token.'" class="flex mr-2 items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
</svg>
</a>';?>
<a  onclick="return confirm('Are you sure?')"  href="index.php?go=course&delete_course=<?php echo $course_token; ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
<svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
<path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
</svg>
</a>
<a href="index.php?go=fileList&view_file=<?php echo $course_token; ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
  <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
</svg>
</a>
</div>
</article>

</div>
<?php }?>
              

           
          </div>


          <?php 
          // ADD  
if(isset($_POST["add_course"])){
        $course_name= strip_tags($_POST["course_name"]);
        $course_description= strip_tags($_POST["course_description"]);
        $course_token=$session_token;
        $course_user_token=$session_user_token;
        $chatBox= strip_tags($_POST["chatBox"]);
        $discBords= strip_tags($_POST["discBords"]);
        
        if($uzanti = substr($_FILES["course_img"]["name"],-4,4)){
            $adi = "course-".uniqid().$uzanti;
            $yol = "images/".$adi;
            move_uploaded_file($_FILES["course_img"]["tmp_name"],$yol);
        }
        if($uzantiCsv = $course_name."-".$_FILES["students_csv"]["name"]){
          move_uploaded_file($_FILES["students_csv"]["tmp_name"],$uzantiCsv);
   
      }

    if($add_course=$db->exec("INSERT INTO course 
        (course_name,
        course_description,
        course_img,
        course_token,
        course_user_token,
        students_csv,
        chatBox,
        discBords
            ) VALUE 
        ('$course_name',
        '$course_description',
        '$yol',
        '$course_token',
        '$course_user_token',
        '$uzantiCsv',
        '$chatBox',
        '$discBords');")){
header("Location:index.php?go=course");
        }
   
}
          ?>
          <?php 
// Update 
if(isset($_POST["update_course"])){
    $GelenCourse=$_GET["edit_course"];
    $course_name= strip_tags($_POST["course_name"]);
    $course_description= strip_tags($_POST["course_description"]);
    $course_token=$session_token;
    $course_user_token=$session_user_token;
    $chatBox= strip_tags($_POST["chatBox"]);
    $discBords= strip_tags($_POST["discBords"]);
 
    if($uzanti = substr($_FILES["course_img"]["name"],-4,4)){
        $adi = "course-".uniqid().$uzanti;
        $yol = "images/".$adi;
        move_uploaded_file($_FILES["course_img"]["tmp_name"],$yol);
      }else{$yol=$course_imgUP;}

    if($_FILES["students_csv"]["name"]){
      $uzantiCsv = $course_name."-".$_FILES["students_csv"]["name"];
      move_uploaded_file($_FILES["students_csv"]["tmp_name"],$uzantiCsv);
  }else{$uzantiCsv=$students_csvUP;}

    if($otp_control = $db->exec( "UPDATE course SET 
    course_name='$course_name',
    course_description='$course_description',
    chatBox='$chatBox',
    discBords='$discBords',
    students_csv='$uzantiCsv',
    course_img='$yol'
    WHERE course_token='$GelenCourse'
 ")){			

header("Location:index.php?go=course");
  }
}
?>

<?php 
// Delete
if(isset($_GET["delete_course"])){   

    $delete_course = $_GET["delete_course"];
    if($del = $db->exec("DELETE FROM course where course_token='$delete_course'")){
        header("Location:index.php?go=course");
    }
    }  
?>

<script>
function ChatBoxValue(ChatBoxVal){document.getElementById("discBords").value=100-ChatBoxVal;}
function DiscBordsValue(DiscBordsVal){document.getElementById("chatBox").value=100-DiscBordsVal;}
</script>