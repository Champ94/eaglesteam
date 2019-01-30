<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace champ94\eaglesteam\migrations;

class eaglesteam_acp extends \phpbb\db\migration\migration
{
    static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v31x\v314');
    }

    public function update_data()
    {
        return array(
            array('config.add', array(
                'champ94_eaglesteam_show_board',
                1
            )),
            array('module.add', array(
                'acp',
                'ACP_CAT_DOT_MODS',
                'ADM_EAGLES_TEAM'
            )),
            array('module.add', array(
                'acp',
                'ADM_EAGLES_TEAM',
                array(
                    'module_basename'	=> '\champ94\eaglesteam\acp\main_module',
                    'modes'				=> array('settings', 'series', 'chapters'),
                ),
            )),
        );
    }
}
