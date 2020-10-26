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

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Profile Link</th>
    </tr>
    <?php foreach ($students as $student) :?>
        <tr>
            <td style="border: gray solid 2px"><?php echo $student->getFirstName()?></td>
            <td style="border: gray solid 2px"><?php echo $student->getLastName()?></td>
            <td style="border: gray solid 2px"><?php echo $student->getEmail()?></td>
            <td style="border: gray solid 2px"><a href="profile.php?user=<?php echo $student->getId()?>"><?php echo $student->getFirstName()."'s "?>profile</a></td>
        </tr>
    <?php endforeach;?>
</table>
</body>
</html>