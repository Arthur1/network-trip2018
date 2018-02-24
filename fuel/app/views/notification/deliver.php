<h1 class="blue-text">通知配信</h1>
<?php
if (isset($error)) {
	echo '<h2 class="red-text">エラー</h2>';
	echo Html::ul((array) $error, ['class' => 'red-text']);
}
?>
<?= Form::open(); ?>
<div class="row">
	<div class="col s12 l7 input-field">
		<?= Form::input('body', isset($body) ? $body : ''); ?>
		<?= Form::label('メッセージ', 'body'); ?>
	</div>
	<div class="col s12 input-field">
		<?= Form::submit('submit', '送信', ['class' => 'teal btn']); ?>
	</div>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>