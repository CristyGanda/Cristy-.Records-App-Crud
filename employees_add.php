<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h1>Add Employee</h1>

    <form method="post" action="/employees/add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Add Employee</button>
    </form>

    <p><a href="/employees">Back to Employee List</a></p>
</body>
</html>
