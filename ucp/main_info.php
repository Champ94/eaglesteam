<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace champ94\eaglesteam\ucp;

/**
 * Eagles Team Extension UCP module info.
 */
class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\champ94\eaglesteam\ucp\main_module',
			'title'		=> 'UCP_DEMO_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'UCP_DEMO',
					'auth'	=> 'ext_champ94/eaglesteam',
					'cat'	=> array('UCP_DEMO_TITLE')
				),
			),
		);
	}
}
