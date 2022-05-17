<!DOCTYPE html>
<HTML lang="en-US">

<head>
    <title>Home</title>
</head>

<body>
    <div style="margin-left: 10px;">
        <h1>To Do List</h1>
        <hr/>
        <a href="//13.76.222.128/addform.html">
            <button type="button" class="btn btn-primary">Add a Task</button>
        </a>
        <br>
        <br>
        <div class="overflow-auto" id="view">
            <?php
                $con = mysqli_connect("assg2-database-yq.mysql.database.azure.com:3306","P1346224","tG024539!123","assg2");
                    if (!$con){
                    die('Could not connect: ' . mysqli_connect_errno());
                    }  

                    $query=$con->prepare("Select * from `task`");
                    $query->execute();
                    $query->store_result();
                    $query->bind_result($idtask, $title, $date, $desc);

                    if($query->num_row === 0){
                        echo "No ongoing task";
                    }
                    else{
                        while($query->fetch()){
        
                            echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>";
                            echo "<script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>";
                            echo "<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>";
                            echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>";
        
                            echo "<div style='margin-left: 10px;'>";
                            echo "<h5>" . $title . "</h5>";
                            echo "<h6>" . $date . "</h6>";
                            echo "<p>" . $desc . "<p>";
                            echo "<form action='//13.67.33.188/deletetask.php' method='POST'><input type='hidden' name='idtask' value='" . $idtask . "'><input type='submit' value='Mark as Complete'></form>";
                            echo "<form action='//13.67.33.188/updatetask.php' method='GET'><input type='hidden' name='idtask' value='" . $idtask . "'><input type='submit' value='Edit task'></form>";
                            echo "<br>";
                            echo "<hr/>";
                            echo "</div>";
                        }
                    }
                $con->close();
            ?>
        </div>
    </div>
</body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</HTML>