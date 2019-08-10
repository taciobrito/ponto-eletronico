<?php
trait GeneralCallbacksTrait {
	public function callback_banco_horas($value = '', $primary_key = '') {
		return $value ? 'Sim' : 'Não';
	}

	public function callback_format_dates($value, $primary_key = '') {
		if (empty($value)) {
			return '-- --';
		}
		return formatDate($value);
	}

	public function callback_format_timestamps($value, $primary_key = '') {
		if (empty($value)) {
			return '-- --';
		}
		return formatDateTimestamps($value);
	}

	public function time_callback_mask($value = '', $primary_key = null, $field)
	{
    	return '<input id="field-'.$field->name.'" class="form-control time" name="'.$field->name.'" type="text" value="'.$value.'">';
	}
}
