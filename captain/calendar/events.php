<?php
// API from:
// FullCalendar
// FullCalendar LLC
// URL: https://fullcalendar.io/
// -----------------------------
// Bootstrap
// JQuery
// JQueryUI
// MomentJS

// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../../index.php");
}

require_once("logo.php");
include('../../dbconnection.php');
// $query = $conn->query("select * from calendar order by id");

if (isset($_POST['search'])) {
    $searchphrase = $_POST['search'];
    $query = "SELECT * from calendar WHERE event_name like '%$searchphrase%' OR start_date like '%$searchphrase%'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * from calendar";
    $result = mysqli_query($conn, $query);
    $searchphrase = "";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Events - Calendar - Barangay Records Management</title>

    <link rel="stylesheet" a href="../../bootstrap-5.1.1-dist/css/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" a href="calendar.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

</head>
<!DOCTYPE html>
<div class="card">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <br>
                <h2 class="heading-section mt-3">Barangay Calendar Events</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-md-center">
                    <div class="col justify-content-md-start mr-5">
                        <form action="" method="POST" class="d-grid gap-2 d-md-flex justify-content-start mt-0 m-0 mb-0">
                            <input type="text" name="search" value="<?php echo $searchphrase; ?>" placeholder="Search" class="form-control" style="width: 200px;">
                            <button class="btn btn-primary my-2 my-sm-0 inline" name="submit" class="" id="search" type="submit"> Search </button>
                        </form>
                    </div>
                    <div class="col mr-5">
                    </div>
                    <div class="col mr-5">
                    </div>
                    <div class="col mr-5">
                    </div>
                    <div class="col mr-5">
                    </div>
                    <div class="col justify-content-lg-end mb-4">
                        <a class="btn btn-danger me-md-2" href="calendar.php" type="button">Back</a>
                    </div>
                </div>

                <div class="table-wrap">

                    <table class="table">

                        <thead class="thead-primary">

                            <tr>
                                <th>Event Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $Eventname = $row['event_name'];
                            $Startdate = $row['start_date'];
                            $Enddate = $row['end_date'];
                            $space = " ";
                            $comma = ",";
                        ?>

                            <tbody>

                                <tr>
                                    <td>
                                        <?php
                                        echo $Eventname;
                                        ?>
                                    </td>

                                    <td class="col-2">
                                        <?php
                                        echo $Startdate;
                                        ?>
                                    </td>

                                    <td class="col-2">
                                        <?php
                                        echo $Enddate;
                                        ?>
                                    </td>

                                    <td class="col-3">
                                        <div class="span2">
                                            <a class="btn btn-primary text-light" href="editevent.php?editevent=<?php echo $id ?>" role="button"> <i class="fas fa-edit"></i> Edit</a>


                                            <a class="btn btn-danger text-light" onclick="deleteconfirm()" role="button"> <i class="fas fa-times"></i> Delete</a>
                                            <script>
                                                function deleteconfirm() {
                                                    // var result;
                                                    var del = confirm("Are you sure you want to DELETE this CALENDAR EVENT on the record? This action cannot be UNDONE!");
                                                    if (del == true) {
                                                        window.location = "calendar_event_delete.php?deleteevent=<?php echo $id ?>"
                                                    } else {
                                                        return false;

                                                    }
                                                }
                                            </script>
                                        </div>
                                    <?php
                                }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>


    <script src="../template/useraccounts/js/jquery.min.js"></script>
    <script src="../template/useraccounts/js/popper.js"></script>
    <script src="../template/useraccounts/js/bootstrap.min.js"></script>
    <script src="../template/useraccounts/js/main.js"></script>

    </body>

</html>
<?php
?>


<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->

<!-- 
<body>
    <br>

    <h3 class="text-center">Calendar Events</h3>
    <div class="container">
        <div class="btn-toolbar justify-content-between mt-5 mb-2" role="toolbar">
            <div class="btn-group" role="group">
                <form action="" method="POST" class="d-grid gap-2 d-md-flex justify-content-start mt-0 m-0 mb-0">
                    <input type="text" name="search" value="<?php echo $searchphrase; ?>" placeholder="Search" class="form-control" style="width: 200px;">
                    <button class="btn btn-primary my-2 my-sm-0 inline" name="submit" class="" id="search" type="submit"> Search </button>
                </form>
            </div>
            <a class="text-end btn btn-danger" href="calendar.php" role="button"> Back </a>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <table class="table table-primary table-bordered table-striped table-hover">

            </div>
        </div>
        <br>
        <tr>
            <td>
                <b>
                    Event Name
                </b>
            </td>
            <td class="col-2">
                <b>
                    Start Date
                </b>
            </td>

            <td class="col-2">
                <b>
                    End Date
                    <b>
            </td>

            <td class="col-2">
                <b>
                    Actions
                    <b>
            </td>


            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $Eventname = $row['event_name'];
                $Startdate = $row['start_date'];
                $Enddate = $row['end_date'];
                $space = " ";
                $comma = ",";
            ?>
        <tr>
            <td>
                <?php
                echo $Eventname;
                ?>
            </td>

            <td>
                <?php
                echo $Startdate;
                ?>
            </td>

            <td>
                <?php
                echo $Enddate;
                ?>
            </td>
            <td>
                <?php ?>

                <a href="editevent.php?editevent=<?php echo $id ?>">
                    <span class="oi oi-pencil"></span><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                    Edit
                </a>
                <br>
                <a href="calendar_event_delete.php?deleteevent=<?php echo $id ?>">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                    </svg>
                    <font color="#8B0000">
                        Delete
                    </font>
                </a>
                <br>
            </td>


        </tr>
    <?php
            }
    ?>

    </table>
    </div>
    </div>
    </div>
    </div>



</body> -->