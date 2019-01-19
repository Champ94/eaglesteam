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

class eaglesteam_schema extends \phpbb\db\migration\migration
{
    public function effectively_installed()
    {
        return $this->db_tools->sql_table_exists($this->table_prefix . 'et_series');
    }

    static public function depends_on()
    {
        return array(
            '\phpbb\db\migration\data\v31x\v314',
        );
    }

    public function update_schema()
    {
        return array(
            'add_tables'    => array(
                $this->table_prefix . 'et_series'   => array(
                    'COLUMNS'       => array(
                        'series_id'         => array('UINT', null, 'auto_increment'),
                        'series_name'       => array('VCHAR:50', ''),
                        'series_img'        => array('VCHAR:50', ''),
                        'series_link'       => array('VCHAR:20', ''),
                    ),
                    'PRIMARY_KEY'   => 'series_id',
                ),
                $this->table_prefix . 'et_chapter'   => array(
                    'COLUMNS'   => array(
                        'chapter_id'        => array('UINT', null, 'auto_increment'),
                        'chapter_name'      => array('VCHAR:50', ''),
                        'chapter_link'      => array('VCHAR:20', ''),
                        'chapter_visible'   => array('BOOL', 1),
                        'series_id'         => array('UINT', 0),
                    ),
                    'PRIMARY_KEY'   => 'chapter_id',
                ),
            ),
        );
    }

    public function revert_schema()
    {
        return array(
            'drop_tables'   => array(
                $this->table_prefix . 'et_chapter',
                $this->table_prefix . 'et_series',
            ),
        );
    }

}
