<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Office</title>
</head>
<body>
    <h1>Add Office</h1>

    <form method="post" action="/offices/add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>

        <button type="submit">Add Office</button>
    </form>

    <p><a href="/offices">Back to Office List</a></p>
</body>
</html>
