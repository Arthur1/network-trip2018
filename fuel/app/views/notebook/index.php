<h1 class="blue-text">ノート</h1>
<div id="message" class="hide"><?= $message; ?></div>
<div class="row">
	<?php foreach ($data as $record): ?>
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<div class="card-title pink-text"><?= $record['title']; ?></div>
				<div class="grey-text"><i class="material-icons tiny">access_time</i><?= date('Y/m/d H:i', $record['timestamp']); ?></div>
				<div class="md hide"><?= $record['content']; ?></div>
				<div class="right-align">
					<?= Html::anchor('notebook/edit/'.$record['id'], '<i class="material-icons small">mode_edit</i>'); ?>
					<?= Html::anchor('notebook/delete/'.$record['id'], '<i class="material-icons small">delete</i>', ['class' => 'red-text']); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div class="fixed-action-btn">
	<?= Html::anchor('notebook/create', '<i class="large material-icons">add</i>', ['class' => 'btn-floating btn-large teal']); ?>
</div>