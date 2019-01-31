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
    public function get_series()
    {
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
    public function get_chapters()
    {
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
    public function add_new_chapter($name, $link, $visibility, $series_id)
    {
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
     * Update board banner images links
     * If a record doesn't exists it is created
     * if it exists the record gets updated
     *
     * @param string $banner_1 link for first banner under Eagles Projects in Notice Board
     * @param string $banner_2 link for second banner under Eagles Projects in Notice Board
     */
    public function update_board_banner_images($banner_1, $banner_2)
    {
        $sql_parameters = array(
            'banner_1_img'  => $banner_1,
            'banner_2_img'  => $banner_2,
        );

        $this->execute_query_board_images_table($sql_parameters);
    }

    /**
     * Update social icons links
     * If a record doesn't exists it is created
     * if it exists the record gets updated
     *
     * @param string $social_1 link for first social icon under News Board
     * @param string $social_2 link for second social icon under News Board
     * @param string $social_3 link for third social icon under News Board
     * @param string $social_4 link for fourth social icon under News Board
     */
    public function update_board_social_images($social_1, $social_2, $social_3, $social_4)
    {
        $sql_parameters = array(
            'social_1_img'  => $social_1,
            'social_2_img'  => $social_2,
            'social_3_img'  => $social_3,
            'social_4_img'  => $social_4,
        );

        $this->execute_query_board_images_table($sql_parameters);
    }

    /**
     * @param $banner_1
     * @param $banner_2
     */
    public function update_board_banner_links($banner_1, $banner_2)
    {
        $sql_parameters = array(
            'banner_1_link' => $banner_1,
            'banner_2_link' => $banner_2,
        );

        $this->execute_query_board_images_table($sql_parameters);
    }

    /**
     * @param $social_1
     * @param $social_2
     * @param $social_3
     * @param $social_4
     */
    public function update_board_social_links($social_1, $social_2, $social_3, $social_4)
    {
        $sql_parameters = array(
            'social_1_link' => $social_1,
            'social_2_link' => $social_2,
            'social_3_link' => $social_3,
            'social_4_link' => $social_4,
        );

        $this->execute_query_board_images_table($sql_parameters);
    }

    private function first_record_exists_in_board_images()
    {
        $query = 'SELECT COUNT(*) AS row_number
        FROM ' . $this->et_board_images_table;

        $result = $this->db->sql_query($query);

        $row_number = (int) $this->db->sql_fetchfield('row_number');

        $this->db->sql_freeresult($result);

        return $row_number > 0;
    }

    private function execute_query_board_images_table($sql_parameters)
    {
        if ($this->first_record_exists_in_board_images()){
            $query = 'UPDATE '
                . $this->et_board_images_table
                . ' SET '
                . $this->db->sql_build_array('UPDATE', $sql_parameters)
                . ' WHERE board_images_id = 1';
        } else {
            $query = 'INSERT INTO '
                . $this->et_board_images_table . ' '
                . $this->db->sql_build_array('INSERT', $sql_parameters);
        }

        $this->db->sql_query($query);
    }

    public function get_board_images_data()
    {
        $query = 'SELECT * FROM ' . $this->et_board_images_table;

        $result = $this->db->sql_query($query);
        $output = array();

        while ($row = $this->db->sql_fetchrow($result))
        {
            $output[] = $row;
        }

        $this->db->sql_freeresult($result);

        return $output[0];
    }
}
