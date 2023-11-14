<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office List</title>
</head>
<body>
    <h1>Office List</h1>

    <ul>
        <?php foreach ($offices as $office): ?>
            <li>
                <?php echo $office['name']; ?> -
                <?php echo $office['location']; ?> |
                <a href="/offices/edit/<?php echo $office['id']; ?>">Edit</a> |
                <a href="/offices/delete/<?php echo $office['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><a href="/offices/add">Add Office</a></p>
</body>
</html>
