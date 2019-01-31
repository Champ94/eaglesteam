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
        return $this->db_tools->sql_table_exists($this->table_prefix . 'et_series')
            && $this->db_tools->sql_table_exists($this->table_prefix . 'et_chapters')
            && $this->db_tools->sql_table_exists($this->table_prefix . 'et_board_images');
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
                $this->table_prefix . 'et_series'       => array(
                    'COLUMNS'       => array(
                        'series_id'         => array('UINT', null, 'auto_increment'),
                        'series_name'       => array('VCHAR:50', ''),
                        'series_img'        => array('VCHAR:50', ''),
                        'series_link'       => array('VCHAR:100', ''),
                    ),
                    'PRIMARY_KEY'   => 'series_id',
                ),
                $this->table_prefix . 'et_chapters'      => array(
                    'COLUMNS'   => array(
                        'chapter_id'        => array('UINT', null, 'auto_increment'),
                        'chapter_name'      => array('VCHAR:50', ''),
                        'chapter_link'      => array('VCHAR:100', ''),
                        'chapter_visible'   => array('BOOL', 1),
                        'series_id'         => array('UINT', 0),
                    ),
                    'PRIMARY_KEY'   => 'chapter_id',
                ),
                $this->table_prefix . 'et_board_images' => array(
                    'COLUMNS'   => array(
                        'board_images_id'   => array('UINT', null, 'auto_increment'),
                        'banner_1'          => array('VCHAR:100', ''),
                        'banner_2'          => array('VCHAR:100', ''),
                        'social_1'          => array('VCHAR:100', ''),
                        'social_2'          => array('VCHAR:100', ''),
                        'social_3'          => array('VCHAR:100', ''),
                        'social_4'          => array('VCHAR:100', ''),
                        'config_name'       => array('VCHAR:20', ''),
                        'active_images'     => array('BOOL', 1),
                    ),
                    'PRIMARY_KEY'   => 'board_images_id',
                ),
            ),
        );
    }

    public function revert_schema()
    {
        return array(
            'drop_tables'   => array(
                $this->table_prefix . 'et_board_images',
                $this->table_prefix . 'et_chapters',
                $this->table_prefix . 'et_series',
            ),
        );
    }

}
