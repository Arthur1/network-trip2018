<?php
class Controller_Notification extends Controller_Hybrid
{
	protected $format = 'json';

	public function action_index()
	{
		Authplus::check_and_redirect([1]);
		$this->template->title = '通知一覧';
		$this->template->contents = View::forge('notification/index');
		Asset::js(['notification.js'], [], 'add_js');
		$query = DB::select()
					->from('notification_content')
					->order_by('id', 'desc')
					->limit(10);
		try
		{
			$data = $query->execute()->as_array();
		}
		catch (DatabaseException $e)
		{
			$data = [];
		}
		$this->template->contents->data = $data;
	}

	public function get_deliver()
	{
		Authplus::check_and_redirect([1]);
		$this->template->title = '通知一覧';
		$this->template->contents = View::forge('notification/deliver');
	}

	public function post_deliver()
	{
		Authplus::check_and_redirect([1]);
		$this->template->title = '通知一覧';
		$this->template->contents = View::forge('notification/deliver');
		$body = Input::post('body');
		$this->template->contents->body = $body;
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください';
			return;
		}
		$val = Validation::forge();
		$val->add('body', 'メッセージ')
			->add_rule('required');
		if (! $val->run())
		{
			$this->template->contents->error = $val->error();
			return;
		}
		$content_query = DB::insert('notification_content')
							->set([
								'body' => $body,
								'timestamp' => time(),
							]);
		$endpoints_query = DB::select()
							->from('notification_endpoints');
		try
		{
			$content_query->execute();
			$endpoints = $endpoints_query->execute()->as_array();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラー';
			return;
		}
		Config::load('secret');
		$webpush = new \Minishlink\WebPush\WebPush([
			'VAPID' =>  [
				'subject' => Uri::create(''),
				'publicKey' => Config::get('vapid_public_key'),
				'privateKey' => Config::get('vapid_private_key'),
			],
		]);
		$payload = [
			'title' => 'ネ局旅行2018',
			'body' => Input::post('body'),
			'url' => Uri::create(''),
			'icon' => Uri::create('/android-chrome-256x256.png'),
		];
		foreach ($endpoints as $record)
		{
			$webpush->sendNotification($record['endpoint'], json_encode($payload), $record['key'], $record['token']);
		}
		$webpush->flush();
		Session::set_flash('message', '通知の配信に成功しました！');
		Response::redirect('notification');
	}

	public function post_register()
	{
		$data = Input::post();
		$query = DB::query('
			INSERT IGNORE notification_endpoints
			(endpoint, `key`, token)
			VALUES
			(:endpoint, :key, :token)
		');
		foreach ($data as $key => $value)
		{
			$query->param($key, $value);
		}
		try
		{
			$query->execute();
			return $this->response($data);
		}
		catch (DatabaseException $e)
		{
			return $this->response(['error' => 'Database Error'], 400);
		}
	}
}