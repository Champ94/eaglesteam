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

    /**
     * Constructor
     *
     * @param \phpbb\db\driver\factory $db
     * @param string $et_series_table
     * @param string $et_chapters_table
     */
    public function __construct(\phpbb\db\driver\factory $db, $et_series_table, $et_chapters_table)
    {
        $this->db = $db;
        $this->et_series_table = $et_series_table;
        $this->et_chapters_table = $et_chapters_table;
    }

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
}
