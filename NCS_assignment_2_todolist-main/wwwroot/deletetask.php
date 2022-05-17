<?php
$con = mysqli_connect("assg2-database-yq.mysql.database.azure.com:3306","P1346224","tG024539!123","assg2");
    if (!$con){
        die('Could not connect: ' . mysqli_connect_errno());
    }

    $id=$_POST['idtask'];

    $query=$con->prepare("Delete from `task` where `idtask` = ?");
    $query->bind_param('i', $id);

    if ($query->execute()){
        header("Location:http://13.76.222.128");
    }
    else{
        echo $query->error;
    }
?>