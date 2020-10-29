<?php include 'includes/Header.php' ?>
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo $cat[0]['url']?>" alt="Card image cap">
    <div class="card-body">
        <h5 name="first_name" class="card-title"><?php echo $student->getFirstName()?></h5>
        <h5 class="card-title"><?php echo $student->getLastName()?></h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $student->getEmail()?></li>
        <li class="list-group-item"><?php echo $student->getId()?></li>
    </ul>
    <div class="card-body">
        <a href="index.php?id=<?php echo $student->getId()?>" class="card-link">Delete Account</a>
        <a href="index.php?EditId=<?php echo $student->getId()?>" class="card-link">Edit Profile</a>
    </div>
    <button><a href="index.php">Back To Register</a></button>
</div>
<?php include 'includes/Footer.php' ?>

