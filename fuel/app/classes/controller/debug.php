<?php
class Controller_Debug extends Controller_Template
{
	public function before()
	{
		parent::before();
		Authplus::check_and_redirect([1]);
	}

	public function action_index()
	{
		$this->template->title = 'テスト';
		$this->template->contents = View::forge('debug/index');
	}

	public function action_register($name, $password, $email)
	{
		Auth::create_user($name, $password, $email, 1, []);
		$this->template->contents = 'Success';
	}
}