<?php
class Controller_Login extends Controller
{
	public function action_index()
	{
		$view = View::forge('login');
		$url = Session::get_flash('url', '/');
        Session::keep_flash('url');
        $view->data = [
        	'username' => null,
        	'password' => null,
        ];
		if (Input::post('submit'))
		{
			$view->data = Input::post();
			if (! Security::check_token())
			{
				$view->error = 'お手数ですが、再度送信してください。';
				return $view;
			}
			if (! Auth::login())
			{
				$view->error = 'ログインに失敗しました。';
				return $view;
			}
			Response::redirect($url);
		}
		return $view;
	}
}