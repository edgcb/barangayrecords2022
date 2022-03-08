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
    if ($_SESSION['usertype'] == 'Secretary') {
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

                                <tr id="<?php echo $id ?>">
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
                                            <?php echo '<a class="btn btn-danger text-light" onclick="deleteconfirm(\'' . $id . '\')" role="button"> <i class="fas fa-times"></i> Delete</a>' ?>

                                            <!-- <a class="btn btn-danger text-light" onclick="deleteconfirm()" role="button"> <i class="fas fa-times"></i> Delete</a> -->

                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                    ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteconfirm(id) {
            // Delete Function
            var del = confirm("Are you sure you want to DELETE this CALENDAR EVENT on the record? This action cannot be UNDONE!");
            if (del == true) {
                window.location = 'calendar_event_delete.php?deleteevent=' + id;
            } else {
                return false;

            }
        }
    </script>


    <script src="../template/useraccounts/js/jquery.min.js"></script>
    <script src="../template/useraccounts/js/popper.js"></script>
    <script src="../template/useraccounts/js/bootstrap.min.js"></script>
    <script src="../template/useraccounts/js/main.js"></script>

    </body>

</html>