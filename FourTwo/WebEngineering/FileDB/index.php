<?php

include_once('config.php');

$db = '';
if (file_exists('db.json')) {
    $json = file_get_contents('db.json');
    $db = json_decode($json, true);
} else {
    $db = array();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>DB Home</title>
</head>

<body>
    <nav class="container">
        <div class="flex-container" style="width: 100%; justify-content: space-between;">
            <a class="btn-a" href="<?php echo $BASE_URL ?>"><h1>DB Home</h1></a>
        </div>
    </nav>
    <div class="flex-container" style="justify-content: center;">
        <div>
            <h1 style="text-align: center;">All Data</h1>
            <table border="1">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Availablity</th>
                    <th>ISBN</th>
                    <th>Option</th>
                </tr>
                <?php foreach ($db as $key => $obj) : ?>

                    <tr class="obj-row">
                        <td class="obj-item">
                            <a href="<?php echo $BASE_URL . '/' . 'show.php?id=' . $key + 1; ?>">
                                <?php echo $obj['title']; ?>
                            </a>
                        </td>
                        <td class="obj-item"><?php echo $obj['author']; ?></td>
                        <td class="obj-item"><?php echo $obj['available'] ? 'True' : 'False'; ?></td>
                        <td class="obj-item"><?php echo $obj['isbn']; ?></td>
                        <td>
                            <a href="<?php echo $BASE_URL . '/' . 'delete.php?id=' . $key + 1; ?>">
                                <button class="btn-delete">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="flex-container" style="justify-content: center;">
        <a href="<?php echo $BASE_URL . '/' . 'create.php' ?>">
            <button class="btn-create">Create</button>
        </a>
    </div>
</body>

</html>