<?php
class Controller_Index extends Controller_Template
{
	public function before()
	{
		parent::before();
		Authplus::check_and_redirect([1]);
	}
	public function action_index()
	{
		Asset::css(['jquery.yycountdown.css'], [], 'add_css');
		Asset::js(['jquery.yycountdown.min.js', 'index.js'], [], 'add_js');
		$this->template->title = 'トップページ';
		$this->template->contents = View::forge('index');
	}
}