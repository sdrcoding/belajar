<?php
if(isset($_POST['subFrm'])){
	$nilai = $_POST['inputT'];
	if($nilai==""){echo "Input Text Kosong!";}
	echo $nilai;
?>
<br /><a href="../code_dasar/dasarPHP1.php">Kembali Ke form</a>
<?php
	}
else{echo "Belum Submit";}
	;
?>