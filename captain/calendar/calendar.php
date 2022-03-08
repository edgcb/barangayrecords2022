<?php
// Template from:
// Table V03
// https://colorlib.com/wp/bootstrap-tables/

// API from:
// FullCalendar
// FullCalendar LLC
// URL: https://fullcalendar.io/
// -----------------------------
// Bootstrap

// JQuery

// JQueryUI

// MomentJS

session_start();

if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] == 'Captain') {
    }
} else {
    header("location: ../../index.php");
}

require_once("logo.php");
include('../../dbconnection.php');
$query = $conn->query("select * from calendar order by id");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Calendar - Barangay Records Management</title>
    <!-- Fullcalendar -->
    <link rel='stylesheet' type='text/css' href='../../api/fullcalendar.css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" a href="../../bootstrap-5.1.1-dist/css/bootstrap.css" />
    <!-- JQuery -->
    <script src="../../api/jquery-3.6.0.min.js"></script>
    <!-- JQueryUI -->
    <script src="../../api/jquery-ui.min.js"></script>
    <!-- MomentJS -->
    <script src="../../api/moment.min.js"></script>
    <!-- Fullcalendar -->
    <script src="../../api/fullcalendar.min.js"></script>



    <link rel="stylesheet" a href="../../bootstrap-5.1.1-dist/css/bootstrap.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <!-- <link rel="stylesheet" a href="calendar.css" /> -->

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>



    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({

                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                events: [<?php while ($row = $query->fetch_object()) { ?> {
                        id: '<?php echo $row->id; ?>',
                        title: '<?php echo $row->event_name; ?>',
                        start: '<?php echo $row->start_date; ?>',
                        end: '<?php echo $row->end_date; ?>',
                    }, <?php } ?>],
                selectable: true,
                selectHelper: true,

                select: function(start, end) {
                    var title = prompt("Enter the name of Event");
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "calendar_add.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event has been added.");
                                location.reload();
                            }
                        })
                    }
                },
                editable: true,
                // eventResize: function(event) {
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                //     var title = event.title;
                //     var id = event.id;
                //     $.ajax({
                //         url: "calendar_edit.php",
                //         type: "POST",
                //         data: {
                //             title: title,
                //             start: start,
                //             end: end,
                //             id: id
                //         },
                //         success: function() {
                //             calendar.fullCalendar('refetchEvents');
                //             alert('Event has been updated.');
                //             location.reload();
                //         }
                //     })
                // },

                eventDrop: function(event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "calendar_edit.php",
                        type: "POST",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            id: id
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event has been updated.");
                            location.reload();
                        }
                    });
                },

                eventClick: function(event) {
                    if (confirm("Do you want to DELETE this event?")) {
                        var id = event.id;
                        $.ajax({
                            url: "calendar_event_delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event has been Deleted.");
                                location.reload();
                            }
                        })
                    }
                },

            });
        });
    </script>
</head>

<body>

    <div class="container">
        <div class="btn-toolbar justify-content-between mt-5 mb-2" role="toolbar">

        </div>

        <div>
            <h1 align="center">Barangay Calendar</h1>
            <h6 align="center">(Tap a Date to Add a new event)</h6>
            <h6 align="center">(Tap an Event to delete)</h6>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-md-center">
                    <div class="col justify-content-md-end mr-5">

                    </div>
                    <div class="col mr-5">
                    </div>
                    <div class="col justify-content-lg-end mb-4">
                        <a class="btn btn-success" href="events.php" type="button">Events</a>
                        <a class="btn btn-danger me-md-2" href="../index.php" type="button">Back</a>
                    </div>
                </div>


                <br>

                <div class="container d-flex justify-content-center w-75">
                    <span class="border">
                        <div id="calendar" class="justify-content-center"></div>
                    </span>
                </div>

                <br>
                <br>
                <br>
</body>

</html>