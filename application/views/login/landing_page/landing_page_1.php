<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php foreach ($landing->result() as $data): ?>
<meta http-equiv="refresh" content="0; url=<?=$data->url?>">
<?php endforeach ?>
<body>
</body>
</html>