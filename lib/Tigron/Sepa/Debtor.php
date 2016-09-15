<?php
/**
 * Debtor class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Sepa;

class Debtor {

	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = null;

	/**
	 * Country
	 *
	 * The country ISO2 code
	 *
	 * @var string $country
	 * @access public
	 */
	public $country = null;

	/**
	 * Street
	 *
	 * @access public
	 * @var string $street
	 */
	public $street = null;

	/**
	 * housenumber
	 *
	 * @access public
	 * @var string $housenumber
	 */
	public $housenumber = null;

	/**
	 * zipcode
	 *
	 * @access public
	 * @var string $zipcode
	 */
	public $zipcode = null;

	/**
	 * city
	 *
	 * @access public
	 * @var string $city
	 */
	public $city = null;

	/**
	 * Set identification
	 *
	 * @access public
	 * @param string
	 */
	public function set_identification($type, $name) {
		$type = strtolower($type);
		if ($type == 'bic' or $type == 'bei') {
			$this->identification['bicorbei'] = $name;
		} elseif ($type == 'kbo-bce') {
			$this->identification['kbo-bce'] = $name;
		} else {
			throw new \Exception('Unknown type');
		}
	}

	/**
	 * Render
	 *
	 * @access public
	 * @return string $xml
	 */
	public function render() {
		$template = Template::get();
		$template->assign('debtor', $this);
		return $template->render('object/debtor.twig');
	}

}
