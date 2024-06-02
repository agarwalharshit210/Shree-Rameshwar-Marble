<?php
$connect=mysqli_connect("localhost","root","","testing");
$sql="SELECT * FROM review_table";
$res=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($res);
?>