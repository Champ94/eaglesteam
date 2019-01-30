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
    // FRONT END
    'NOTICE_BOARD'              => 'Notice Board',
	'NEWS_BOARD'                => 'News Board',
	'EAGLES_PROJECTS'           => 'Eagles Projects',

    // ACP
    'EAGLES_TEAM'               => 'Eagles Team Module',
    'ADM_EAGLES_TEAM'           => 'Eagles Team Module',

    // ACP settings module
    'ADM_EAGLES_TEAM_SETTINGS'  => 'Settings',
    'ADM_SETTINGS_TITLE'        => 'Settings',

    // ACP series module
    'ADM_EAGLES_TEAM_SERIES'    => 'Series',
    'ADM_SERIES_TITLE'          => 'Series',

    // ACP chapters module
    'ADM_EAGLES_TEAM_CHAPTERS'  => 'Chapters',
    'ADM_CHAPTERS_TITLE'        => 'Chapters',
));
