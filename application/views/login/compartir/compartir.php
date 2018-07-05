<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="col-md-12 col-sm-12 col-xs-12" align="center">
<br>
<br>
<?php if ($comparte): ?>
<?php foreach ($comparte->result() as $data): ?>
	<img class="img-responsive" SRC="<?=$this->config->base_url()?>./uploads/img/<?=$data->info_comparte_espa?>" class="animated fadeInLeft"  BORDER=0 ALT="">
<?php endforeach ?>
<?php else: ?>
	<?=redirect('login')?>
<?php endif ?>
</div>
</body>
</html>