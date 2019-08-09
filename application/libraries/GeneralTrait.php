<?php
trait GeneralTrait {
	public function view_output($output = [])
	{
		$this->load->view('index', $output);
	}
}
