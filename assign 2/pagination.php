<?php
require 'db_connect.php'; // Include database connection

// Number of rows per page
$rows_per_page = 20;

// Get the current page number from the URL, default is 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the OFFSET
$offset = ($page - 1) * $rows_per_page;

// Fetch the total number of rows in the table
$total_rows_stmt = $pdo->query("SELECT COUNT(*) FROM users");
$total_rows = $total_rows_stmt->fetchColumn();

// Fetch the data with LIMIT and OFFSET
$stmt = $pdo->prepare("SELECT * FROM users LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $rows_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Example</title>
    
</head>
<body>

    <h2>User List (Page <?php echo $page; ?>)</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= htmlspecialchars($user['id']); ?></td>
                <td><?= htmlspecialchars($user['name']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    
    <!-- Pagination Links -->
    <!-- Pagination Links -->
<div class="pagination">
    <?php
    $total_pages = ceil($total_rows / $rows_per_page);

    // Display Previous Button
    if ($page > 1) {
        echo "<a href='pagination.php?page=" . ($page - 1) . "'>Previous</a> ";
    }

    // Display Page Numbers
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='pagination.php?page=$i' class='" . ($i == $page ? "active" : "") . "'>$i</a> ";
    }

    // Display Next Button
    if ($page < $total_pages) {
        echo "<a href='pagination.php?page=" . ($page + 1) . "'>Next</a>";
    }
    ?>
</div>


</body>
</html>
