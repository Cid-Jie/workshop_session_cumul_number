<?php
session_start();

if (isset($_POST['raz'])) {
    session_destroy();
    header('Location: index.php');
    die();
}

$numbers = [];

if (isset($_SESSION['numbers'])) {
    $numbers = $_SESSION['numbers'];
}

if (isset($_POST['number']) && is_numeric($_POST['number'])) {
    $numbers[] = $_POST['number'];
    $_SESSION['numbers'] = $numbers;
}

$result = array_sum($numbers);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cumul Number</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <main class="container">
        <h1 class="text-center mt-5 mb-5">Enter a number</h1>
        <h1 class="text-center mt-5 mb-5">
            <?php echo $result; ?>
        </h1>
        <form method="post">
            <p>
                <label for="number" class="form-label"> Number : </label>
                <input type="number" name="number" id="number" class="form-control">
            </p>
            <p>
                <input type="submit" value="OK" class="btn btn-primary btn-lg">
                <input type="submit" value="R.A.Z" name="raz" class="btn btn-primary btn-lg">
            </p>
        </form>
        <div class="border col-6 rounded m-3">
            <h2>Historique</h2>
            <ul>
                <?php
                foreach ($numbers as $number) {
                    echo "<li>$number</li>";
                }
                ?>
            </ul>
        </div>
    </main>
</body>
</html>