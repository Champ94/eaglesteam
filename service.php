<?php
/**
 *
 * Eagles Team Extension. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2019, Dennis Campagna, https://www.denniscampagna.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace champ94\eaglesteam;

class service
{
    /** @var \phpbb\db\driver\factory */
    protected $db;

    /** @var string */
    protected $et_series_table;

    /** @var string */
    protected $et_chapters_table;

    /** @var string */
    protected $et_board_images_table;

    /**
     * Constructor
     *
     * @param \phpbb\db\driver\factory $db
     * @param string $et_series_table
     * @param string $et_chapters_table
     * @param string $et_board_images_table
     */
    public function __construct(\phpbb\db\driver\factory $db, $et_series_table, $et_chapters_table, $et_board_images_table)
    {
        $this->db = $db;
        $this->et_series_table = $et_series_table;
        $this->et_chapters_table = $et_chapters_table;
        $this->et_board_images_table = $et_board_images_table;
    }

    /**
     * @return array containing all the series
     */
    public function get_series() {
        $query = 'SELECT * FROM ' . $this->et_series_table;

        $result = $this->db->sql_query($query);
        $output = array();

        while ($row = $this->db->sql_fetchrow($result))
        {
            $output[] = $row;
        }

        $this->db->sql_freeresult($result);

        return $output;
    }

    /**
     * Add new series into database
     *
     * @param string $name series name
     * @param string $img series image relative path
     * @param string $link series relative link
     */
    public function add_new_series($name, $img, $link)
    {
        $sql_parameters = array(
            'series_name'   => $name,
            'series_img'    => $img,
            'series_link'   => $link,
        );

        $query = 'INSERT INTO '
            . $this->et_series_table . ' '
            . $this->db->sql_build_array('INSERT', $sql_parameters);

        $this->db->sql_query($query);
    }

    /**
     * @return array containing latest 10 chapters
     */
    public function get_chapters() {
        $query = 'SELECT * FROM ' . $this->et_chapters_table;

        $result = $this->db->sql_query_limit($query, 10, 0);
        $output = array();

        while ($row = $this->db->sql_fetchrow($result))
        {
            $output[] = $row;
        }

        $this->db->sql_freeresult($result);

        return $output;
    }

    /**
     * Insert new chapter into database
     *
     * @param string $name chapter name or number
     * @param string $link chapter link
     * @param bool $visibility tells if chapter must be visible in news board
     * @param int $series_id chapter's series id
     */
    public function add_new_chapter($name, $link, $visibility, $series_id) {
        $sql_parameters = array(
            'chapter_name'      => $name,
            'chapter_link'      => $link,
            'chapter_visible'   => $visibility,
            'series_id'         => $series_id,
        );

        $query = 'INSERT INTO '
            . $this->et_chapters_table . ' '
            . $this->db->sql_build_array('INSERT', $sql_parameters);

        $this->db->sql_query($query);
    }

    /**
     * @param $banner_1
     * @param $banner_2
     */
    public function update_board_banner($banner_1, $banner_2) {

    }

    /**
     * @param $social_1
     * @param $social_2
     * @param $social_3
     * @param $social_4
     */
    public function update_board_social($social_1, $social_2, $social_3, $social_4) {

    }
}
