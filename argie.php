<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .output {
            margin-top: 20px;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        h3 {
            margin-bottom: 10px;
            color: #666;
        }

        p {
            margin-bottom: 20px;
            color: #888;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: 96%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[name="enqueue"] {
            background-color: #72BF78;
            color: #fff;
        }

        input[name="enqueue"]:hover {
            background-color: #2eb82e;
        }

        input[name="dequeue"] {
            background-color: #72BF78;
            color: #fff;
        }

        input[name="dequeue"]:hover {
            background-color: #2eb82e;
        }

        input[name="push"] {
            background-color: #4379F2;
            color: #fff;
        }

        input[name="push"]:hover {
            background-color: #000099;
        }

        input[name="pop"] {
            background-color: #4379F2;
            color: #fff;
        }

        input[name="pop"]:hover {
            background-color: #000099;
        }

        input[name="clear"] {
            background-color: #FF7777;
            color: #fff;
        }

        input[name="clear"]:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
<?php
    session_start();

    if (!isset($_SESSION['queue'])) {
        $_SESSION['queue'] = [];
    }
    if (!isset($_SESSION['stack'])) {
        $_SESSION['stack'] = [];
    }

    if (isset($_POST['enqueue'])) {
        $element = $_POST['element'];
        if ($element != "") {
            array_push($_SESSION['queue'], $element);
        }
    }

    if (isset ($_POST['push'])) {
        $element = $_POST['element'];
        if ($element != "") {
            array_push($_SESSION['stack'], $element);
        }
    }

    if (isset($_POST['dequeue'])) {
        if (!empty($_SESSION['queue'])) {
            array_shift($_SESSION['queue']);
        } else {
            echo "Queue is empty";
        }
    }

    if (isset($_POST['pop'])) {
        if (!empty($_SESSION['stack'])) {
            array_pop($_SESSION['stack']);
        } else {
            echo "Stack is empty";
        }
    }

    if (isset($_POST['clear'])) {
        $_SESSION['queue'] = [];
        $_SESSION['stack'] = [];
    }
    ?>
    <div class="container">
        <h2>FIFO Queue and LIFO Stack</h2>
        <form method="post">
            <input type="text" name="element" placeholder="Enter an element">
            <br>
            <input type="submit" name="enqueue" value="Enqueue (Queue)">
            <input type="submit" name="dequeue" value="Dequeue (Queue)">
            <br>
            <br>
            <input type="submit" name="push" value="Push (Stack)">
            <input type="submit" name="pop" value="Pop (Stack)">
            <br>
            <br>
            <input type="submit" name="clear" value="Clear All">
        </form>

        <div class="output ">
            <h3>Queue (FIFO):</h3>
            <p>
                <?php 
                if (isset($_SESSION['queue'])) {
                    echo implode(", ", $_SESSION['queue']);
                } else {
                    echo "Queue is empty";
                }
                ?>
            </p>

            <h3>Stack (LIFO):</h3>
            <p>
                <?php 
                if (isset($_SESSION['stack'])) {
                    echo implode(", ", $_SESSION['stack']);
                } else {
                    echo "Stack is empty";
                }
                ?>
            </p>
        </div>
    </div>
    




    
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <br>

        <label for="password1">Password:</label>
        <input type="password" name="password1" id="password1">
        <br>

        <label for="password2">Confirm Password:</label>
        <input type="password" name="password2" id="password2">

        <input type="submit" value="submit">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $pass1 = htmlspecialchars($_POST["password1"]);
            $pass2 = htmlspecialchars($_POST["password2"]);
        }

        if(empty($name) && empty($email) && empty($pass1) && empty($pass2)) {
            echo"<p style='color:red'>empty</p>";
        } else if(empty($name)) {
            echo"<p style='color:red'>name is empty</p>";
        } else if(empty($email)) {
            echo"<p style='color:red'>email is empty</p>";
        } else if(empty($pass1)) {
            echo"<p style='color:red'>password is empty</p>";
        } else if(empty($pass2)) {
            echo"<p style='color:red'>confirm password is empty</p>";
        } else if($pass1 != $pass2) {
            echo"<p style='color:red'>wrong pass</p>";
        } else {
            echo"<p>name: $name</p>";
            echo"<p>email: $email</p>";
        }
    ?>
</body>
</html>