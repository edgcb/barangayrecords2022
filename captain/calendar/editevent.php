<?php
// session_start();


// if (isset($_SESSION['usertype'])) {
//     if ($_SESSION['usertype'] == 'Captain') {
//     }
// } else {
//     header("location: ../../index.php");
// }

// require_once("../../dbconnection.php");

include('../../dbconnection.php');

if (isset($_POST["id"])) {
    $output = '';
    $id = $_POST["id"];
    $query = "SELECT * FROM calendar WHERE id = '" . $_POST["id"] . "'";
    $result = mysqli_query($conn, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
           <form action="updateevent.php?id=echo $id" method="POST" autocomplete="off">
           <div class="row">
               <div class="col-md-6 mb-4" style="width:1000px">
                   <div class="form-outline">
                       <label class="form-label" for="event_name">Event Name</label>
                       <input type="text" name="event_name" value="' . $row["event_name"] . '" id="event_name" class="form-control form-control-lg" />

                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-md-6 mb-4" style="width:1000px">
                   <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                       <label for="start_date" name="start_date" class="form-label"> Start Date (click the calendar button on the right) </label>
                       <input type="datetime-local" name="start_date" value="' . $row["start_date"] . '" class="form-control form-control-lg" id="start_date" />
                       <label for="start_date" name="start_date" id="current_start_date" class="form-label"> Current Start Date: <b>' . $row["start_date"] . '</b> </label>
                   </div>

               </div>
           </div>

   </div>
   <div class="modal-footer">
      
   </div>
</div>
</form>';
    }
    $output .= "</table></div>";
    echo $output;
}
