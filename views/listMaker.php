<div class="col offset-m2 offset-l2 s24 m5 l5 z-depth-1 text-center">
	<?php if (is_array($myImgs)) {foreach ($myImgs as $img) { ?>
	<div class="m24 l24 s24 relative">
		<img src="<?= __BASE_URL__."/assets/img/gallery/".$img['url']?>"/>
		<div class="absolute text-red" style="top:0px;left:0px;">
			<a href="<?= __BASE_URL__ ?>/gallery/delete/<?= $img['id']?>" class="text-red">X</a>
		</div>
	</div>
	<?php }} else {?>
		<br/>
		Encore aucune image de prise !
		<br/>
		<br/>
	<?php } ?>
</div>
