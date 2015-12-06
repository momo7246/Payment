<?php

require_once APPPATH . '/core/base_payment.php';

class Paypal extends Base_Payment
{
	/**
	 * Test Account: 4525918599888683
	 * Exp: 122020
	 * CVV: 123
	 * Card type: Visa
	 */
	public function processPayment()
	{
		$data = $this->input->post();

		if ($this->config->item('enable.sandbox')) {
			$config = $this->config->item('paypal_sandbox_config');
			$endpoint = $this->config->item('sandbox.endpoint');
		} else {
			$config = $this->config->item('paypal_config');
			$endpoint = $this->config->item('endpoint');
		}

		$data = array_merge($data, $config, $this->getDefaultParameters());
		$data['exp'] = $data['expMonth'].$data['expYear'];
		$requestParams = $this->mapping($data);

		$query = http_build_query($requestParams);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_URL, $endpoint);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $query);

		$response = curl_exec($curl);
		$responseArr = array();
  		parse_str($response, $responseArr);
		curl_close($curl);

		echo json_encode($responseArr);
	}

	protected function getDefaultParameters()
	{
		return array(
			'method' 	=> 'DoDirectPayment',
			'currency' 	=> 'USD',
			'action' 	=> 'Sale',
			'ipAddress' => $_SERVER['REMOTE_ADDR']
		);
	}

	protected function mapping(array $data) 
	{
		$mappedData = array();
		$mapping = $this->config->item('mapping_paypal');
		foreach ($mapping as $key => $value) {
			if ($data[$value]) {
				$mappedData[$key] = $data[$value];
			}
		}

		return $mappedData;
	}
}
