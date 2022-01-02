<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = '';
    if (file_exists('db.json')) {
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    } else {
        $db = array();
    }
    if ((int)$id - 1 < count($db)) {
        $obj = $db[$id - 1];
    } else {
        header('Location: 404.php');
        die();
    }
} else {
    header('Location: 404.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Book</title>
</head>

<body>
    <nav class="container">
        <div class="flex-container" style="width: 100%; justify-content: space-between;">
            <a class="btn-a" href="<?php echo $BASE_URL ?>">
                <h1>DB Home</h1>
            </a>
        </div>
    </nav>
    <div class="flex-container" style="justify-content: center ;">
        <div class="book-obj">
            <h1 style="text-align: center;">Book</h1>
            <?php foreach ($obj as $key => $value) : ?>
                <div class="flex-container">
                    <h3 class="book-obj-head"><?php echo ucwords($key); ?></h3>
                    <p class="book-obj-content">
                        <?php
                        if ($key === 'available') {
                            echo $value ? 'True' : 'False';
                        } else {
                            echo $value;
                        }
                        ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>