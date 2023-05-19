<html>

<body>
    <?php
    $nameErr = $emailErr = "";
    $name = $email = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $name; ?>"><br>
        <?php if (!empty($nameErr)) echo "<span class='error'>$nameErr</span><br>"; ?>

        E-mail: <input type="text" name="email" value="<?php echo $email; ?>"><br>
        <?php if (!empty($emailErr)) echo "<span class='error'>$emailErr</span><br>"; ?>

        <input type="submit">
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "My name is " . $name . " and my email is " . $email;
    }
    ?>

</body>

</html>