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
    if ($_SESSION['usertype'] == 'Secretary') {
    }
} else {
    header("location: ../../index.php");
}

require_once("logo.php");
include('../../dbconnection.php');
$query = $conn->query("SELECT * from calendar ORDER BY id");
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
    <!-- Fullcalendar JS -->
    <script src="../../api/fullcalendar.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" a href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- MDBootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>


    <script>
        $(document).ready(function() {
            var fullcalendar = $('#calendar').fullCalendar({
                // Fullcalendar layout
                editable: true,
                header: {
                    left: 'prev, today',
                    center: 'title',
                    right: ' today, next'
                },
                // Fetching Calendar details from database
                events: [
                    <?php while ($row = $query->fetch_object()) { ?> {
                        id: '<?php echo $row->id; ?>',
                        title: '<?php echo $row->event_name; ?>',
                        start: '<?php echo $row->start_date; ?>',
                        end: '<?php echo $row->end_date; ?>',
                    }, <?php } ?>],
                // If the user can add an event to the calendar (except Treasurer)
                selectable: true,

                // Creation of a calendar event
                select: function(start, end) {
                    var event_name = prompt("Enter the name of Event");
                    if (event_name) {
                        var start_date = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end_date = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "calendar_add.php",
                            type: "POST",
                            data: {
                                event_name: event_name,
                                start_date: start_date,
                                end_date: end_date,
                            },
                            // If successful, the browser will prompt event has been added
                            success: function() {
                                fullcalendar.fullCalendar('refetchEvents');
                                alert("Event has been added.");
                                location.reload();
                            }
                        })
                    }
                },
                // If the user can edit (drag to another date) the calendar (except Treasurer)
                editable: true,

                // Editing of an event (Dragging an added event)
                eventDrop: function(event) {
                    var start_date = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end_date = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var event_title = event.title;
                    var event_id = event.id;
                    $.ajax({
                        url: "calendar_edit.php",
                        type: "POST",
                        data: {
                            event_title: event_title,
                            start_date: start_date,
                            end_date: end_date,
                            event_id: event_id
                        },
                        // If successful, the browser will prompt that event has been updated
                        success: function() {
                            fullcalendar.fullCalendar('refetchEvents');
                            alert("Event has been updated.");
                            location.reload();
                        }
                    });
                },
                // Deletion of an event
                eventClick: function(event) {
                    if (confirm("Do you want to DELETE this event? This action CANNOT be UNDONE!")) {
                        var event_id = event.id;
                        $.ajax({
                            url: "calendar_event_delete.php",
                            type: "POST",
                            data: {
                                event_id: event_id
                            },
                            // If successful, the browser will prompt that the event has been deleted
                            success: function() {
                                fullcalendar.fullCalendar('refetchEvents');
                                alert("Event has been deleted.");
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