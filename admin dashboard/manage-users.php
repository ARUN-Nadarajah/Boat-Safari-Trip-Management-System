<?php
session_start();
include('db.php');
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}
include('header.php');
include('sidebar.php');

// Fetch users from the database
$result = $pdo->query("SELECT * FROM User");
$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>


    <link rel="stylesheet" href="common.css">


<div class="content">
    <h1>Manage Users</h1>
    <a href="add-user.php">
        <button type="button">Add User</button>
    </a>
    <table border="1px" style="border-collapse: collapse;
                                th,td{
                                    padding:10px;
                                }">
        <thead>
            <tr>
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['User_name']); ?></td>
                <td><?php echo htmlspecialchars($user['First_Name']); ?></td>
                <td><?php echo htmlspecialchars($user['Last_Name']); ?></td>
                <td><?php echo htmlspecialchars($user['Email']); ?></td>
                <td><?php echo htmlspecialchars($user['phoneNumber']) ?></td>
                <td><?php echo htmlspecialchars($user['Registration_Date']); ?></td>
                <td>
                    <a href="edit-user.php?id=<?= $user['User_name']; ?>">Edit</a>
                    <a href="delete-user.php?id=<?= $user['User_name']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>