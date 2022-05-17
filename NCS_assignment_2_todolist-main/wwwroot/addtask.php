<?php
$con = mysqli_connect("assg2-database-yq.mysql.database.azure.com:3306","P1346224","tG024539!123","assg2");
    if (!$con){
        die('Could not connect: ' . mysqli_connect_errno());
    }

    $title=htmlspecialchars($_POST['title']);
    $date=htmlspecialchars($_POST['date']);
    $desc=htmlspecialchars($_POST['desc']);

    $query=$con->prepare("Insert into `task` (`title`, `date`, `description`) values (?,?,?)");
    $query->bind_param('sss', $title, $date, $desc);

    if ($query->execute()){
        header("Location:http://13.76.222.128");
    }
    else{
        echo $query->error;
    }
?>