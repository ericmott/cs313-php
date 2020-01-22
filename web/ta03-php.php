<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Assignment 03</title>
</head>
<body>
    <div>
        Username:
        <?php
        echo $_POST["name"]

        ?>
    </div>

    <div>
    Email:
        <?php
        echo $_POST["email"]
        ?>
    </div>

    <div>
    Major:
        <?php
        echo $_POST["major"]
        ?>
    </div>

    <div>
    Comments:
        <?php
        echo $_POST["comments"]
        ?>
    </div>

    <div>
        Continents:
        <?php
        for ($i = 0; $i < 7; $i++) {
            if (isset($_POST['continent'.$i])){
                echo $_POST['continent'.$i];
            }
        }
        ?>
    </div>





</body>
</html>