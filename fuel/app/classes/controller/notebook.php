<?php
class Controller_Notebook extends Controller_Template
{
	public function action_index()
	{
		$this->template->title = 'ノート';
		$this->template->contents = View::forge('notebook/index');
		Asset::js(['marked.js', 'notebook/index.js'], [], 'add_js');
		$query = DB::select()
					->from('notebook')
					->order_by('timestamp', 'desc');
		try
		{
			$data = $query->execute()->as_array();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラーです。';
			$data = [];
		}
		$this->template->contents->data = $data;
		$this->template->contents->message = Session::get_flash('message');
	}

	public function get_create()
	{
		Asset::css(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'], [], 'add_css');
		Asset::js(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js', 'notebook/edit.js'], [], 'add_js');
		$this->template->title = 'ノート作成';
		$this->template->contents = View::forge('notebook/create');
	}

	public function post_create()
	{
		Asset::css(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'], [], 'add_css');
		Asset::js(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js', 'notebook/edit.js'], [], 'add_js');
		$this->template->title = 'ノート作成';
		$this->template->contents = View::forge('notebook/create');
		$this->template->contents->data = Input::post();
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
			return;
		}
		$val = Validation::forge();
		$val->add('title', 'タイトル')->add_rule('required');
		$val->add('content', '内容')->add_rule('required');
		if (! $val->run())
		{
			$this->template->contents->error = $val->error();
			return;
		}
		$query = DB::insert('notebook')
					->set([
						'title' => Input::post('title'),
						'content' => Input::post('content'),
						'timestamp' => time(),
					]);
		try
		{
			$query->execute();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラーです。';
			return;
		}
		Session::set_flash('message', 'ノートの作成に成功しました！');
		Response::redirect('notebook');
	}

	public function get_edit($id)
	{
		Asset::css(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'], [], 'add_css');
		Asset::js(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js', 'notebook/edit.js'], [], 'add_js');
		$this->template->title = 'ノート編集';
		$this->template->contents = View::forge('notebook/edit');
		$query = DB::select()
					->from('notebook')
					->where('id', '=', $id);
		try
		{
			$data = $query->execute()->as_array();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラーです。';
			return;
		}
		if ($data === [])
		{
			throw new HttpNotFoundExcption;
		}
		$this->template->contents->data = $data[0];
	}

	public function post_edit($id)
	{
		Asset::css(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css'], [], 'add_css');
		Asset::js(['https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js', 'notebook/edit.js'], [], 'add_js');
		$this->template->title = 'ノート編集';
		$this->template->contents = View::forge('notebook/edit');
		$this->template->contents->data = Input::post();
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
			return;
		}
		$val = Validation::forge();
		$val->add('title', 'タイトル')->add_rule('required');
		$val->add('content', '内容')->add_rule('required');
		if (! $val->run())
		{
			$this->template->contents->error = $val->error();
			return;
		}
		$query = DB::update('notebook')
					->set([
						'title' => Input::post('title'),
						'content' => Input::post('content'),
						'timestamp' => time(),
					])
					->where('id', '=', $id);
		try
		{
			$query->execute();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラーです。';
			return;
		}
		Session::set_flash('message', 'ノートの編集に成功しました！');
		Response::redirect('notebook');
	}

	public function get_delete($id)
	{
		$this->template->title = 'ノート削除';
		$this->template->contents = View::forge('notebook/delete');
	}
}