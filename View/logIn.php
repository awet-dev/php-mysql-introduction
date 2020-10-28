<?php include 'include/header.php';?>
<form action="" method="post">
    <input type="email" placeholder="Enter Email" name="email" required <?php echo isset($error)? $error: ""?>/>
    <input type="password" placeholder="Enter Password" name="password" required <?php echo isset($error)? $error: ""?>/>
    <input type="submit" value="Log In">
</form>
<p><a href="index.php">Back to homepage</a></p>
<?php include 'include/footer.php'?>
