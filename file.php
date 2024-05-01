<script>
        $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
<style>
  .btn-default {
    background-color: #7e3af2 !important;
    color: aliceblue;
    margin: 10px;
  }
  .dataTables_length{
    margin: 10px 25px 0px 35px;
  }
  #example_filter{
    margin: 10px 25px 0px 35px;
  }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<!-- App CSS -->  
<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js" crossorigin="anonymous"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
          <div class="container px-6 mx-auto grid">
            <?php
    if(isset($_GET["view_course"])){
        $GelenCourse=$_GET["view_course"];

    
  $sql_query_course = $db->query("SELECT * FROM course WHERE course_token='$GelenCourse' AND course_user_token='$session_user_token'");
  while ($row = $sql_query_course->fetch(PDO::FETCH_ASSOC)) {
    $course_id=$row["course_id"];
    $course_name=$row["course_name"];
    $course_description=$row["course_description"];
    $course_img=$row["course_img"];
    $course_token=$row["course_token"];
    $course_user_token=$row["course_user_token"];
    $discBords=$row["discBords"];
    $chatBox=$row["chatBox"];
    $students_csv=$row["students_csv"];
  }
            
            ?>
 
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add students </h2>
          <form method="POST" action="" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 row"  enctype="multipart/form-data">
          <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Chat Box TXT</span>
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="ChatBox_csv" type="file" multiple  accept=".txt" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-filetype-txt" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-3">
                <span class="text-gray-700 dark:text-gray-400">Discussion Board TXT</span>
                <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="DiscussionBoard_csv" type="file" multiple  accept=".txt" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Course image">
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <i class="bi bi-filetype-txt" style="font-size:1.1rem;"></i>
                  </div>
                </div>
              </label>
              <label class="block text-sm  col-md-6 mt-4 text-center">
              <button type="submit" name="add_file" style="float:right;" class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                 <i class="bi bi-download w-2 mr-4" viewBox="0 0 20 20" style="font-size:1rem;"></i>
                  <span>Add Files</span>
                </button>
                </label>
</form> 
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">



        Students
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <!-- <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap"> -->
                <div class="table-responsive">
                <!-- <table id="example" class="display nowrap" style="width:100%"> -->
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr  style="text-align:center;"
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Student name</th>
                      <th class="px-4 py-3">Course Name</th>
                      <th class="px-4 py-3">Participation Grade</th>
                      <th class="px-4 py-3">Chat Box</th>
                      <th class="px-4 py-3">Discussion Board</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
<?php
    $CountDiscussion = $db->query("SELECT COUNT(*) FROM `file` where file_course='$GelenCourse' AND file_user='$session_user_token' AND file_type='DiscussionBoard'")->fetchColumn();
    $CountChatBox    = $db->query("SELECT COUNT(*) FROM `file` where file_course='$GelenCourse' AND file_user='$session_user_token' AND file_type='ChatBox'")->fetchColumn();
  
$sql_query_file = $db->query("SELECT file_name,file_type FROM `file` WHERE file_course='$GelenCourse' AND file_user='$session_user_token'");
$file = fopen($students_csv, 'r');
$name = [] ;
$surname = [];
$username = [];

$k = 0 ;

$csvLecture = array();
$csvDiscussion = array();

$listCountChatBox = [] ;
$listCountDiscussion = [] ;

while ($row = $sql_query_file->fetch(PDO::FETCH_ASSOC)) {
  $file_name=$row["file_name"];
  $file_type=$row["file_type"];
  if($file_type == 'ChatBox'){
  
    if(file_exists($file_name)){
        $lecture = fopen($file_name, 'r');
        while (!feof($lecture)) {
            foreach(explode('>',fgets($lecture)) as $value){
                if(strlen(explode('<v',$value)[1]) != 0){$csvLecture[] = explode('<v',$value)[1] ;}
            }
        }
        fclose($lecture);
        $listCountChatBox[] = count($csvLecture);

    }
  }else{
    if(file_exists($file_name)){
        foreach(file($file_name) as $line) {
          $csvDiscussion[] = str_replace('~===','~',str_replace('======','~',preg_replace('/[^\da-z ]/i', '=', preg_replace("/^\s+|\s+$/u", "", $line))));
        }
        $listCountDiscussion[] = count($csvDiscussion);
    }
  }

}

while (($result = fgetcsv($file)) !== false)
{
  $exlodeData = explode(';',$result[0]);
  $name[] = $exlodeData[1];
  $surname[] = $exlodeData[2];
  $username[] = $exlodeData[0];

  $lectureCount = 0;
  $countLooplecture = 0 ;

  $zeroDiscussion = 0 ;
  $oneDiscussion = 0 ;
  $countLoopDiscussion = 0 ;
  
  $resultListCountDiscussionSum = 0 ; 
  $resultListCountChatboxSum = 0 ; 
  

  for ($l = 0; $l <= count($listCountDiscussion) - 1; $l++){
      $resultSum = 0 ; 
      $start = 0 ;
      if($l != 0){
          $start = $listCountDiscussion[$l - 1];
          $start ++ ;
      }
      for ($x = $start; $x <= $listCountDiscussion[$l]; $x++) {
        $nameCurrently = $name[$k].' '.$surname[$k];
        $nameCurrentlyR = $surname[$k].' '.$name[$k];

        $discussionValue = explode('~',$csvDiscussion[$x]);

        if($nameCurrently == $discussionValue[0] or $nameCurrentlyR == $discussionValue[0]){
    
          if(explode(' ',$discussionValue[1])[0] != 'No'){
            $resultSum ++ ;  
            $oneDiscussion ++ ;
          }else{
            $zeroDiscussion ++ ;
          }
        }
      } 
      if($resultSum != 0){
        $resultListCountDiscussionSum = $resultListCountDiscussionSum + 1;
      }
  }



  for ($l = 0; $l <= count($listCountChatBox) - 1; $l++){
      $resultSum = 0 ;
      $start = 0 ;
      if($l != 0){
          $start = $listCountChatBox[$l - 1];
          $start ++ ;
      }

      for ($x = $start; $x <= $listCountChatBox[$l]; $x++) {
         
          $nameCurrently = $name[$k].' '.$surname[$k];
          $nameCurrentlyR = $surname[$k].' '.$name[$k];
    
          if($nameCurrently == preg_replace("/^\s+|\s+$/u", "", $csvLecture[$x]) or $nameCurrentlyR == preg_replace("/^\s+|\s+$/u", "", $csvLecture[$x])){
            $resultSum ++ ; 
            $lectureCount ++ ;
          }
      }
      
      if(0 < $resultSum AND $resultSum < 3){
        $resultListCountChatboxSum =  $resultListCountChatboxSum + 0.5;
      }else if( 2 < $resultSum ){
        $resultListCountChatboxSum = $resultListCountChatboxSum + 1;
      }
  }




      if($k != 0 and $k != 1){
      echo' <tr class="text-gray-700 dark:text-gray-400"  style="text-align:center;">
    <td class="px-4 py-3">
      <div class="flex items-center text-sm">
        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
          <img
            class="object-cover w-full h-full rounded-full"
            src="mortarboard-fill.svg"
            alt=""
            loading="lazy"
          />
          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
        </div>
        <div>
          <p class="font-semibold">'.$username[$k].'</p>
          <p class="text-xs text-gray-600 dark:text-gray-400">
                '.$name[$k].'   '.$surname[$k].'
                </p>
                </div>
            </div>
            </td>
            <td class="px-4 py-3 text-sm">
            '.$course_name.' 
            </td>
       
            <td class="px-4 py-3 text-xs" style="text-align:center;">';
            if($lectureCount>0){$prosentDiscussion=($resultListCountChatboxSum / $CountChatBox) * $chatBox;}else{$prosentDiscussion=0;}
            if($oneDiscussion>0){$prosentChatBox=($discBords / $CountDiscussion) * $oneDiscussion;}else{$prosentChatBox=0;}
             $totalProsent=$prosentDiscussion+$prosentChatBox;
        if($totalProsent<=50){
        echo' <span style="font-size:1rem; background-color:#f8c0c0; color: #c81e1e;" class=" px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">'.$totalProsent.' %</span>';
        }  
      else if($totalProsent>50 AND $totalProsent<=65){
        echo' <span  style="font-size:1rem; background-color:#feecdc; color: #fd591f;" class="px-2 py-1 font-semibold leading-tight  rounded-full dark:text-white dark:bg-orange-700" >'.$totalProsent.' %</span>';
                }  
        else if($totalProsent>65 AND $totalProsent<=80){
          echo' <span  style="font-size:1rem;  background-color:#f0ed85; color: #d69a02;"  class="px-2 py-1 font-semibold leading-tight  bg-orange-100 rounded-full dark:text-orange-100 " >'.$totalProsent.' %</span>';
                  }  
        else if($totalProsent>80 AND $totalProsent<=100){
                    echo' <span  style="font-size:1rem;  background-color:#def7ec; color: #0a6c4e;" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" >'.$totalProsent.' %</span>';
                            }  
              
              echo'  <td  style="font-size:1rem;" class="px-4 py-3 text-sm">
                '.$prosentDiscussion.' % 
                </td>';
                echo'  <td  style="font-size:1rem;" class="px-4 py-3 text-sm">
                '.$prosentChatBox.' %
                </td>';


        }
            $k++;


  
}

fclose($file);

     
?>
              

           

    
                  </tbody>
                </table>
              </div>

            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js"></script>
     
<script>
$(document).ready(function () {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title = "Card View DataTable";
	// DataTable initialisation
	$("#example").DataTable({
		dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			// "colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
		initComplete: function (settings, json) {
			// $(".dt-buttons .btn-group").append(
			// 	'<a id="cv" class="btn btn-primary" href="#">CARD VIEW</a>'
			// );
			$("#cv").on("click", function () {
				if ($("#example").hasClass("card")) {
					$(".colHeader").remove();
				} else {
					var labels = [];
					$("#example thead th").each(function () {
						labels.push($(this).text());
					});
					$("#example tbody tr").each(function () {
						$(this)
							.find("td")
							.each(function (column) {
								$("<span class='colHeader'>" + labels[column] + ":</span>").prependTo(
									$(this)
								);
							});
					});
				}
				$("#example").toggleClass("card");
			});
		}
	});
});

</script>
          <?php 
          // ADD  
if(isset($_POST["add_file"])){
        $DiscussionBoard_csv= strip_tags($_POST["DiscussionBoard_csv"]);
        $ChatBox_csv= strip_tags($_POST["ChatBox_csv"]);

        if($DiscussionBoard_csv = $course_name."-".$_FILES["DiscussionBoard_csv"]["name"]){
          move_uploaded_file($_FILES["DiscussionBoard_csv"]["tmp_name"],$DiscussionBoard_csv);
          $FileNameControlDiscussionBoard = $db->query("SELECT file_id FROM `file` WHERE file_course='$GelenFile' AND file_user='$session_user_token' AND file_name='$DiscussionBoard_csv'")->fetchColumn();
        if(!$FileNameControlDiscussionBoard AND $_FILES["DiscussionBoard_csv"]["name"]){
          $db->exec("INSERT INTO file(file_name,file_type,file_date,file_course,file_user) VALUE ('$DiscussionBoard_csv','DiscussionBoard','$bugunu','$GelenCourse','$session_user_token');");
        }
      
        }

      if($ChatBox_csv =  $course_name."-".$_FILES["ChatBox_csv"]["name"]){
        move_uploaded_file($_FILES["ChatBox_csv"]["tmp_name"],$ChatBox_csv);
        $FileNameControlChatBox = $db->query("SELECT file_id FROM `file` WHERE file_course='$GelenFile' AND file_user='$session_user_token' AND file_name='$DiscussionBoard_csv'")->fetchColumn();
        if(!$FileNameControlChatBox AND $_FILES["ChatBox_csv"]["name"]){
          $db->exec("INSERT INTO file(file_name,file_type,file_date,file_course,file_user) VALUE ('$ChatBox_csv','ChatBox','$bugunu','$GelenCourse','$session_user_token');");
        }
       }
header("Location:index.php?go=file&view_course=$GelenCourse");

}
    }
          ?>

