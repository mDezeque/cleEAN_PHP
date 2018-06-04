<?php	
	function calculCleEAN($CodeBarre){
		$chiffreCB = mb_strimwidth( $CodeBarre , 4 , 12); // On elève le "EAN "
		$somme = 0;
		
		//Si le chiffreCodeBare est trop petite alors quitter le programme
		if(strlen($chiffreCB)<12){
			echo " - Mauvaise cleEAN \n"; exit();
		}
		
		// PARTIE calcul 1
		for($i = 0; $i<11; $i++){ //On parcourt les chiffres et on calcul la somme
			if ($i%2==0){
				$somme = $somme + (int)$chiffreCB[$i];
			}else{
				$somme = $somme + (int)$chiffreCB[$i]*3;
			}
		}
		
		// PARTIE calcul 2
		if($somme%10==0){
			return 0;
		} 
		return 10-$somme%10;
	}
	
	$cle1="EAN 303792016200";
	$cle1EAN = calculCleEAN($cle1);
	echo " - Cle EAN 1 : $cle1EAN \n";
	
	$cle2="EAN 603792016200";
	$cle2EAN = calculCleEAN($cle2);
	echo " - Cle EAN 2 : $cle2EAN \n";
?>