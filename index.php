<html>
    <head><title>Wrist Watch</title></head>
    <body>
        <center>
            <h1>Wrist Watch Shop</h1>
            <form action="" method="post">
            <table>
                <tr>
                    <td>Model No</td>
                    <td><input type="number" name="wid"/></td>
                </tr>

                <tr>
                    <td>Watch Type</td>
                    <td>
                        <select name="wtype">
                            <option name="digital">Digital</option>
                            <option name="sports">Sports</option>
                            <option name="casual">Casual</option>
                            <option name="chronograph">Chronograph</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Watch Brand</td>
                    <td>
                        <select name="btype">
                            <option name="fastrack">Fastrack</option>
                            <option name="sonata">Sonata</option>
                            <option name="titan">Titan</option>
                            <option name="maxima">Maxima</option>
                            <option name="casio">Casio</option>
                        </select>
                    </td>
                </tr>   

                <tr>
                    <td>Watch Ideal For</td>
                    <td>
                        <select name="itype">
                            <option name="men">Men</option>
                            <option name="women">Women</option>
                            <option name="girls">Girls</option>
                            <option name="boys">Boys</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Watch Dial Shape</td>
                    <td>
                        <select name="stype">
                            <option name="round">Round</option>
                            <option name="square">Square</option>
                            <option name="rectangle">Rectangle</option>
                            <option name="oval">Oval</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Watch Price</td>
                    <td><input type="number" name="wprice"/></td>
                </tr>

                <tr>
                    <td>Watch Description</td>
                    <td><input type="text" name="wdes"/></td>
                </tr>

                <tr>
                    <td></td>
                    <td style="text-align:center"><input type="submit" name="btn_add" value="Add Watch"/></td>
                </tr>

            </table>
            </form>

            <form action="" method="post">
                <h2>Serach Watch Price Wise</h2>
                <table>
                    <tr>
                        <td>
                            <input type="number" name="search" required/>
                        </td>
                        <td>
                            <input type="submit" name="btn_search" value="Serach"/>
                        </td>  
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>
<?php
    include "init.php";
    if(isset($_POST['btn_search'])){

        ?>
            <center>
                <table border=1px>
                    <tr>
                        <th>Model No</th>
                        <th>Watch Type</th>
                        <th>Watch Brand</th>
                        <th>Watch Ideal For</th>
                        <th>Watch Dial Shape</th>
                        <th>Price Of Watch</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <?php
                            include "init.php";
                            $search_box = $_POST[$search];
                            $sql = "select * from $watch where $wprice <= $search_box";
                            //print_r($sql);
                            $queryExe = mysqli_query($con,$sql);
                            $data = mysqli_num_rows($queryExe);
                            if($data)
                            {
                                while($row = mysqli_fetch_array($queryExe))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row[$wid] ?></td>
                                            <td><?php echo $row[$wtype] ?></td>
                                            <td><?php echo $row[$btype] ?></td>
                                            <td><?php echo $row[$itype] ?></td>
                                            <td><?php echo $row[$stype] ?></td>
                                            <td><?php echo $row[$wprice] ?></td>
                                            <td><?php echo $row[$wdes] ?></td>
                                            <td><a href="delete.php?wid=<?php echo $row[$wid] ?>">Delete</a></td>
                                        </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="8">
                                            <h2 style="text-align:center"> There is no record found !</h2>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tr>
                </table>
            </center>
        <?php

    } else {

        include "init.php";
        $create = "create table if not exists 
                    $watch(
                        $wid integer primary key,
                        $wtype varchar(128),
                        $btype varchar(128),
                        $itype varchar(128),
                        $stype varchar(128),
                        $wprice text,
                        $wdes text
                    )";
        
        $queryExe = mysqli_query($con,$create);

        if(isset($_POST['btn_add'])){

            $watch_id = $_POST[$wid];
            $watch_type = $_POST[$wtype];
            $brand_type = $_POST[$btype];
            $ideal_type = $_POST[$itype];
            $shape_type = $_POST[$stype];
            $watch_price = $_POST[$wprice];
            $watch_des = $_POST[$wdes];

            $sql = "select * from $watch where $wid=$watch_id";
            $queryExe = mysqli_query($con,$sql);
            $data = mysqli_num_rows($queryExe);

            if($data){
                ?>
                    <script>
                        alert("Watch Exists !")
                    </script>
                <?php
            } else {

                $insert = "insert into $watch values($watch_id,'$watch_type','$brand_type','$ideal_type','$shape_type',$watch_price,'$watch_des')";
                $queryExe = mysqli_query($con,$insert);
                
                if($queryExe){
                    ?>
                        <script>
                            alert("Watch Added !")
                            window.open("http://localhost/project5/index.php","_self")
                        </script>
                    <?php
                }
            }
        }
        ?>
            <center>
                <table border=1px>
                    <tr>
                        <th>Model No</th>
                        <th>Watch Type</th>
                        <th>Watch Brand</th>
                        <th>Watch Ideal For</th>
                        <th>Watch Dial Shape</th>
                        <th>Price Of Watch</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <?php
                            include "init.php";
                            $sql = "select * from $watch";
                            $queryExe = mysqli_query($con,$sql);
                            $data = mysqli_num_rows($queryExe);
                            if($data)
                            {
                                while($row = mysqli_fetch_array($queryExe))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row[$wid] ?></td>
                                            <td><?php echo $row[$wtype] ?></td>
                                            <td><?php echo $row[$btype] ?></td>
                                            <td><?php echo $row[$itype] ?></td>
                                            <td><?php echo $row[$stype] ?></td>
                                            <td><?php echo $row[$wprice] ?></td>
                                            <td><?php echo $row[$wdes] ?></td>
                                            <td><a href="delete.php?wid=<?php echo $row[$wid] ?>">Delete</a></td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tr>
                </table>
            </center>
        <?php
    }
?>