

// // $id = $_GET['editevent'];
// // $query = "SELECT * from calendar where id = '" . $id . "'";
// // $result = mysqli_query($conn, $query);

// // while ($row = mysqli_fetch_assoc($result)) {
// //     $Eventname = $row['event_name'];
// //     $Startdate = $row['start_date'];
// //     $Enddate = $row['end_date'];
// }


?>

<!-- <!DOCTYPE html>

<head> -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" a href="bootstrap-5.1.1-dist/css/bootstrap.css" /> -->

    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" /> -->
    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> -->
    <!-- MDBootstrap -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" /> -->

    <!-- MDBootstrap -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script> -->

    <!-- <link rel="stylesheet" href="editevent.css"> -->


    <!-- <title>
        Update Event - Barangay Records Management
    </title>

</head>


<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration mb-5" style="border-radius: 10px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit <i><?php echo $Eventname ?>'s</i> Data</h3>
                        <form action="updateevent.php?id=<?php echo $id ?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-6 mb-4" style="width:1000px">
                                    <div class="form-outline">
                                        <input type="text" name="event_name" value="<?php echo $Eventname ?>" id="event_name" class="form-control form-control-lg" />
                                        <label class="form-label" for="event_name">Event Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4" style="width:1000px">
                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="start_date" name="start_date" class="form-label"> Start Date (click the calendar button on the right) </label>
                                        <input type="datetime-local" name="start_date" value="<?php echo $Startdate ?>" class="form-control form-control-lg" id="start_date" />
                                        <label for="start_date" name="start_date" id="current_start_date" class="form-label"> Current Start Date: <b><?php echo $Startdate ?></b> </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4" style="width:1000px">
                                    <div id="cont" class="md-form md-outline input-with-post-icon datepicker">
                                        <label for="end_date" name="end_date" class="form-label"> End Date (click the calendar button on the right) </label>
                                        <input type="datetime-local" name="end_date" value="<?php echo $Enddate ?>" class="form-control form-control-lg" id="end_date" />
                                        <label for="end_date" name="end_date" id="current_end_date" class="form-label"> Current End Date: <b><?php echo $Enddate ?></b> </label>
                                    </div>

                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                    new mdb.Input(formOutline).update();
                                });
                            </script>
                    </div>





 -->
                    <!-- </div>
                                    </div>
                                </div> -->

                    <!-- <div class="mt-4 pt-2">

                        <button class="btn btn-primary pr-5 btn-lg" name="updateevent" value="Submit" class="" style="width: 120px;"> Update </button>
                        <a class="btn btn-danger pl-5  btn-lg" style="width: 100px;" href="events.php" role="button">Back</a>
                    </div>
                    </form> -->
                    <!-- </div> -->
                    <!-- </div>
                </div>
            </div> -->
                    <!-- </div>
        </section> -->
</body>

</html>
<?php
// }
?>






<!-- <body>

    <div class="card-body">
        <div class="row justify-content-center mt-auto">
            <div class="col-6" style="width: 400px;">
                <br>
                <br>
                <form action="updateevent.php?id=<?php echo $id ?>" method="POST">
                    <label> Event Name </label>
                    <input type="text" name="event_name" placeholder="Event Name" class="form-control s-3" value="<?php echo $Eventname ?>">
                    <label> Start Date </label>
                    <input type="datetime-local" name="start_date" placeholder="Start Date" class="form-control s-3" value="<?php echo $Startdate ?>">
                    <label> End Date </label>
                    <input type="datetime-local" name="end_date" placeholder="End Date" class="form-control s-3" value="<?php echo $Enddate ?>">
                    <div class="w-100"></div>

            </div>
        </div>
    </div>

    <br>
    <div class="btn-toolbar row justify-content-center">
        <button class="btn btn-primary pr-5" name="updateevent" class="" style="width: 100px;"> Update </button>
        <div class="w-25"></div>
        <a class="btn btn-danger pl-5" style="width: 100px;" href="events.php" role="button">Back</a>
        </form>
    </div>
    </div>
    <br>
</body>

</html> -->