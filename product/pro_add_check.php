<?php 
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	$to_top='../staff_login/staff_login.html';
	print'ログインをしてください。<br />';
	print'<input type="button" onclick="location.href=\''.$to_top.'\'" value="ログイン画面へ" style="width:200">';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print'さんログイン中<br /><br />';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>

<?php
require_once('../common/common.php');
$post=sanitize($_POST);
$pro_name=$post['name'];
$pro_price=$post['price'];
$pro_gazou=$_FILES['gazou'];

if($pro_name=='')
{
	print'商品名が入力されていません。<br />';
}
else
{
	print'商品名';
	print $pro_name;
	print'<br />';
}

if(preg_match('/^[0-9]+$/',$pro_price)==0)
{
	print'価格をきちんと入力してください。<br />';
}
else
{
	print'価格：';
	print $pro_price;
	print'円<br />';
}
if($pro_gazou['size']>0)
{
	if($pro_gazou['size']>1000000)
	{
		print'画像が大き過ぎます';
	}
	else
	{
		move_uploaded_file($pro_gazou['tmp_name'],'./pics/'.$pro_gazou['name']);
		print'<img src="./pics/'.$pro_gazou['name'].'">';
		print'<br />';
	}
}
if($pro_name==''||preg_match('/^[0-9]+$/',$pro_price)==0||$pro_gazou['size']>1000000)
{
	print'<form>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</form>';
}
else
{
	print'上記の商品を追加します。<br />';
	print'<form method="post" action="pro_add_done.php">';
	print'<input type="hidden" name="name" value="'.$pro_name.'">';
	print'<input type="hidden" name="price" value="'.$pro_price.'">';
	print'<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	print'<br />';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'<input type="submit" value="ＯＫ">';
	print'</form>';
}

?>

</body>
</html>
