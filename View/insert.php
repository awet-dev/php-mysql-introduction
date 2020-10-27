<?php include 'include/header.php'?>
<form action="" method="post">
    <input name="first_name" type="text" placeholder="First Name" required>
    <input name="last_name" type="text" placeholder="Last Name" required>
    <input name="email" type="email" placeholder="Student@gmail.com" required>
    <input name="password" type="password" placeholder="Enter Password" required>
    <input name="confirm_password" type="password" placeholder="Confirm Password" required>
    <input type="submit" value="Save">
    <p><a href="index.php?page=info">To info page</a></p>
</form>
<?php include 'include/footer.php'?>