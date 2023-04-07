<?php 

    if(isset($_POST['submit_add'])){
        $address =$_POST['address'];
        ?>
            <iframe src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed" 
                width="100%" height="500"></iframe>

        <?php
    }

?>

<form action="" method="POST">
    <p>
        <input type="text" name="address" placeholder="enter addres">
    </p>
    <input type="submit" name="submit_add">

</form>