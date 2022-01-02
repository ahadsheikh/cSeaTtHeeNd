<?php
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = '';
    if (file_exists('db.json')) {
        $json = file_get_contents('db.json');
        $db = json_decode($json, true);
    } else {
        $db = array();
    }
    $obj = array(
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'available' => $_POST['available'] === 'true' ? true : false,
        'isbn' => $_POST['isbn']
    );
    array_push($db, $obj);
    $db_string = json_encode($db);
    file_put_contents('db.json', $db_string);
    header('Location: ' . $BASE_URL . '/show.php?id=' . count($db));
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
    <title>Create Book</title>
</head>

<body>
    <nav class="container">
        <div class="flex-container" style="width: 100%; justify-content: space-between;">
            <a class="btn-a" href="<?php echo $BASE_URL ?>">
                <h1>DB Home</h1>
            </a>
        </div>
    </nav>
    <div class="flex-container" style="justify-content: center;">
        <div class="book-obj">
            <h1 style="text-align: center;">Create a Book</h1>
            <form action="" method="post">
                <div class="flex-container input-group">
                    <label class="input-label" for="">Title</label>
                    <input class="input-field" type="text" name="title" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Author</label>
                    <input class="input-field" type="text" name="author" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Availablity</label>
                    <div class="flex-container" style="width: 80%; justify-content: start;">
                        <div><input type="radio" name="available" required> True</div>
                        <div><input type="radio" name="available"> False</div>
                    </div>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">ISBN</label>
                    <input class="input-field" type="text" name="isbn" required>
                </div>
                <div class="flex-container" style="justify-content: center;">
                    <input class="btn-create" type="submit" value="Create" required>
                </div>
            </form>
        </div>
    </div>
</body>

</html>