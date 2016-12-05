<?php
/**
 * Creditfile class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Sepa\File;

class Credit {

	/**
	 * Message Identification
	 *
	 * @access public
	 * @var string $messageIdentification
	 */
	public $messageIdentification = null;

	/**
	 * InitiatingParty
	 *
	 * @access public
	 * @var Organization $initiatingParty
	 */
	public $initiatingParty = null;

	/**
	 * Payments
	 *
	 * @access public
	 * @var array $payments
	 */
	public $payments = [];

	/**
	 * Render
	 *
	 * @access public
	 */
	public function render() {
		$template = \Tigron\Sepa\Template::get();
		$template->assign('credit_file', $this);
		return $template->render('credit.twig');
	}

	/**
	 * Count transactions
	 *
	 * @access public
	 */
	public function count_transactions() {
		$count = 0;
		foreach ($this->payments as $payment) {
			$count += count($payment->transactions);
		}
		return $count;
	}
}
