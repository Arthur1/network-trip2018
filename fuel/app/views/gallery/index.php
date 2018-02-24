<h1 class="blue-text">アルバム</h1>
<div class="row">
	<div class="col s12">
		<div class="carousel carousel-slider">
			<?php foreach ($data as $record): ?>
			<div class="carousel-item">
				<?= Asset::img('upload/gallery/'.$record['image'], ['alt' => 'image']);?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col s12 input-field">
		<?= Html::anchor('gallery/upload', '<i class="material-icons left">backup</i>アップロード', ['class' => 'teal btn']); ?>
	</div>
</div>
<div id="message" class="hide"><?= Session::get_flash('message'); ?></div>