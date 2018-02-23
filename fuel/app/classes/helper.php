<?php
class Helper
{
	public static function isset($val, $default = null)
	{
		return isset($val) ? $val : $default;
	}
}