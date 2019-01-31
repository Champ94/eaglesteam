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

global $phpbb_container;

$service = $phpbb_container->get('champ94.eaglesteam.service');
$latest_chapters = $service->get_latest_chapters();

$i = 0;

foreach ($latest_chapters as $chapter)
{
    $i++;
    echo '
        <div>
            <p class="et-news-line">' . $i . '.&nbsp;</p>
            <a href="' . $chapter['chapter_link'] . '">' . $chapter['series_name'] . ' n. ' . $chapter['chapter_name'] . '</a>
        </div>
    ';
}
