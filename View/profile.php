<?php include 'include/header.php'?>
<?php
$catUrl = 'https://api.thecatapi.com/v1/images/search';
$cat = file_get_contents($catUrl);
$cat = json_decode($cat, true);
?>
    <form action="" method="">
        <div class="card">
            <img class="card-img-top" src="<?php echo $cat[0]['url']?>" alt="Card image cap" style="width: 200px">
            <div class="card-body">
                <h4 class="card-title"><?php echo "Ms/Mr ".$student->getFirstName()." ".$student->getLastName();?></h4>
                <p class="card-text">Email : <?php echo $student->getEmail()?></p>
                <input name="Edit" type="submit" value="Edit" studentId="<?php echo $student->getId()?>">
            </div>
        </div>
    </form>
<?php include 'include/footer.php'?>