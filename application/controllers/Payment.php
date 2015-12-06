<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '/core/base_payment.php';

class Payment extends Base_Payment
{
	public function index()
	{
		$input['amount'] = $this->input->get('amount', TRUE);
		$input['regions'] = $this->config->item('regions');
		$input['expYear'] = $this->config->item('exp_year');

		if (empty($input['amount'])) {
			echo $this->m->render('errors', array(
					'status' => 'error',
					'message' => 'No total amount recieved!'
				));
		} else {
			echo $this->m->render('payment', $input);
		}
	}
}
