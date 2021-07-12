<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index CRUD</title>
</head>

<body>
	<a href="../app_crud/action_view.php?tuj=formReg">Form Register</a><br><br>
<?php 
  if (isset($_GET["notif"])){echo $_GET["notif"];}else{} //Menampilkan notifikasi
?>
<table width="" border="1" cellspacing="0" cellpadding="3">
  <tbody>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Tanggal Daftar</td>
      <td>Action</td>
    </tr>
<?php
    include "../fungsi/koneksi_db.php";
    $queTamData = "SELECT idUser, namaDepan, namaBelakang, tglIn FROM user_belajar";
    $hasilQue = mysqli_query($connect,$queTamData);
    $no=1;
    while ($dat = mysqli_fetch_assoc($hasilQue)){
?>
    <tr>
      <td><?= $no;?></td>
      <td><?= $dat["namaDepan"]." ".$dat["namaBelakang"];?></td>
      <td><?= $dat["tglIn"];?></td>
      <td>
        <a href="../app_crud/action_view.php?tuj=halEdit&&varEd=<?= $dat["idUser"];?>">Edit</a> | 
        <a href="../app_crud/action_view.php?tuj=actDelete&&varDel=<?= $dat["idUser"];?>&&varDelName=<?= $dat["namaDepan"];?>">Delete</a>
      </td>
    </tr>
<?php $no++; }?>
  </tbody>
</table>

</body>
</html>