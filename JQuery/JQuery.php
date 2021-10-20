<?php

/* vim: set noexpandtab tabstop=4 shiftwidth=4 foldmethod=marker: */

/**
 * Gets a HTML head entry set for using jQuery
 *
 * @package   JQuery
 * @copyright 2015-2021 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */
class JQuery
{
	//  {{{ class constants

	/**
	 * The current jQuery version. Update this when updating the bundled
	 * version.
	 */
	const VERSION = '3.6.0';

	// }}}
	// {{{ protected properties

	/**
	 * Static collection of head entries
	 *
	 * @var SwatHtmlHeadEntrySet
	 */
	protected static $html_head_entries = null;

	// }}}
	// {{{ public function getHtmlHeadEntrySet()

	/**
	 * Gets the HTML head entries needed for jQuery
	 *
	 * @return SwatHtmlHeadEntrySet the HTML head entries needed for jQuery.
	 */
	public function getHtmlHeadEntrySet()
	{
		if (!self::$html_head_entries instanceof SwatHtmlHeadEntrySet) {
			$filename = sprintf('jquery-%s.js', self::VERSION);
			self::$html_head_entries = new SwatHtmlHeadEntrySet();
			self::$html_head_entries->addEntry(
				new SwatJavaScriptHtmlHeadEntry(
					'packages/jquery/javascript/'.$filename
				)
			);
		}
		return self::$html_head_entries;
	}

	// }}}
}

?>
