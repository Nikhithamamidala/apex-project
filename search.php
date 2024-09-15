<?php
include 'connect.php';

// Initialize search query
$search = '';
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
}

// Search query
$sql = "SELECT * FROM `crud` WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%'";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ff7e5f, #feb47b); /* Vibrant gradient background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .container {
            background-color: #ffffff; /* White background */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 12px;
            border: 2px solid #1e90ff; /* Dodger Blue */
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4682b4; /* Steel Blue */
        }
        .btn-dark {
            background-color: #1e90ff; /* Dodger Blue */
            border-color: #1e90ff;
        }
        .btn-dark:hover {
            background-color: #4682b4; /* Steel Blue */
            border-color: #4169e1;
        }
        table {
            margin-top: 20px;
        }
        thead th {
            background-color: #ff6347; /* Tomato */
            color: #ffffff; /* White text */
            font-weight: bold;
        }
        tbody tr:nth-child(odd) {
            background-color: #f0f8ff; /* Alice Blue */
        }
        tbody tr:nth-child(even) {
            background-color: #e6e6fa; /* Lavender */
        }
        tbody tr:hover {
            background-color: #d3ffd3; /* Honeydew */
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        .text-danger {
            color: #e57373; /* Light Red */
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="Search data" name="search" class="form-control mb-2" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-dark btn-sm" type="submit" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table table-bordered">
                <?php
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo '<thead>
                        <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                            <td>' . htmlspecialchars($row['id']) . '</td>
                            <td>' . htmlspecialchars($row['name']) . '</td>
                            <td>' . htmlspecialchars($row['email']) . '</td>
                            </tr>';
                        }

                        echo '</tbody>';
                    } else {
                        echo '<h2 class="text-danger">Data Not Found</h2>';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
