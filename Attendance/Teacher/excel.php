<?php
include('db.php');
$year = "";
if (isset($_POST['submit'])) {
    include('db.php');
    $year = $_POST['days_of_attendance'];
    $filename = $_POST['filename'];

}

?>
<?php

$today_date = strftime("%d");
$today_month = strftime("%b");
$today_year = strftime("%y");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=".$filename.$today_date.$today_month.$today_year.".xls");

?>
<style>
    table,
    th,
    td {
        text-align: center;
    }

    th {
        color: white;
        background-color: rgb(53, 116, 184);
        padding: 10px;
        border-radius: 1px;
    }

    td {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        border-bottom: 1px solid gray;
    }

    #green {
        background-color: limegreen;
    }

    #red {
        background-color: red;
    }
</style>
<table id="table">
    <tr>
        <th>S.no</th>
        <th>Name</th>
        <th>Roll Number</th>
        <?php
        $today_date = strftime("%d");
        $today_month = strftime("%b");
        $today_year = strftime("%y");
        $today_date = intval($today_date);
        if ($year == "2 days") {
            for ($i = $today_date; $i > $today_date - 2; $i--) {
        ?>
                <th><?php echo $i . "-" . $today_month . "-" . $today_year; ?></th>
            <?php
            }
        }
        if ($year == "5 days") {
            for ($i = $today_date; $i > $today_date - 5; $i--) {
            ?>
                <th><?php echo $i . "-" . $today_month . "-" . $today_year; ?></th>
            <?php
            }
        }
        if ($year == "1 week") {
            for ($i = $today_date; $i > $today_date - 7; $i--) {
            ?>
                <th><?php echo $i . "-" . $today_month . "-" . $today_year; ?></th>
        <?php
            }
        }
        if ($year == "2 week") {
            for ($i = $today_date; $i > $today_date - 14; $i--) {
            ?>
                <th><?php echo $i . "-" . $today_month . "-" . $today_year; ?></th>
    
        <?php
            }
        }
        if ($year == "1 month") {
            for ($i = $today_date; $i > $today_date - 31; $i--) {
            ?>
               <th><?php echo $i . "-" . $today_month . "-" . $today_year; ?></th>
        <?php
            }
        }
        ?>
    </tr>
    <?php
    include('db.php');
    $date = strftime("%d%B%y");
    $query = "SELECT * FROM `cse`";
    $result = mysqli_query($conn, $query);
    $sno = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $sno ?>.</td>
            <td> <?php echo $row['name'] ?> </td>
            <td><?php echo $row['roll'] ?></td>
            <?php
            $today_date = strftime("%d");
            $today_date = intval($today_date);

            if ($year == "2 days") {
                for ($i = $today_date; $i > $today_date - 2; $i--) {
            ?>
                    <td id="<?php echo ($row[$i . $today_month . $today_year] == "Present") ? 'green' : 'red'  ?>" >
                        <?php echo $row[$i . $today_month . $today_year] ?>
                    </td>
                <?php
                }
            }

            if ($year == "5 days") {
                for ($i = $today_date; $i > $today_date - 5; $i--) {
                ?>
                    <td id="<?php echo ($row[$i . $today_month . $today_year] == "Present") ? 'green' : 'red'  ?>">
                        <?php echo $row[$i . $today_month . $today_year] ?>
                    </td>
                <?php
                }
            }
            if ($year == "1 week") {
                for ($i = $today_date; $i > $today_date - 7; $i--) {
                ?>
                    <td id="<?php echo ($row[$i . $today_month . $today_year] == "Present") ? 'green' : 'red'  ?>">
                        <?php echo $row[$i . $today_month . $today_year] ?>
                    </td>
            <?php
                }
            }
            if ($year == "2 week") {
                for ($i = $today_date; $i > $today_date - 14; $i--) {
                ?>
                    <td id="<?php echo ($row[$i . $today_month . $today_year] == "Present") ? 'green' : 'red'  ?>">
                        <?php echo $row[$i . $today_month . $today_year] ?>
                    </td>
            <?php
                }
            }
            if ($year == "1 month") {
                for ($i = $today_date; $i > $today_date - 31; $i--) {
                ?>
                    <td id="<?php echo ($row[$i . $today_month . $today_year] == "Present") ? 'green' : 'red'  ?>">
                        <?php echo $row[$i . $today_month . $today_year] ?>
                    </td>
            <?php
                }
            }
            ?>
        </tr>
    <?php
        $sno++;
    }
    ?>
</table>