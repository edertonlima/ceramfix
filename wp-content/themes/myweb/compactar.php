<?php 

$files = array();

foreach ($_POST as $key => $value)
    $files[] = (htmlspecialchars($value));
    //echo htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

# define file array
/*$files = array(
    'http://google.com/images/logo.png',
    'http://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Wikipedia-logo-en-big.png/220px-Wikipedia-logo-en-big.png',
);*/

//echo '<br><br>';
//print_r($files);

# create new zip object
$zip = new ZipArchive();

# create a temp file & open it
$tmp_file = tempnam('./temp_zip', '');
$zip->open($tmp_file, ZipArchive::CREATE);

# loop through each file
foreach ($files as $file) {
    # download file
    $download_file = file_get_contents($file);

    #add it to the zip
    $zip->addFromString(basename($file), $download_file);
}

/*$conteudo_php = $zip->statIndex(0);
$zip->deleteName($conteudo_php['name']);*/

# close zip
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename="ceramfix-media-download.zip"');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);

?>