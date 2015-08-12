<?php

function pembulatan($uang)
{
	$uang=round($uang);
	$ratusan=substr($uang, -3);

	if($ratusan<500){
		$akhir=$uang-$ratusan;
	}else{
		$akhir=$uang+(1000-$ratusan);
	}

	return $akhir;
}