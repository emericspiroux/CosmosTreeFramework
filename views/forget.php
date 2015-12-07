<div>
	<div class="col offset-m8 offset-l8 s24 m8 l8 z-depth-2 margin-bottom margin-top-md">
		<form class="padding-base text-center" method="POST" action="<?= __BASE_URL__?>/user/resetPassword">
			<h3>Sending new password</h3>
			<?php if ($sent) {?>
			<p class="text-green">Email was sent.</p>
			<?php } ?>
			<div class="text-red"><?= getPostError("<p>", "</p>"); ?></div>
			<input class="col s24 m24 l24 text-center margin-bottom-xs" name="email" type="email" placeholder="Email"/>
			<button>Send me new a password</button>
		</form>
	</div>
</div>
