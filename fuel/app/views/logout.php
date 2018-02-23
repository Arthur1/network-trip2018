<h1 class="blue-text">ログアウト</h1>
<p>
	ログアウトが完了しました。5秒後にログインページに戻ります。
</p>

<script>
setTimeout(function(){
	location.href = '/login';
}, 5 * 1000);
</script>