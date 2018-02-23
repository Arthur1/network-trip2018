<?php
class Controller_Guide extends Controller_Template
{
	public function action_items()
	{
		$this->template->title = '持ち物';
		$this->template->contents = View::forge('guide/items');
	}

	public function action_schedule()
	{
		$this->template->title = 'スケジュール';
		$this->template->contents = View::forge('guide/schedule');
	}

	public function action_stay()
	{
		$this->template->title = '宿泊先';
		$this->template->contents = View::forge('guide/stay');
	}

	public function action_contact()
	{
		$this->template->title = '連絡先';
		$this->template->contents = View::forge('guide/contact');
	}
}