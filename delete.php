<?php
    include "init.php";
    $getId = $_GET[$wid];
    //echo $getId;
    $sql = "delete from $watch where $wid=$getId";
    $queryExe = mysqli_query($con,$sql);
    if(!$queryExe){
        ?>
            <script>
                alert("Watch Not Deleted !")
            </script>
        <?php
    } else {
        ?>
            <script>
                alert("Watch Deleted !")
                window.open("http://localhost/project5/index.php","_self")
            </script>
        <?php
    }
?>