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
	<style>
		html, body {
			height: 100%;
		}
		#allWrapper {
			height: 100vh;
			width: 100%;
			position: relative;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>
<div class="blue" id="allWrapper">
<main class="container">
<?= Form::open(); ?>
<div class="row white" class="z-depth-3">
	<div class="col s12 l7 input-field">
		<?= Form::input('username', $data['username']); ?>
		<?= Form::label('ID', 'username'); ?>
	</div>
	<div class="col s12 l7 input-field">
		<?= Form::password('password', $data['password']); ?>
		<?= Form::label('PASSWORD', 'password'); ?>
	</div>
	<div class="col s12 l7 input-field">
		<?= Form::submit('submit', 'ログイン', ['class' => 'btn teal']); ?>
	</div>
	<div class="col s12 input-field red-text">
		<?= isset($error) ? $error : ''; ?>
	</div>
</div>
<?= Form::csrf(); ?>
<?= Form::close(); ?>
</main>
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<?= Asset::js('materialize.min.js'); ?>
<?= Asset::render('add_js'); ?>
</body>
</html>
