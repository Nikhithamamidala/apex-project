<?php
include 'connect.php';

// Pagination variables
$results_per_page = 5; // Number of results per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$start_from = ($page - 1) * $results_per_page; // Starting record

// Initialize search query
$search = '';
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($con, $_POST['search']);
}

// Search and pagination query
$sql = "SELECT * FROM `crud` WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%' LIMIT $start_from, $results_per_page";
$result = mysqli_query($con, $sql);

// Total results for pagination
$total_results_sql = "SELECT COUNT(*) FROM `crud` WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%'";
$total_results_result = mysqli_query($con, $total_results_sql);
$total_results_row = mysqli_fetch_array($total_results_result);
$total_results = $total_results_row[0];
$total_pages = ceil($total_results / $results_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4); /* Vibrant gradient background */
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .form-control {
            border-radius: 8px;
            border: 2px solid #ff6f61; /* Coral */
            box-shadow: none;
            transition: border-color 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #1e90ff; /* Red */
            box-shadow: 0 0 0 0.2rem rgba(255, 61, 61, 0.25);
        }
        .btn-dark {
            background-color: #ff6f61; /* Coral */
            border-color: #ff6f61;
        }
        .btn-dark:hover {
            background-color: #ff3d3d; /* Red */
            border-color: #ff3d3d;
        }
        .table thead th {
            background-color: #ff6347; /* Green */
            color: #ffffff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f1f8e9; /* Light Green */
        }
        .table tbody tr:nth-child(even) {
            background-color: #e8f5e9; /* Very Light Green */
        }
        .table tbody tr:hover {
            background-color: #f1f8e9; /* Pale Green */
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item.active .page-link {
            background-color: #ff6f61; /* Coral */
            border-color: #ff6f61;
            color: #ffffff;
        }
        .pagination .page-link {
            border-radius: 8px;
            margin: 0 4px;
            color: #ff6f61;
            border: 1px solid #ff6f61;
        }
        .pagination .page-link:hover {
            background-color: #ffe0e0; /* Light Pink */
            border-color: #ff3d3d;
            color: #ff3d3d;
        }
        h2.text-danger {
            color: #ff3d3d; /* Red */
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <input type="text" placeholder="Search data" name="search" class="form-control mb-2" value="<?php echo htmlspecialchars($search); ?>">
            <button class="btn btn-dark btn-sm" type="submit" name="submit">Search</button>
        </form>
        <div class="container mt-5">
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
                } else {
                    echo '<h2 class="text-danger">Query Error</h2>';
                }
                ?>
            </table>

            <!-- Pagination Links -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
