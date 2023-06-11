<?php

$arr=array(1,2,3,4);
if(in_array(1,$arr))
{
    echo "yes";
}


// if ($today_date_input <= $today_date_php) {
//     while ($row = mysqli_fetch_assoc($result1)) {
//         echo $row['Type'];
//         echo $table_name;

//         //Checking whether the column of today's date exist or not !!
//         if ($row['Field'] == "$date") {
//             $attendance = $_POST['attendance'];

//             foreach ($attendance as $key => $value) {
//                 if($value<10)
//                 {
//                     $value="0".$value;
//                 }
//                 $query_absent = "UPDATE `$table_name` SET `$date`='Absent'";
//                 $result_absent = mysqli_query($conn, $query_absent);

//                 $query2 = "UPDATE `$table_name` SET `$date`='Present' WHERE `roll`=$value";
//                 $result2 = mysqli_query($conn, $query2);
//             }
//         } else {
//             //If today's date column doesn't exist then it will create a column of today' date !!
//             $date = strval($date);
//             $query3 = "ALTER TABLE `$table_name` ADD `$date` text(100)";
//             $result3 = mysqli_query($conn, $query3);
//             $attendance = $_POST['attendance'];
//             $query_absent = "UPDATE `$table_name` SET `$date`='Absent'";
//             $result_absent = mysqli_query($conn, $query_absent);
//             foreach ($attendance as $key => $value) {
//                 if($value<10)
//                 {
//                     $value="0".$value;
//                 }
//                 $query4 = "UPDATE `$table_name` SET `$date`='Present' WHERE `roll`=$value";
//                 $result4 = mysqli_query($conn, $query4);
//             }
//         }
//         // for 7 days checking if date exists or not in database...

//     }
//     echo "<script>alert('Task Completed !!')</script>";
// }
// else {
//     echo "<script>alert('Incorrect or Invalid Date !!')</script>";
// }


?>
