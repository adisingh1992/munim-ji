<?php
include 'connection.php';

$auth_key = $reason = $value = $type = "";
$balance = 0;

if(isset($_POST['submit'])){
    $auth_key = md5(validate($_POST["auth"]));
    $reason = validate($_POST["reason"]);
    $value = validate($_POST["value"]);
    $type = validate($_POST["type"]);
    if ($auth_key === "2465f084fe96813a6acb907b37033521"){
        $stmt = "SELECT balance FROM transactions ORDER BY ID DESC LIMIT 1";
        $result = $con->query($stmt);
        
        if($result->num_rows > 0){
            $row = $result->fetch_row();
            if($type === "deposit"){
                $balance = $row[0] + $value;
            }
            elseif($type === "withdraw"){
                $balance = $row[0] - $value;
            }
        }
        else{
            if($type === "deposit"){
                $balance = $value;
            }
            elseif($type === "withdraw"){
                echo '<script>alert("Invalid Transaction");</script>';
                die('<script>location.href = "update.php";</script>');
            }
        }
        $sql = $con->prepare("INSERT INTO transactions(reason, $type, balance) VALUES(?,?,?)");
        $sql->bind_param("sii", $reason, $value, $balance);
        $sql->execute();
        $sql->close();
        $con->close();
        echo '<script>alert("Updation Successful");</script>';
    }
    else{
        echo '<script>alert("Invalid Authentication Key");</script>';
    }
}
redirect();

function redirect(){
    echo '<script>location.href = "update.php";</script>';
}

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>