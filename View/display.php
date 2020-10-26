<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p><a href="index.php">Back to homepage</a></p>
<ul>
<?php foreach ($students as $student) :?>
<li><?php echo $student?></li>
<?php endforeach;?>
</ul>
</body>
</html>