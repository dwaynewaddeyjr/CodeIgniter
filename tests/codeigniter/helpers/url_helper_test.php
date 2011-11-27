<?php

require_once(BASEPATH.'helpers/url_helper.php');

class Url_helper_test extends CI_TestCase
{
	public function test_url_title()
	{
		$words = array(
			'foo bar /' 	=> 'foo-bar',
			'\  testing 12' => 'testing-12'
		);

		foreach ($words as $in => $out)
		{
			$this->assertEquals($out, url_title($in, 'dash', TRUE));
		}
	}

	// --------------------------------------------------------------------

	public function test_url_title_extra_dashes()
	{
		$words = array(
			'_foo bar_' 	=> 'foo_bar',
			'_What\'s wrong with CSS?_' => 'Whats_wrong_with_CSS'
		);

		foreach ($words as $in => $out)
		{
			$this->assertEquals($out, url_title($in, 'underscore'));
		}
	}

	// --------------------------------------------------------------------

	public function test_prep_url()
	{
		$this->assertEquals('http://codeigniter.com', prep_url('codeigniter.com'));
		$this->assertEquals('http://www.codeigniter.com', prep_url('www.codeigniter.com'));
	}

	// --------------------------------------------------------------------

	public function test_auto_link_url()
	{
		$strings = array(
			'www.codeigniter.com test' => '<a href="http://www.codeigniter.com">http://www.codeigniter.com</a> test',
			'This is my noreply@codeigniter.com test' => 'This is my noreply@codeigniter.com test',
		);

		foreach ($strings as $in => $out)
		{
			$this->assertEquals($out, auto_link($in, 'url'));
		}
	}
}