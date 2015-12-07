<div>
	<div class="col offset-m8 offset-l8 s24 m8 l8 z-depth-2 margin-bottom margin-top-md">
		<form class="padding-base text-center" method="POST" action="<?= __BASE_URL__?>/user/connect">
			<h3>Login</h3>
			<div class="text-red"><?= getPostError("<p>", "</p>"); ?></div>
			<input class="col s24 m24 l24 text-center margin-bottom-xs" name="email" type="email" placeholder="Email"/>
			<input class="col s24 m24 l24 text-center margin-bottom-xs" name="password" type="password" placeholder="Password"/>
			<button>Login</button><br>

			<a href="<?= __BASE_URL__ ?>/user/forget">Mot de passe oublié ?</a>
		</form>
	</div>
</div>
