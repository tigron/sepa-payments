<?php
/**
 * Organization class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Sepa;

class Payment {

	/**
	 * Identification
	 *
	 * @var array $identification
	 * @access public
	 */
	public $paymentInformationIdentification;

	/**
	 * Requested Execution Date
	 *
	 * @var Datetime $datetime
	 * @access public
	 */
	public $requestedExecutionDate = null;

	/**
	 * DebtorAccount (IBAN)
	 *
	 * @var string $debtorAccount
	 * @access public
	 */
	public $debtorAccount = null;

	/**
	 * DebtorAgent (BIC)
	 *
	 * @var string $debtorAgent
	 * @access public
	 */
	public $debtorAgent = null;

	/**
	 * Debtor
	 *
	 * @access public
	 */
	public $debtor = null;

	/**
	 * Transactions
	 *
	 * @access public
	 * @param array $transactions
	 */
	public $transactions = [];

	/**
	 * Render
	 *
	 * @access public
	 * @return string $xml
	 */
	public function render() {
		$template = Template::get();
		$template->assign('payment', $this);
		return $template->render('object/payment.twig');
	}

}
