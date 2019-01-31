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
 * Eagles Team Extension ACP module.
 */
class main_module
{
    const FORM_KEY = 'champ94_eaglesteam_acp';

    public $tpl_name;
    public $page_title;
    public $u_action;

    protected $phpbb_container;
    protected $user;
    protected $request;
    protected $config;
    protected $template;

    protected $service;

    public function main($id, $mode)
    {
        global $phpbb_container, $user, $request, $config, $template;

        $this->phpbb_container = $phpbb_container;
        $this->user = $user;
        $this->request = $request;
        $this->config = $config;
        $this->template = $template;

        try {
            $this->service = $this->phpbb_container->get('champ94.eaglesteam.service');
        } catch (\Exception $e) {
            error_log('Could not find service for eaglesteam extension');
        }

        switch ($mode) {
            case 'settings':
            default:
                $this->tpl_name = 'acp_settings';
                $this->page_title = $this->user->lang('ADM_EAGLES_TEAM_SETTINGS');
                $this->mode_settings();
                break;
            case 'series':
                $this->tpl_name = 'acp_series';
                $this->page_title = $this->user->lang('ADM_EAGLES_TEAM_SERIES');
                $this->mode_series();
                break;
            case 'chapters':
                $this->tpl_name = 'acp_chapters';
                $this->page_title = $this->user->lang('ADM_EAGLES_TEAM_CHAPTERS');
                $this->mode_chapters();
                break;
        }
    }

    /**
     * Controller for the settings mode
     */
    private function mode_settings()
    {
        add_form_key(self::FORM_KEY);

        if ($this->request->is_set_post('submit_flags')) {
            $this->security_check();

            $this->config->set('champ94_eaglesteam_show_board', $this->request->variable('champ94_eaglesteam_show_board', 0));
            trigger_error($this->user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
        }

        if ($this->request->is_set_post('submit_images')) {
            $this->security_check();

            $banner_1 = $this->request->variable('banner_1', '', true);
            $banner_2 = $this->request->variable('banner_2', '', true);
            $this->service->update_board_banner($banner_1, $banner_2);

            $social_1 = $this->request->variable('social_1', '', true);
            $social_2 = $this->request->variable('social_2', '', true);
            $social_3 = $this->request->variable('social_3', '', true);
            $social_4 = $this->request->variable('social_4', '', true);
            $this->service->update_board_social($social_1, $social_2, $social_3, $social_4);

            trigger_error($this->user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action), E_USER_NOTICE);
        }

        $this->template->assign_vars(array(
            'CHAMP94_EAGLESTEAM_SHOW_BOARD' => $this->config['champ94_eaglesteam_show_board'],
            'U_ACTION_FLAGS'                => $this->u_action,
            'U_ACTION_IMGAGES'              => $this->u_action,
        ));
    }

    /**
     * Controller for the series mode
     */
    private function mode_series()
    {
        add_form_key(self::FORM_KEY);

        $series = $this->service->get_series();
        foreach ($series as $s)
        {
            $this->template->assign_block_vars('series', array(
                'SERIES_ID'     => $s['series_id'],
                'SERIES_NAME'   => $s['series_name'],
                'SERIES_IMG'    => $s['series_img'],
                'SERIES_LINK'   => $s['series_link'],
            ));
        }

        if ($this->request->is_set_post('submit'))
        {
            $this->security_check();

            $series_name = $this->request->variable('series_name', '', true);
            $series_img = $this->request->variable('series_img', '', true);
            $series_link = $this->request->variable('series_link', '', true);

            $this->service->add_new_series($series_name, $series_img, $series_link);

            trigger_error($this->user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action), E_USER_NOTICE);
        }

        $this->template->assign_vars(array(
            'U_ACTION'  => $this->u_action,
        ));
    }

    /**
     * Controller for the chapters mode
     */
    private function mode_chapters()
    {
        add_form_key(self::FORM_KEY);

        $series = $this->service->get_series();
        foreach ($series as $s)
        {
            $this->template->assign_block_vars('series', array(
                'SERIES_ID'     => $s['series_id'],
                'SERIES_NAME'   => $s['series_name'],
            ));
        }

        $chapters = $this->service->get_chapters();
        foreach ($chapters as $c)
        {
            $series_name = 'Not found';
            foreach ($series as $s)
            {
                if ($s['series_id'] == $c['series_id'])
                {
                    $series_name = $s['series_name'];
                    break;
                }
            }

            $this->template->assign_block_vars('chapters', array(
                'CHAPTER_SERIES'    => $series_name,
                'CHAPTER_NAME'      => $c['chapter_name'],
                'CHAPTER_LINK'      => $c['chapter_link'],
            ));
        }

        if ($this->request->is_set_post('submit'))
        {
            $this->security_check();

            $chapter_name = $this->request->variable('chapter_name', '', true);
            $chapter_link = $this->request->variable('chapter_link', '', true);
            $chapter_visibility = $this->request->variable('chapter_visibility', 0);
            $series_id = $this->request->variable('chapter_series_id', '', true);

            $this->service->add_new_chapter($chapter_name, $chapter_link, $chapter_visibility, $series_id);

            trigger_error($this->user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action), E_USER_NOTICE);
        }

        $this->template->assign_vars(array(
            'U_ACTION'  => $this->u_action,
        ));
    }

    private function security_check() {
        if (!check_form_key(self::FORM_KEY))
        {
            trigger_error('FORM_INVALID', E_USER_WARNING);
        }
    }
}
