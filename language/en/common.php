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
    // FRONT END - overall_header_content_before.html
    'NOTICE_BOARD'                              => 'Notice Board',
	'NEWS_BOARD'                                => 'News Board',
	'EAGLES_PROJECTS'                           => 'Eagles Projects',

    // ADM general
    'EAGLES_TEAM'                               => 'Eagles Team Module',
    'ADM_EAGLES_TEAM'                           => 'Eagles Team Module',

    // ACP settings module
    'ADM_EAGLES_TEAM_SETTINGS'                  => 'Settings',
    'ADM_SETTINGS_TITLE'                        => 'Settings',
    'ADM_SETTINGS_DESCRIPTION'                  => 'Settings panel for Eagles Team Extension',
    'ADM_SETTINGS_FLAGS'                        => 'General Settings',
    'ADM_SETTINGS_SHOW_BOARD'                   => 'Show board?',
    'ADM_SETTINGS_SHOW_BOARD_DESCRIPTION'       => 'If disabled board will not be shown',
    'ADM_SETTINGS_IMAGES'                       => 'Links to banner and social images',
    'ADM_SETTINGS_BANNER_1_DESCRIPTION'         => 'Link to the first banner image shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_BANNER_2_DESCRIPTION'         => 'Link to the second banner image shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_SOCIAL_1_DESCRIPTION'         => 'Link to the first social icon shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_SOCIAL_2_DESCRIPTION'         => 'Link to the second social icon shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_SOCIAL_3_DESCRIPTION'         => 'Link to the third social icon shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_SOCIAL_4_DESCRIPTION'         => 'Link to the fourth social icon shown under Eagles Projects in Notice Board',
    'ADM_SETTINGS_LINKS'                        => 'Links for banner and social images',
    'ADM_SETTINGS_BANNER_LINK_1_DESCRIPTION'    => 'Link on click for the first banner image',
    'ADM_SETTINGS_BANNER_LINK_2_DESCRIPTION'    => 'Link on click for the second banner image',
    'ADM_SETTINGS_SOCIAL_LINK_1_DESCRIPTION'    => 'Link on click for the first social icon',
    'ADM_SETTINGS_SOCIAL_LINK_2_DESCRIPTION'    => 'Link on click for the second social icon',
    'ADM_SETTINGS_SOCIAL_LINK_3_DESCRIPTION'    => 'Link on click for the third social icon',
    'ADM_SETTINGS_SOCIAL_LINK_4_DESCRIPTION'    => 'Link on click for the fourth social icon',

    // ACP series module
    'ADM_EAGLES_TEAM_SERIES'                    => 'Series',
    'ADM_SERIES_TITLE'                          => 'Series',
    'ADM_SERIES_DESCRIPTION'                    => 'Series management',
    'ADM_SERIES_NEW_SERIES'                     => 'Add new series',
    'ADM_SERIES_SERIES_NAME'                    => 'Series name',
    'ADM_SERIES_SERIES_IMG'                     => 'Series image link',
    'ADM_SERIES_SERIES_LINK'                    => 'Series main link',
    'ADM_SERIES_SERIES_LIST'                    => 'Series list',
    'ADM_SERIES_SERIES_LIST_NAME'               => 'SERIES NAME',
    'ADM_SERIES_SERIES_LIST_IMG'                => 'SERIES IMAGE LINK',
    'ADM_SERIES_SERIES_LIST_LINK'               => 'SERIES MAIN LINK',
    'ADM_SERIES_NO_SERIES'                      => 'No series found in database',

    // ACP chapters module
    'ADM_EAGLES_TEAM_CHAPTERS'                  => 'Chapters',
    'ADM_CHAPTERS_TITLE'                        => 'Chapters',
    'ADM_CHAPTERS_DESCRIPTION'                  => 'Chapters management',
    'ADM_CHAPTERS_NEW_CHAPTERS'                 => 'Add new chapter',
    'ADM_CHAPTER_CHAPTER_NAME'                  => 'Chapter name or number',
    'ADM_CHAPTER_CHAPTER_LINK'                  => 'Chapter link',
    'ADM_CHAPTER_CHAPTER_VISIBILITY'            => 'Chapter visibility',
    'ADM_CHAPTER_SERIES_ID'                     => 'Series ID',
    'ADM_CHAPTERS_SERIES_LIST'                  => 'Series list',
    'ADM_CHAPTERS_SERIES_ID'                    => 'SERIES ID',
    'ADM_CHAPTERS_SERIES_NAME'                  => 'SERIES NAME',
    'ADM_CHAPTERS_NO_SERIES'                    => 'No series found in database',
    'ADM_CHAPTERS_CHAPTERS_LIST'                => 'Chapters list',
    'ADM_CHAPTERS_CHAPTER_NAME'                 => 'CHAPTER NAME',
    'ADM_CHAPTERS_CHAPTER_LINK'                 => 'CHAPTER LINK',
    'ADM_CHAPTERS_NO_CHAPTERS'                  => 'No chapter found in database',
));
