<?php
session_start();
include('db.php');
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

include('header.php');
include('sidebar.php');
// Fetch staff members from the database
$result = $pdo->query("SELECT * FROM Staff where Staff_ID != 'SF001'");
$staff_members = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    <link rel="stylesheet" href="common.css">
</head>
<body>
    <div class="content">
        <h1>Manage Staff</h1>
        <a href="add-staff.php">
            <button type="button">Add Staff</button>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>staff id</th>
                    <th>salary</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Hire Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staff_members as $staff): ?>
                <tr>
                    <td><?php echo htmlspecialchars($staff['username']); ?></td>
                    <td><?php echo htmlspecialchars($staff['Staff_ID']);?></td>
                    <td><?php echo htmlspecialchars($staff['Salary']); ?></td>
                    <td><?php echo htmlspecialchars($staff['Email']); ?></td>
                    <td><?php echo htmlspecialchars($staff['Position']); ?></td>
                    <td><?php echo htmlspecialchars($staff['Hire_Date']); ?></td>
                    <td>
                        <a href="edit-staff.php?id=<?= htmlspecialchars($staff['username']); ?>">Edit</a>
                        <a href="delete-staff.php?id=<?= htmlspecialchars($staff['username']); ?>" onclick="return confirm('Are you sure you want to delete this staff member?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>