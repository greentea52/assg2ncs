<?php
$con = mysqli_connect("assg2-database-yq.mysql.database.azure.com:3306","P1346224","tG024539!123","assg2");
    if (!$con){
        die('Could not connect: ' . mysqli_connect_errno());
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $taskid=$_POST['idtask'];
        $title=htmlspecialchars($_POST['title']);
        $date=htmlspecialchars($_POST['date']);
        $desc=htmlspecialchars($_POST['desc']);

        $query=$con->prepare("UPDATE `task` SET `title` = ?, `date` = ?, `description` = ? WHERE `idtask` = ?");
        $query->bind_param('sssi', $title, $date, $desc, $taskid);

        if ($query->execute()){
        header("Location:http://13.76.222.128");
        }
    }
?>

<!DOCTYPE html>
<HTML lang="en-US">

<head>
    <title>To Do List</title>
</head>   

<body>
    <div style="margin-left:10px;">
        <h3>To Do List Form</h3>
        <hr/> 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <?php
        $con = mysqli_connect("assg2-database-yq.mysql.database.azure.com:3306","P1346224","tG024539!123","assg2");
            if (!$con){
                die('Could not connect: ' . mysqli_connect_errno());
            }
            $idtask = $_GET['idtask'];

            $query=$con->prepare("Select * from `task` where idtask = ?");
            $query->bind_param('i', $idtask);
            $query->execute();
            $query->store_result();
            $query->bind_result($idtask, $title, $date, $desc);

            while($query->fetch()){
                echo "<label for='title'>Title:</label><br>";
                echo "<input type='text' id='title' name='title' value='" . $title . "'><br>";
                echo "<label for='date'>Date (YYYY/MM/DD):</label><br>";
                echo "<input type='text' id='date' name='date' value='" . $date . "'><br>";
                echo "<label for='desc'>Details:</label><br>";
                echo "<input type='text' id='desc' name='desc' value='" . $desc . "'><br><br>";
                echo "<input type='hidden' name='idtask' value='" . $idtask . "'>";
            }
        $con->close();
        ?>
        <input type="submit" value="Submit">
        </form>
        <a href="//13.76.222.128">
            <input type="submit" value="Back">
        </a>
    </div>
</body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</HTML>