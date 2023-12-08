<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
</head>

<body>

    <?php
    $nameErr = $emailErr = $genderErr = "";
    $name = $email = $gender = $comment = $website = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Nama diperlukan";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email diperlukan";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format email tidak valid";
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
        }

        if (empty($_POST["comment"])) {
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender diperlukan";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }
    ?>

    <h2>Form Validation</h2>
    <p><span style="color: red;">* Harus diisi.</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama: <input type="text" name="name">
        <span style="color: red;">*
            <?php echo $nameErr; ?>
        </span>
        <br><br>
        Email: <input type="text" name="email">
        <span style="color: red;">*
            <?php echo $emailErr; ?>
        </span>
        <br><br>
        Website: <input type="text" name="website">
        <br><br>
        Komentar: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span style="color: red;">*
            <?php echo $genderErr; ?>
        </span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($genderErr)) {
        echo "<h2>Data yang Di-submit:</h2>";
        echo "Nama: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Website: " . $website . "<br>";
        echo "Komentar: " . $comment . "<br>";
        echo "Gender: " . $gender . "<br>";
    }
    ?>

</body>

</html>