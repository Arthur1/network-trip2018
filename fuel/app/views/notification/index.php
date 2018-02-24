<h1 class="blue-text">通知</h1>
<p>
	Sevice Worker対応の端末に通知を配信できます。<s>Discordじゃダメなんですかね…</s>
</p>
<div class="row">
	<div class="col s12 input-field">
		<?= Html::anchor('notification/deliver', '<i class="material-icons left">notifications_active</i>通知を配信する', ['class' => 'btn teal']); ?>
	</div>
</div>
<h2 class="pink-text">配信履歴</h2>
<div class="collection">
	<?php foreach ($data as $record): ?>
	<div class="collection-item">
		<div><?= $record['body']; ?></div>
		<div class="right-align grey-text"><?= date('Y/m/d H:i', $record['timestamp']); ?></div>
	</div>
	<?php endforeach; ?>
</div>
<div class="hide" id="message"><?= Session::get_flash('message'); ?></div>