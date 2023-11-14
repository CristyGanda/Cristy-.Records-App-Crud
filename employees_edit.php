<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>

    <form method="post" action="/employees/edit/<?php echo $employee['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<?php echo $employee['position']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $employee['email']; ?>" required><br>

        <button type="submit">Update Employee</button>
    </form>

    <p><a href="/employees">Back to Employee List</a></p>
</body>
</html>
