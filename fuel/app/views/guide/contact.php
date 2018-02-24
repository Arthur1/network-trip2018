<h1 class="blue-text">連絡先</h1>
<ul class="collection">
	<li class="collection-item avatar">
		<?= Asset::img('contact/greenhill.jpg', ['class' => 'circle', 'alt' => 'グリーンヒル八ヶ岳']); ?>
		<span class="title pink-text">グリーンヒル八ヶ岳</span>
		<p>
			住所：<a href="https://www.google.ru/maps/place/%E3%82%B0%E3%83%AA%E3%83%BC%E3%83%B3%E3%83%92%E3%83%AB%E5%85%AB%E3%83%B6%E5%B2%B3/@35.8277795,138.3549241,17z/data=!3m1!4b1!4m5!3m4!1s0x601c6c7d17a4e58f:0x1207d57ac12f058c!8m2!3d35.8277752!4d138.3571128" target="_blank">山梨県北杜市長坂町中丸1622</a><br>
			電話：<a href="tel:0551327011">0551-32-7011</a>
			URL：<a href="http://www.kenkoumura.jp/" target="_blank">http://www.kenkoumura.jp/</a>
		</p>
	</li>
	<li class="collection-item avatar">
		<?= Asset::img('contact/toyota.png', ['class' => 'circle', 'alt' => 'グリーンヒル八ヶ岳']); ?>
		<span class="title pink-text">トヨタレンタカー自由が丘店</span>
		<p>
			住所：<a href="https://www.google.co.jp/maps/place/%E3%83%88%E3%83%A8%E3%82%BF%E3%83%AC%E3%83%B3%E3%82%BF%E3%82%AB%E3%83%BC+%E8%87%AA%E7%94%B1%E3%81%8C%E4%B8%98%E5%BA%97/@35.6033979,139.6635001,17z/data=!3m1!4b1!4m5!3m4!1s0x6018f51be3f740ed:0xd1b08a0d74cfd150!8m2!3d35.6033943!4d139.6653142" target="_blank">東京都世田谷区奥沢6-19-23</a><br>
			電話：<a href="tel:0337034491">03-3703-4491</a><br>
		</p>
	</li>
	<?php foreach ($data as $record): ?>
	<li class="collection-item avatar">
		<?php if ($record['image'] === 'nikeya.jpg'): ?>
		<?= Asset::img('contact/'.$record['image'], ['alt' => $record['name'], 'class' => 'circle kurukuru']); ?>
		<?php else: ?>
		<?= Asset::img('contact/'.$record['image'], ['alt' => $record['name'], 'class' => 'circle']); ?>
		<?php endif; ?>
		<span class="title pink-text"><?= $record['name']; ?></span>
		<p>
			電話：<a href="tel:<?= str_replace('-', '', $record['tel']); ?>"><?= $record['tel'] ?></a>
			<?php if (!empty($record['tel2'])): ?>
			<br>電話：<a href="tel:<?= str_replace('-', '', $record['tel2']); ?>"><?= $record['tel2'] ?></a>
			<?php endif; ?>
		</p>
	</li>
	<?php endforeach; ?>
</ul>
<style>
.kurukuru {
	-webkit-animation: spin 1.5s linear infinite;
	animation: spin 1.5s linear infinite;
}
@-webkit-keyframes spin {
	0% {-webkit-transform: rotate(0deg);}
	100% {-webkit-transform: rotate(360deg);}
}
@keyframes spin {
	0% {transform: rotate(0deg);}
	100% {transform: rotate(360deg);}
}
</style>