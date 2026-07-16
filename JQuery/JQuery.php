<?php

declare(strict_types=1);

/**
 * Gets an HTML head entry set for using jQuery.
 *
 * @copyright 2015-2026 silverorange
 * @license   http://www.opensource.org/licenses/mit-license.html MIT License
 */
class JQuery
{
    /**
     * The current jQuery version.
     *
     * Update this when updating the bundled version.
     */
    public const VERSION = '3.6.0';

    /**
     * Static collection of head entries.
     */
    protected static ?SwatHtmlHeadEntrySet $html_head_entries = null;

    /**
     * Gets the HTML head entries needed for jQuery.
     *
     * @return SwatHtmlHeadEntrySet the HTML head entries needed for jQuery
     */
    public function getHtmlHeadEntrySet(): SwatHtmlHeadEntrySet
    {
        if (!self::$html_head_entries instanceof SwatHtmlHeadEntrySet) {
            $filename = sprintf('jquery-%s.min.js', self::VERSION);
            self::$html_head_entries = new SwatHtmlHeadEntrySet();
            self::$html_head_entries->addEntry(
                new SwatJavaScriptHtmlHeadEntry(
                    'packages/jquery/javascript/' . $filename
                )
            );
        }

        return self::$html_head_entries;
    }
}
