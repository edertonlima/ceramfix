<?php
	function anexo( $name, $file ){
		$_UP['pasta'] = './adjunto/';
		$_UP['tamanho'] = 1024 * 1024 * 2;
		$_UP['extensoes'] = array('pdf');
		$_UP['renomeia'] = true;
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
		//$_UP['erros'][5] = 'Somente arquivos do tipo PDF são aceitos';
	
		if ($file['error'] != 0) {
			$anexo['error'] = $_UP['erros'][$file['error']];
		}
	
		
		$extensao = strtolower(end(explode('.', $file['name'])));
		$name_file = strtolower(explode('.', $file['name'])[0]);
		
		/*
		if (array_search($extensao, $_UP['extensoes']) === false) {
			$anexo['error'] = $_UP['erros'][5];
			//echo "Por favor, envie apenas arquivo em PDF";
			//header("Location: http://200.41.114.26/?page_id=23&form=error-extensao");
			exit;
		}
		*/
	
		/*
		if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
		//echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
		header("Location: http://200.41.114.26/?page_id=23&form=error-size");
		exit;
		}
		*/
	
		if ($_UP['renomeia'] == true) {
			$nome_arquivo = str_replace(" ", "_", strtolower($name));
			$nome_final = $nome_arquivo.'-'.md5(time()).'.'.$extensao;
			$anexo['name'] = $name_file.'.'.$extensao;
		}else{
			$nome_final = $file['name'];
		}
	
		if (move_uploaded_file($file['tmp_name'], $_UP['pasta'] . $nome_final)) {
			$anexo['url'] = $_UP['pasta'] . $nome_final;
		}else{
			$error = $_UP['erros'][4];
		}

		return $anexo;
	}
?>