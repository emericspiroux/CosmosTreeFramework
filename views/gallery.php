<div class="m15 s24 l15 center-block">
	<?php if ($allImgs) {foreach ($allImgs as $key => $img) {?>
	<div class="col m24 l24 s24 z-depth-1 text-center margin-bottom padding-top padding-bottom-xs">
		<img class="block center-block galleryImg" src="<?= __BASE_URL__ ?>/assets/img/gallery/<?= $img['url']?>"/>
		<b class="col m24 l24 s24"><?= $img['pseudo'] ?> - <?= $img['nb_like']?>


		<?php if (!$img['liked']) {?>
			<a href="<?= __BASE_URL__ ?>/gallery/like/<?= $img['id'] ?>">like</a></b>
		<?php } else { ?>
			<a href="<?= __BASE_URL__ ?>/gallery/unlike/<?= $img['id'] ?>">unlike</a></b>
		<?php } ?>



		<p class="col m24 l24 s24">Commentaires :</p>
		<?php if ($img['comment']){ foreach ($img['comment'] as $key => $comment) { ?>
			<b><?= $comment['pseudo'] ?>:</b> <?= $comment['text'] ?><br/>
		<?php }}else {?>
			<b class="col m24 l24 s24">Pas encore de commentaires sur cette image</b>
		<?php }?>
		<form method="POST" action="<?= __BASE_URL__ ?>/gallery/addComment" class="margin-top">
			<input name="comment" placeholder="Commentaire..." class="text-align-left"/>
			<input type="hidden" name="id_gallery" value="<?=$img['id']?>">
		</form>
	</div>
	<?php }}else{?>
		<div class="col m24 l24 s24 z-depth-1 text-center margin-bottom padding-top padding-bottom-xs">
			<b class="col m24 l24 s24">Pas encore d'image... soyez le premier !</b>
		</div>
	<?php } ?>
	<div class="m24 s24 l24 text-center">
		<?php if ($nbImgs > 10) {
			for ($i=0; $i < $nbImgs; $i += 10) {?>
				<a href="<?= __BASE_URL__ ?>/gallery/index/<?= $i ?>/<?= $i + 10 ?>"><?= $i/10 + 1 ?></a>
		<?php } }?>
	</div>
</div>
