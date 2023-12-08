<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pengguna</title>
</head>

<body>

    <?php
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $website = test_input($_POST["website"]);
        $comment = test_input($_POST["comment"]);
        $gender = test_input($_POST["gender"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Formulir Pengguna</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="name">
        <br><br>
        Email: <input type="text" name="email">
        <br><br>
        Website: <input type="text" name="website">
        <br><br>
        Komentar: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    echo "<h2>Data yang Anda masukkan:</h2>";
    echo "Nama: $name <br>";
    echo "Email: $email <br>";
    echo "Website: $website <br>";
    echo "Komentar: $comment <br>";
    echo "Gender: $gender <br>";
    ?>

</body>

</html>