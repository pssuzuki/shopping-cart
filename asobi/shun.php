<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?php

$tsuki=$_POST['tsuki'];

$yasai[]='';
$yasai[]='ブロッコリー';
$yasai[]='カリフラワー';
$yasai[]='レタス';
$yasai[]='みつば';
$yasai[]='アスパラガス';
$yasai[]='セロリ';
$yasai[]='なす';
$yasai[]='ピーマン';
$yasai[]='オクラ';
$yasai[]='さつまいも';
$yasai[]='大根';
$yasai[]='ほうれん草';

print $tsuki;
print '月は';
print '<h3>'.$yasai[$tsuki].'</h3>';
print 'が旬です。';


?>
</form>
</body>
</html>
