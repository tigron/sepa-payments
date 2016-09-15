<?php
/**
 * Organization class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Sepa;

class Transaction {

	/**
	 * Identification
	 *
	 * @var array $paymentIdentification
	 * @access public
	 */
	public $paymentIdentification;

	/**
	 * amount (€)
	 *
	 * @var double $amount
	 * @access public
	 */
	public $amount = null;

	/**
	 * creditorAgent (BIC)
	 *
	 * @var string $creditorAgent
	 * @access public
	 */
	public $creditorAgent = null;

	/**
	 * Creditor
	 *
	 * @access public
	 */
	public $creditor = null;

	/**
	 * CreditorAccount (IBAN)
	 *
	 * @var string $creditorAccount
	 * @access public
	 */
	public $creditorAccount = null;

	/**
	 * Structured message
	 *
	 * @access public
	 * @var string $structured_message
	 */
	public $structured_message = null;

	/**
	 * Unstructured message
	 *
	 * @access public
	 * @var string $unstructured_message
	 */
	public $unstructured_message = null;

	/**
	 * Render
	 *
	 * @access public
	 * @return string $xml
	 */
	public function render() {
		$template = Template::get();
		$template->assign('transaction', $this);
		return $template->render('object/transaction.twig');
	}

}
