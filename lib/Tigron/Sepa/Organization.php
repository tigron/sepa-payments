<?php
/**
 * Organization class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */
namespace Tigron\Sepa;

class Organization {

	/**
	 * Name
	 *
	 * @var string $name
	 * @access public
	 */
	public $name = null;

	/**
	 * Identification
	 *
	 * @var array $identification
	 * @access public
	 */
	public $identification = [];

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
		$template->assign('organization', $this);
		return $template->render('object/organization.twig');
	}

}
