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
$board_images_data = $service->get_board_images_data();

echo '
    <a href="' . $board_images_data['social_1_link'] . '"><img src="' . $board_images_data['social_1_img'] . '"></a>
    <a href="' . $board_images_data['social_2_link'] . '"><img src="' . $board_images_data['social_2_img'] . '"></a>
    <a href="' . $board_images_data['social_3_link'] . '"><img src="' . $board_images_data['social_3_img'] . '"></a>
    <a href="' . $board_images_data['social_4_link'] . '"><img src="' . $board_images_data['social_4_img'] . '"></a>
';
