<?php
session_start();
if(isset($_SESSION['username']))
{echo"
<script>
    alert('hello {$_SESSION['username']}');

</script>
";
}else{echo"
    <script>
    alert('login to enter');

</script>";

    header("location:php/logout.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>

    <form action="php/logout.php" method="post">
    <input type="submit" class="btn" value="logout">
    </form>
</body>
</html>
