<h1 class="blue-text">ノート削除</h1>
<?php
if (isset($error)) {
	echo '<h2 class="red-text">エラー</h2>';
	echo Html::ul((array) $error, ['class' => 'red-text']);
}
?>
<p>
	ノート「<?= $data['title']; ?>」を削除します。
</p>
<?= Form::open(); ?>
<div class="row">
	<div class="col s12">
		<?= Form::submit('return', '戻る', ['class' => 'btn grey']); ?>
		<?= Form::submit('submit', '削除', ['class' => 'btn red']); ?>
	</div>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>