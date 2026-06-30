<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>

<?php
include '../includes/connection.php';

// Fetch events from the database
$query = "SELECT * FROM events";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    #body {
        background-color: #f8f9fa;
        width: calc(100% - 250px);
        margin-left: 250px;
        margin-top: 100px;
    }
    </style>
</head>
<?php include 'nav.php' ?>

<body id="body">
    <div class="container mt-5">
        <h2 class="text-center">Event Dashboard</h2>
        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">Add New Event</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="../images/<?php echo $row['photo']; ?>" alt="Event Photo" width="50" height="50"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['event_date']; ?></td>
                    <td><?php echo $row['event_time']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm editBtn" data-id="<?php echo $row['id']; ?>">Edit</button>
                        <button class="btn btn-danger btn-sm deleteBtn"
                            data-id="<?php echo $row['id']; ?>">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Event</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="add_event.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Event Date</label>
                            <input type="date" name="event_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Event Time</label>
                            <input type="time" name="event_time" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Event Photo</label>
                            <input type="file" name="photo" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="POST" action="edit_event.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editEventId">
                        <div class="form-group">
                            <label>Event Name</label>
                            <input type="text" name="name" class="form-control" id="editName" required>
                        </div>
                        <div class="form-group">
                            <label>Event Date</label>
                            <input type="date" name="event_date" class="form-control" id="editEventDate" required>
                        </div>
                        <div class="form-group">
                            <label>Event Time</label>
                            <input type="time" name="event_time" class="form-control" id="editEventTime" required>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" id="editLocation" required>
                        </div>
                        <div class="form-group">
                            <label>Change Photo</label>
                            <input type="file" name="photo" class="form-control-file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include 'sidebar.php'; ?>

</html>

<script>
$(document).on('click', '.deleteBtn', function() {
    const id = $(this).data('id');
    if (confirm('Are you sure you want to delete this event?')) {
        $.ajax({
            url: 'delete_event.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function() {
                alert('Event deleted successfully!');
                location.reload();
            }
        });
    }
});

$(document).on('click', '.editBtn', function() {
    const id = $(this).data('id');
    $.ajax({
        url: 'get_event.php',
        type: 'POST',
        data: {
            id: id
        },
        success: function(response) {
            const event = JSON.parse(response);
            $('#editEventId').val(event.id);
            $('#editName').val(event.name);
            $('#editEventDate').val(event.event_date);
            $('#editEventTime').val(event.event_time);
            $('#editLocation').val(event.location);
            $('#editEventModal').modal('show');
        }
    });
});
</script>
