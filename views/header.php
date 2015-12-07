<header class="z-depth-2 margin-bottom">
	Camagru
	<?php if ($login) { ?>
		<a href="<?= __BASE_URL__ ?>/gallery">Gallery</a>
		<a href="<?= __BASE_URL__ ?>/user/maker">Maker</a>
		<a href="<?= __BASE_URL__ ?>/user/logout">Logout</a>
	<?php } else {?>
		<a href="<?= __BASE_URL__ ?>/user/register">Register</a>
		<a href="<?= __BASE_URL__ ?>/user">login</a>
	<?php } ?>
</header>
