<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Bootstrap Simple Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if (isset($page) && $page == 'profile'):?>
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $cat[0]['url']?>" class="card-img-top" alt="student_image" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title"><?php echo "<strong>Full Name</strong>: ".$student->getFirstName()." ".$student->getLastName()?></h5>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo "<strong>Email</strong>: ".$student->getEmail()?></h5>
            <a href="index.php?delete=<?php echo $student->getId()?>" class="btn btn-danger">Delete</a>
            <a href="index.php?edit=<?php echo $student->getId()?>" class="btn btn-info">Edit</a>
        </div>
    </div>
<?php elseif (isset($page) && $page == 'insert'):?>
    <div class="signup-form" style="width: 70%; margin: auto">
        <form action="" method="post">
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name" laceholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class="btn btn-success btn-lg btn-block" value="Register Now">
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="index.php?page=login">Sign In</a></div>
    </div>
<?php elseif (isset($page) && $page == 'update'):?>
    <div class="signup-form" style="width: 70%; margin: auto">
        <form action="" method="post">
            <h2>Edit</h2>
            <p class="hint-text">Update your account. It's easy and just a couple of clicks.</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name" laceholder="Last Name" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <input name="submit" type="submit" class="btn btn-success btn-lg btn-block" value="Update">
            </div>
        </form>
    </div>
<?php elseif (isset($page) && $page == 'login'):?>
    <div class="signup-form" style="width: 70%; margin: auto">
        <form action="" method="post">
            <h2>Log In</h2>
            <p class="hint-text">Log to your account</p>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-lg btn-block" value="Register Now">
            </div>
        </form>
        <div class="text-center">Create an account? <a href="index.php">Register Now</a></div>
    </div>
<?php elseif (isset($page) && $page == 'display'):?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Index</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Profile Link</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student) :?>
            <tr>
                <th scope="row"><?php echo $student->getId()?></th>
                <td><?php echo $student->getFirstName()?></td>
                <td><?php echo $student->getLastName()?></td>
                <td><?php echo $student->getEmail()?></td>
                <td><a href="index.php?user=<?php echo $student->getId()?>"><?php echo $student->getFirstName()."'s "?>profile</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <a href="index.php?page=login">Back To Sign In form</a>
<?php endif;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>