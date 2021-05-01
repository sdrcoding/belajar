<?php
$server ='localhost';
$username ='root';
$pass ='';
$dbapp ='belajar';

$connect = mysqli_connect("$server", "$username","$pass","$dbapp");
if (!$connect){
	echo " Tidak dapat konek ke data base!";
}/*else{echo "Berhasil Connect ke data base ".$dbapp."";}*/

?>