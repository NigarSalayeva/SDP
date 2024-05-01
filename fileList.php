<script type="text/javascript">
   function confirmationDelete(anchor)
{
   var conf = confirm('Silməyə əminsinizmi?');
   if(conf)
      window.location=anchor.attr("href");
}</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<div class="container px-6 mx-auto grid">
            <?php
    if(isset($_GET["view_file"])){
      $GelenFile=$_GET["view_file"];
      echo $CourseName = $db->query("SELECT course_name FROM course WHERE course_token='$GelenFile'")->fetchColumn();
    
            ?>
        
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">File name</th>
                      <th class="px-4 py-3">File Type</th>
                      <th class="px-4 py-3">Date</th>
                      <th class="px-4 py-3">Status</th>
                      <!-- <th class="px-4 py-3">Date</th>
                      <th class="px-4 py-3">Edit/Delete</th> -->
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <?php

$sql_query_file = $db->query("SELECT * FROM `file` WHERE file_course='$GelenFile' AND file_user='$session_user_token'");
while ($row = $sql_query_file->fetch(PDO::FETCH_ASSOC)) {
    $file_id=$row["file_id"];
    $file_name=$row["file_name"];
    $file_type=$row["file_type"];
    $file_date=$row["file_date"];
    $file_course=$row["file_course"];
    $file_course=$row["file_course"];
       echo'
        <td class="px-4 py-3 text-sm">'.$file_name.'</td>
        <td class="px-4 py-3 text-sm">'.$file_type.'</td>
        <td class="px-4 py-3 text-sm">'.$file_date.'</td>
        <td class="px-4 py-3 text-sm d-flex">';?>
     <a  onclick="return confirm('Are you sure?')" href="index.php?go=fileList&view_file=<?php echo $file_course; ?>&delete_file=<?php echo  $file_id; ?>"  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" >
      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
      <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
      </svg>
      </a></td>
        </tr>
<?php
}
?>
              

           

    
                  </tbody>
                </table>
              </div>
          
            </div>

          <?php 

          ?>



<?php 
// Delete
if(isset($_GET["delete_file"])){   

    $delete_file = $_GET["delete_file"];
     $CourseName = $db->query("SELECT file_name FROM `file` WHERE file_id='$delete_file'")->fetchColumn();

    if(unlink($CourseName) AND
    $del = $db->exec("DELETE FROM `file` where file_id='$delete_file'")){
        header("Location:index.php?go=fileList&view_file=$file_course");
    }
    }  
    }
?>