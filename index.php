<?php 
    include_once "classes/Shout.php";
    $shout = new Shout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Shout Box</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper clr">
        <header class="headsection clr">
            <h2>Basic Shoutbox with PHP OOP & MySQLi</h2>
        </header>
        <section class="content clr">
            <div class="box">
                <ul>
                    <?php
                        $getData = $shout->getAllData();
                        if ($getData) {
                            while ($data = $getData->fetch_assoc()) { ?>
                                <li><span><?php echo $data['time']; ?></span> - <b><?php echo $data['name']; ?></b> <?php echo $data['body']?></li>
                          <?php  } } ?>
                </ul>
            </div>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $shoutdata = $shout->insertData($_POST);
                }
            ?>
            <div class="shoutform clr">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><input type="text" name="name" id="" required placeholder="Please enter your name."></td>
                        </tr>
                        <tr>
                            <td>body</td>
                            <td>:</td>
                            <td><input type="text" name="body" id="" required placeholder="please enter your text."></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" value="Shout It" required></td>
                        </tr>
                    </table>
                </form>
            </div>
        </section>
        <footer class="footsection">
            <h2>&copy; Copyright Sadat Himel</h2>
        </footer>
    </div>
</body>
</html>