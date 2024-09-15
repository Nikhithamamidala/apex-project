<?php
include 'connect.php';

// Pagination variables
$results_per_page = 2; // Number of results per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$start_from = ($page - 1) * $results_per_page; // Starting record

// Fetching total results for pagination
$total_results_sql = "SELECT COUNT(*) FROM `crud`";
$total_results_result = mysqli_query($con, $total_results_sql);
$total_results_row = mysqli_fetch_array($total_results_result);
$total_results = $total_results_row[0];
$total_pages = ceil($total_results / $results_per_page);

// Fetching results for current page
$sql = "SELECT * FROM `crud` LIMIT $start_from, $results_per_page";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffe4e1; /* Misty Rose - a soft, light color */
            color: #333;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table thead th {
            background-color: #ff6347; /* Tomato color */
            color: #ffffff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa; /* Light gray for odd rows */
        }
        .table tbody tr:nth-child(even) {
            background-color: #ffffff; /* White for even rows */
        }
        .table tbody tr:hover {
            background-color: #ffebcd; /* Blanched Almond for hover */
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-item.active .page-link {
            background-color: #ff6347; /* Tomato color */
            border-color: #ff6347;
            color: #ffffff;
        }
        .pagination .page-link {
            border-radius: 4px;
            margin: 0 4px;
            color: #ff6347;
            border: 1px solid #ff6347;
        }
        .pagination .page-link:hover {
            background-color: #ff4500; /* Darker Tomato color */
            border-color: #ff4500;
            color: #ffffff;
        }
        .text-danger {
            color: #dc3545; /* Red */
        }
    </style>
</head>
<body>
    <div class="container">
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
                    echo '<h2 class="text-danger">No records found</h2>';
                }
            }
            ?>
        </table>

        <!-- Pagination Links -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
