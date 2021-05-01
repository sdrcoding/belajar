<?php
//Rumus luas persegi panjang
function luasPersPanj($panjang,$lebar){
	$luasPersPan = $panjang * $lebar;
	return($luasPersPan);
	}
//........................................	
$P = 10;
$L = 5;	
$hasil = luasPersPanj($P,$L);

echo $hasil;
?>