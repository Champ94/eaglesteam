<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace champ94\eaglesteam\mcp;

/**
 * Eagles Team Extension MCP module info.
 */
class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\champ94\eaglesteam\mcp\main_module',
			'title'		=> 'MCP_DEMO_TITLE',
			'modes'		=> array(
				'front'	=> array(
					'title'	=> 'MCP_DEMO',
					'auth'	=> 'ext_champ94/eaglesteam',
					'cat'	=> array('MCP_DEMO_TITLE')
				),
			),
		);
	}
}
