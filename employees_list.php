<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>

    <ul>
        <?php foreach ($employees as $employee): ?>
            <li>
                <?php echo $employee['name']; ?> -
                <?php echo $employee['position']; ?> -
                <?php echo $employee['email']; ?> |
                <a href="/employees/edit/<?php echo $employee['id']; ?>">Edit</a> |
                <a href="/employees/delete/<?php echo $employee['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="/employees/add">Add Employee</a></p>
</body>
</html>
