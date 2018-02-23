<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<title><?= isset($title) ? $title : ''; ?> - ネ局旅行2018</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?= Asset::css('materialize.css'); ?>
	<?= Asset::render('add_css'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#2196f3">
	<meta name="msapplication-TileColor" content="#2196f3">
	<meta name="theme-color" content="#2196f3">
</head>
<body>
<header class="navbar-fixed">
	<nav>
		<div class="nav-wrapper blue">
			<?= Html::anchor('', 'ネ局旅行2018', ['class' => 'left hide-on-med-and-down brand-logo']); ?>
			<?= Html::anchor('', 'ネ局旅行2018', ['class' => 'hide-on-large-only', 'style' => 'font-size: 1.2em;']); ?>
			<a href="#" data-activates="mobile-menu" class="button-collapse left"><i class="material-icons">menu</i></a>
			<ul class="side-nav" id="mobile-menu">
				<li>
					<div class="user-view">
    					<div class="background">
    						<?= Asset::img('https://placehold.jp/150x150.png', ['alt' => 'background']); ?>
						</div>
						<a href="/mypage"><?= Asset::img('https://placehold.jp/150x150.png', ['class' => 'circle', 'alt' => 'user icon']); ?></a>
						<a href="/mypage"><span class="white-text name">あーさー</span></a>
						<a href="/mypage"><span class="white-text email">Arthur</span></a>
  					</div>
				</li>
				<li><?= Html::anchor('guide/items', '<i class="material-icons">card_travel</i>持ち物'); ?></li>
				<li><?= Html::anchor('guide/schedule', '<i class="material-icons">schedule</i>スケジュール'); ?></li>
				<li><?= Html::anchor('guide/contact', '<i class="material-icons">perm_phone_msg
</i>連絡先'); ?></li>
				<li><?= Html::anchor('gallery', '<i class="material-icons">photo_library</i>アルバム'); ?></li>
				<li><?= Html::anchor('notification', '<i class="material-icons">notifications</i>通知'); ?></li>
				<li class="divider"></li>
				<li><?= Html::anchor('logout', 'ログアウト'); ?></li>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li><?= Html::anchor('guide/items', '持ち物'); ?></li>
				<li><?= Html::anchor('guide/schedule', 'スケジュール'); ?></li>
				<li><?= Html::anchor('guide/contact', '連絡先'); ?></li>
				<li><?= Html::anchor('gallery', 'アルバム'); ?></li>
				<li><?= Html::anchor('notification', '通知'); ?></li>
				<li class="divider"></li>
				<li><?= Html::anchor('logout', 'ログアウト'); ?></li>
			</ul>
		</div>
	</nav>
</header>
<main class="container">
	<?= isset($contents) ? $contents : ''; ?>
</main>
<footer class="page-footer grey darken-1" id="footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">ネ局旅行2018</h5>
				<p class="grey-text text-lighten-4">2018/2/25(Sun)～2/27(tue)</p>
				<p class="grey-text text-lighten-4">at グリーンヒル八ヶ岳</p>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			&copy; 2018 Arthur
		</div>
	</div>
</footer>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<?= Asset::js('materialize.min.js'); ?>
<?= Asset::js('footerFixed.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$(".button-collapse").sideNav();
});
</script>
<?= Asset::render('add_js'); ?>
</body>
</html>
