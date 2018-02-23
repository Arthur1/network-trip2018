<?php
class Controller_Debug extends Controller_Template
{
	public function action_index()
	{
		$this->template->title = 'テスト';
		$this->template->contents = View::forge('debug/index');
	}
}