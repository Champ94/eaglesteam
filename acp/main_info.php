<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace champ94\eaglesteam\acp;

/**
 * Eagles Team Extension ACP module info.
 */
class main_info
{
    public function module()
    {
        return array(
            'filename'  => '\champ94\eaglesteam\acp\main_module',
            'title'     => 'EAGLES_TEAM',
            'modes'     => array(
                'settings'  => array(
                    'title' => 'ADM_EAGLES_TEAM_SETTINGS',
                    'auth'  => 'ext_champ94/eaglesteam && acl_a_board',
                    'cat'   => array('ADM_EAGLES_TEAM'),
                ),
                'series'    => array(
                    'title' => 'ADM_EAGLES_TEAM_SERIES',
                    'auth'  => 'ext_champ94/eaglesteam && acl_a_board',
                    'cat'   => array('ADM_EAGLES_TEAM'),
                ),
                'chapters'  => array(
                    'title' => 'ADM_EAGLES_TEAM_CHAPTERS',
                    'auth'  => 'ext_champ94/eaglesteam && acl_a_board',
                    'cat'   => array('ADM_EAGLES_TEAM'),
                ),
            ),
        );
    }
}
