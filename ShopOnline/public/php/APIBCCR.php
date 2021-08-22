<?php
	// https://gee.bccr.fi.cr/Indicadores/Suscripciones/WS/wsindicadoreseconomicos.asmx/ObtenerIndicadoresEconomicos?Indicador=317&FechaInicio=26/06/2021&FechaFinal=26/06/2021&Nombre=Mario&SubNiveles=N&CorreoElectronico=mario.quirosluna@ucr.ac.cr&Token=2CCC6CU05I
		
	$doc_c = new DOMDocument();
	$doc_v = new DOMDocument();

	date_default_timezone_set('UTC');

	$ind_econom_ws = 'https://gee.bccr.fi.cr/Indicadores/Suscripciones/WS/wsindicadoreseconomicos.asmx/ObtenerIndicadoresEconomicos';
	
	$fecha = date("d/m/Y");
	$nombre = 'Mario';
	$email = 'mario.quirosluna@ucr.ac.cr'; 
	$tokenBCCR = '2CCC6CU05I';

	$urlWS_c = $ind_econom_ws."?Indicador=317&FechaInicio=".$fecha."&FechaFinal=".$fecha."&Nombre=".$nombre."&SubNiveles=N&CorreoElectronico=".$email."&Token=".$tokenBCCR;
	$urlWS_v = $ind_econom_ws."?Indicador=318&FechaInicio=".$fecha."&FechaFinal=".$fecha."&Nombre=".$nombre."&SubNiveles=N&CorreoElectronico=".$email."&Token=".$tokenBCCR;

	$xml_c = @file_get_contents($urlWS_c);
	if ($xml_c === false) {
		$_SESSION['PURCHASE'] = "Not available";
	} else {   
		$doc_c->loadXML($xml_c);
		$ind_c = $doc_c->getElementsByTagName('INGC011_CAT_INDICADORECONOMIC')->item(0);
		$val_c = $ind_c->getElementsByTagName('NUM_VALOR')->item(0);
		$Purchase = substr($val_c->nodeValue,0,-6);
		$_SESSION['PURCHASE'] = $Purchase;
	}

	$xml_v = @file_get_contents($urlWS_v);
	if ($xml_v === false) {
		$_SESSION['SALE'] = "Not available";
	} else {
		$doc_v->loadXML($xml_v);
		$ind_v = $doc_v->getElementsByTagName('INGC011_CAT_INDICADORECONOMIC')->item(0);
		$val_v = $ind_v->getElementsByTagName('NUM_VALOR')->item(0);
		$Sale = substr($val_v->nodeValue,0,-6);
		$_SESSION['SALE'] = $Sale;
	}

?>

