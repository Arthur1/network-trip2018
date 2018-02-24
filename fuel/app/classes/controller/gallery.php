<?php
class Controller_Gallery extends Controller_Template
{
	public function before()
	{
		parent::before();
		Authplus::check_and_redirect([1]);
	}

	public function action_index()
	{
		$this->template->title = 'アルバム';
		$this->template->contents = View::forge('gallery/index');
		Asset::js(['gallery.js'], [], 'add_js');
		$query = DB::select()
					->from('gallery')
					->order_by('id', 'desc');
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

	public function get_upload()
	{
		$this->template->title = 'アップロード';
		$this->template->contents = View::forge('gallery/upload');
	}

	public function post_upload()
	{
		$this->template->title = 'アップロード';
		$this->template->contents = View::forge('gallery/upload');
		if (! Security::check_token())
		{
			$this->template->contents->error = 'お手数ですが、再度送信してください。';
		}
		Upload::process([
			'path' => DOCROOT.'assets/img/upload/gallery',
			'ext_whitelist' => ['jpg', 'jpeg', 'png', 'gif'],
			'new_name' => time(),
			'auto_rename' => true,
			'overwrite' => true,
			'max_size' => 10 * 1024 * 1024,
			'create_path' => true,
		]);
		if (! Upload::is_valid())
		{
			$errors = Upload::get_errors('image')['errors'];
			$this->template->contents->error = [];
			foreach ($errors as $error)
			{
				$this->template->contents->error[] = $error['message'];
			}
			return;
		}
		Upload::save();
		$query = DB::insert('gallery')
					->set(['image' => Upload::get_files('image')['saved_as']]);
		try
		{
			$query->execute();
		}
		catch (DatabaseException $e)
		{
			$this->template->contents->error = 'データベースエラー';
			return;
		}
		Session::set_flash('message', '画像のアップロードに成功しました！');
		Response::redirect('gallery');
	}
}