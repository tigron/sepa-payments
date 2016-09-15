<?php
/**
 * Template class
 *
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author Gerry Demaret <gerry@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */

namespace Tigron\Sepa;

class Template extends \Skeleton\Template\Template {

	/**
	 * Template instance
	 *
	 * @var Template $template
	 * @access private
	 */
	private static $template = null;

	/**
	 * Get
	 *
	 * @access public
	 * @return Template $template
	 */
	public static function get() {
		if (!isset(self::$template)) {
			$template = new self();
			$template->set_template_directory(dirname(__FILE__) . '/../../templates');
			self::$template = $template;
		}
		return self::$template;
	}

}
