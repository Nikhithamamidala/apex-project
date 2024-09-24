<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #f0f4c3, #e8eaf6); /* Light pastel gradient */
        }
        .sidebar {
            height: 100vh;
            background: #bbdefb; /* Light blue */
            padding: 20px;
        }
        .sidebar a {
            color: #333333; /* Dark text for contrast */
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #90caf9; /* Slightly darker blue on hover */
        }
        .content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        h1, h2 {
            color: #1976d2; /* Dark blue for headings */
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h2 class="text-dark">Dashboard</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="login.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display.php">Manage User</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="search and pagination.php">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="content flex-grow-1">
            <h1>Welcome to Your Dashboard</h1>
            <hr>
            <h2>CRUD Actions</h2>
            <p>Fetches and displays all records from the CRUD table in a responsive table layout.</p>
            <!-- Add more content as needed -->
        </div>
    </div>
</body>
</html>
