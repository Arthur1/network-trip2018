<h1 class="blue-text">ノート作成</h1>
<?php
if (isset($error)) {
	echo '<h2 class="red-text">エラー</h2>';
	echo Html::ul((array) $error, ['class' => 'red-text']);
}
?>
<?= Form::open(); ?>
<div class="row">
	<div class="col s12 l7 input-field">
		<?= Form::input('title', isset($data['title']) ? $data['title'] : ''); ?>
		<?= Form::label('タイトル', 'title'); ?>
	</div>
</div>

<?= Form::textarea('content', isset($data['content']) ? $data['content'] : '', ['rows' => 8, 'cols' => 40]); ?>
<div class="row">
	<div class="col s12">
		<?= Form::submit('submit', '作成', ['class' => 'btn teal']); ?>
	</div>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>