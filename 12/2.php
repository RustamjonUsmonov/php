<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="index.php" method="get"">
    <label>
        <input type="text" name="str" value="
         <?php if(isset($_COOKIE["cookie"])){
             echo $_COOKIE["cookie"];
         }?>">
    </label>
    <input type="submit" name="btn" value="Run">
</form>
</body>
</html>