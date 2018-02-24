<?php
class Controller_Guide extends Controller_Template
{
	public function before()
	{
		parent::before();
		Authplus::check_and_redirect([1]);
	}

	public function action_items()
	{
		$this->template->title = '持ち物';
		$this->template->contents = View::forge('guide/items');
	}

	public function action_schedule()
	{
		Asset::js(['schedule.js'], [], 'add_js');
		$this->template->title = 'スケジュール';
		$this->template->contents = View::forge('guide/schedule');
	}

	public function action_contact()
	{
		$this->template->title = '連絡先';
		$this->template->contents = View::forge('guide/contact');
		$query = DB::select()
					->from('contact')
					->order_by('id', 'asc');
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
}