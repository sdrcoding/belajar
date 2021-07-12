<a href="../app_crud/index.php">Back</a><br>
<?php 
include "../fungsi/koneksi_db.php";
$tglIn=date("Y-m-d H:i:s");
if(isset($_GET['tuj'])){
	if($_GET['tuj']=="formReg"){// Form Register..................................................
		?>
			<form action="../app_crud/action_view.php?tuj=actIn" method="post">
				Form Register</br>
				Nama Depan<input type="text" name="naDep" placeholder="Nama Depan"></br>
				Nama Belakang:<input type="text" name="naBel" placeholder="Nama Belakang"></br>
				Password: <input type="password" name="Passw"></br>
				<input type="submit" value="Submit">
			</form>
		<?php
	}elseif($_GET['tuj']=="actIn"){// Ini action form input.......................................
		$namaDepan=$_POST["naDep"];
		$namaBelakang=$_POST["naBel"];
		$passwordUs=$_POST["Passw"];
			$queIn="insert into user_belajar (namaDepan,namaBelakang,passwordUs,tglIn) values('$namaDepan','$namaBelakang','$passwordUs','$tglIn')";
			$inputUser = mysqli_query($connect,$queIn) or die("Ada yang salah!");
		if(!$inputUser){echo "Tidak berhasil diinput";}
		else{
      header("location:../app_crud/index.php?notif=Berhasil Input User ".$namaDepan." !");
    }
		
	}elseif($_GET['tuj']=="halEdit"){//Halaman Edit.............................................
    $queTam1Data = "SELECT idUser, namaDepan, namaBelakang, tglIn FROM user_belajar WHERE idUser='".$_GET["varEd"]."'";
    $hasilQue1 = mysqli_query($connect,$queTam1Data);
    $dat1 = mysqli_fetch_assoc($hasilQue1);
		?>
      <form action="../app_crud/action_view.php?tuj=actEdit&&varEd=<?=$_GET["varEd"];?>" method="post">
				Form Edit untuk <?=$dat1["namaDepan"]." ".$dat1["namaBelakang"];?> </br>
				Nama Depan: <input name="naDepE" type="text" value="<?=$dat1["namaDepan"];?>" maxlength="20"></br>
				Nama Belakang: <input type="text" name="naBelE" value="<?=$dat1["namaBelakang"];?>"></br>
				Password: <input type="password" name="PasswE"></br>
				<input type="submit" value="Submit">
			</form>
    <?php
  }elseif($_GET['tuj']=="actEdit"){//Action Edit ............................................
		$naDe=$_POST['naDepE'];
    $naBe=$_POST['naBelE'];
    $passW=$_POST['PasswE'];
    $idEd=$_GET["varEd"];
    if($naDe=="" || $naBe=="" || $passW==""){
      echo "Form tidak boleh ada yang kosong!";
      ?>
      </br><a href="../app_crud/action_view.php?tuj=halEdit&&varEd=<?= $idEd;?>">Back To Form Edit</a>
      <?php
    }else{
      $queEdit="UPDATE user_belajar SET namaDepan='$naDe', namaBelakang='$naBe', tglIn='$tglIn', passwordUs='$passW' WHERE idUser='$idEd'";
      $editAct = mysqli_query($connect,$queEdit) or die('Error Query Edit!');
      if ($editAct){header("location:../app_crud/index.php?notif=Berhasil Edit User ".$naDe." !");}
      else{header("location:../app_crud/index.php?notif=Tidak berhasil Edit User ".$naDe." !");}
    }
  }elseif($_GET['tuj']=="actDelete"){//Action Delete ..........................................
		//echo "Ini Action Delete, Untuk Id ". $_GET["varDel"];
    $idDelete = $_GET["varDel"];
    $nameDel = $_GET["varDelName"];
			$queDelUser="DELETE FROM user_belajar WHERE idUser='$idDelete'";
			$sudah_del = mysqli_query($connect,$queDelUser) or die('Error Query!');
			if($sudah_del){
				header("location:../app_crud/index.php?notif=Berhasil delete user ".$nameDel." !");
			}else{header("location:../app_crud/index.php?notif=Tidak berhasil delete user ".$nameDel." !");}
	}else{
		echo "Tujuan tidak jelas";
	}
	
}else{echo "parameter tujuan tidak jelas";}
?>