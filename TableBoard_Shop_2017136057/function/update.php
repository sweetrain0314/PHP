<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!

$connect = mysqli_connect("localhost","sdb","1234");
$db_con = mysqli_select_db( $connect, "sdb_db");



/*

$sql1 = "update tableboard_shop set date ='".$_POST['date']."' where num = $bno "  ;
$sql2 = "update tableboard_shop set  order_id ='".$_POST['order_id']."' where num = $bno ";
$sql3 = "update tableboard_shop set name = '".$_POST['name']."' where num = $bno ";
$sql4 = "update tableboard_shop set price = '".$_POST['price']."' where num = $bno ";
$sql5 = "update tableboard_shop set quantity = '".$_POST['quantity']."' where num = $bno ";

$result1 = mysqli_query($connect, $sql1);
$result2 = mysqli_query($connect, $sql2);
$result3 = mysqli_query($connect, $sql3);
$result4 = mysqli_query($connect, $sql4);
$result5 = mysqli_query($connect, $sql5);




if(! ($result1 && $result2 && $result3 && $result4 && $result5)) {
    echo "<script> alert('error'); </script>";  // java 함수
}
*/


$sql1 = "update tableboard_shop set date ='".$_POST['date']."', order_id='".$_POST['order_id']."', 
name = '".$_POST['name']."', price = '".$_POST['price']."', quantity = '".$_POST['quantity']."' where num = $_GET[num]";




$result = mysqli_query($connect, $sql1);

if(!$result) {
    echo "<script> alert('error'); </script>";  // java 함수
};


?>


<script>
    location.replace('../index.php');
</script>
