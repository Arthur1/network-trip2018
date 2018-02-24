<h1 class="blue-text">アップロード</h1>
<?php
if (isset($error)) {
	echo '<h2 class="red-text">エラー</h2>';
	echo Html::ul((array) $error, ['class' => 'red-text']);
}
?>
<?= Form::open(['enctype' => 'multipart/form-data']); ?>
<div class="row">
	<div class="col s12 l7 file-field">
		<div class="btn teal">
			<span>画像</span>
			<?= Form::file('image'); ?>
		</div>
		<div class="file-path-wrapper">
			<input class="file-path validate" type="text">
		</div>
	</div>
	<div class="col s12 input-field">
		<?= Form::submit('submit', 'アップロード', ['class' => 'teal btn']); ?>
	</div>
</div>
<?= Form::close(); ?>