<?php
include 'header.php';
include 'connection.php';

$sql = "select balance from transactions order by id desc limit 1";
$result = $con->query($sql);
$row = $result->fetch_row();
?>
    <div class="well text-center">
        <div class="bg-primary" style="padding: 2%; border-radius: 5px;">
            <h3>Current Cash Balance</h3>
            <p style="font-size: 1.5em;">Rs. <?php echo $row[0]; ?></p>
            <button class="btn btn-primary" onclick="history.back()">Back</button>
        </div>
    </div>
<?php $con->close(); ?>
<?php include 'footer.php' ?>