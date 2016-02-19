<?php
if(isset($_POST['submit'])){
    include 'connection.php';
    include 'header.php';

    $month = $_POST['month'];
    $year = $_POST['year'];

    $dep_stmt = $con->prepare("SELECT reason, deposit, balance, cur_date FROM transactions WHERE month(cur_date)=? and year(cur_date)=?");
    $dep_stmt->bind_param("ss", $month, $year);
    $dep_stmt->execute();
    $dep_stmt->store_result();
    $dep_stmt->bind_result($reason, $value, $balance, $time);
    ?>

    <div class="container">
        <table class="table table-striped table-hover table-bordered text-center">
            <caption class="text-center" style="font-size: 1.3em;">AMOUNT DEPOSITED</caption>
            <thead>
                <tr>
                    <td>REASON</td>
                    <td>AMOUNT</td>
                    <td>BALANCE</td>
                    <td>TIMESTAMP</td>
                </tr>
            </thead>
            <tbody>
    <?php
    while($dep_stmt->fetch()){
        if($value === NULL){
            continue;
        }
        else{
            echo "<tr>";
                echo "<td>$reason</td>";
                echo "<td>$value</td>";
                echo "<td>$balance</td>";
                echo "<td>$time</td>";
            echo "</tr>";
        }
    }
    ?>
            </tbody>
        </table>
    </div>

    <?php
    $with_stmt = $con->prepare("SELECT reason, withdraw, balance, cur_date FROM transactions WHERE month(cur_date)=? and year(cur_date)=?");
    $with_stmt->bind_param("ss", $month, $year);
    $with_stmt->execute();
    $with_stmt->store_result();
    $with_stmt->bind_result($reason, $value, $balance, $time);
    ?>
    <div class="container">
        <table class="table table-striped table-hover table-bordered text-center">
            <caption class="text-center" style="font-size: 1.3em;">AMOUNT WITHDRAWN</caption>
            <thead>
                <tr>
                    <td>REASON</td>
                    <td>AMOUNT</td>
                    <td>BALANCE</td>
                    <td>TIMESTAMP</td>
                </tr>
            </thead>
            <tbody>
    <?php 
    while($with_stmt->fetch()){
        if($value === NULL){
            continue;
        }
        else{
            echo "<tr>";
                echo "<td>$reason</td>";
                echo "<td>$value</td>";
                echo "<td>$balance</td>";
                echo "<td>$time</td>";
            echo "</tr>";
        }
    }
    ?>
            </tbody>
        </table>    
    </div>
<?php
    include 'footer.php'; 
}
else{
    echo '<script>alert("Form Not Submitted");</script>';
    echo '<script>location.href = "statement.php";</script>';
}
?>