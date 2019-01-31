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

$service = $phpbb_container->get('champ94.eaglesteam.service');
$latest_chapter_for_series = $service->get_latest_chapter_for_series();

foreach ($latest_chapter_for_series as $latest)
{
    echo '
        <div class="et-project-box">
            <a href="' . $latest['series_link'] . '" class="et-project-title">' . $latest['series_name'] . '</a><br>
            <a href="' . $latest['chapter_link'] . '" class="et-project-chapter">Chapter ' . $latest['chapter_name'] . '</a><br>
            <img class="et-project-img" src="' . $latest['series_img'] . '">
        </div>
    ';
}
