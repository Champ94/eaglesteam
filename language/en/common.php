<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
    'NOTICE_BOARD'              => 'Notice Board',
	'NEWS_BOARD'                => 'News Board',
	'EAGLES_PROJECTS'           => 'Eagles Projects',

    'ACP_EAGLES_TITLE'          => 'Eagles Team Module',
    'ACP_EAGLES'                => 'Settings',
    'ACP_EAGLES_SETTING_SAVED'  => 'Settings have been saved successfully!',
    'ACP_EAGLES_OPTION'         => 'Choose option',
));
