<div id="maker" class="col offset-m2 offset-l2 s24 m13 l13 blue margin-bottom relative">
	<img id="toHide" src="<?= __BASE_URL__ ?>/assets/img/webcam-logo.png" class="block center-block" onclick="uploadFile()"/>
	<video class="relative block center-block hidden" style="width: 320px;height:200px"></video>
	<img id="mount" class="absolute" src="" />
	<canvas class="hidden" id="canvas"></canvas>
	<div class="col s24 m24 l24 text-center">
		<div class="text-red"><?= getPostError("<p>", "</p>"); ?></div>
		<button class="block center-block" id="startButton" disabled>Take Picture</button>
	</div>
	<form id="makerForm" method="POST" action="<?= __BASE_URL__ ?>/user/addPicture" class="hidden">
		<input id="photoForm" name="photoWebcam"/>
		<input id="mountForm" name="mountId"/>
	</form>

	<form id="fileUpForm" method="POST" action="<?= __BASE_URL__ ?>/user/addPictureFile" enctype= "multipart/form-data" class="hidden">
		<input type="file" name="photoForm" id="inputForm" onchange="uploadFileChange()"/>
		<input id="mountFormFile" name="mountId"/>
	</form>
	<div class="col m24 s24 l24 margin-top margin-bottom">
	<h3>Montage :</h3>
	<?php foreach ($imgSample as $value) { ?>
			<img class= "col offset-s1 offset-m1 offset-l1 m2 s2 l2" onclick="setPicture(this, <?= $value['id'] ?>)" src="<?= __BASE_URL__ ?>/assets/img/sample/<?= $value['url'] ?>">
	<?php }?>
	</div>
</div>

<script src="<?= __BASE_URL__ ?>/assets/js/webcam-catcher.js" type="text/javascript" charset="utf-8"></script>
