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

    protected $user;
    protected $request;
    protected $template;
    protected $phpbb_container;

    protected $service;

    public function main($id, $mode)
    {
        global $user, $request, $template, $phpbb_container;

        $this->user = $user;
        $this->request = $request;
        $this->template = $template;
        $this->phpbb_container = $phpbb_container;

        $this->service = $this->phpbb_container->get('champ94.eaglesteam.service');

        switch ($mode) {
            case 'settings':
            default:
                $this->tpl_name = 'acp_settings';
                $this->page_title = $user->lang('ACP_EAGLES_TEAM_SETTINGS');
                $this->mode_settings();
                break;
            case 'series':
                $this->tpl_name = 'acp_series';
                $this->page_title = $user->lang('ACP_EAGLES_TEAM_SERIES');
                $this->mode_series();
                break;
            case 'chapters':
                $this->tpl_name = 'acp_chapters';
                $this->page_title = $user->lang('ACP_EAGLES_TEAM_CHAPTERS');
                $this->mode_chapters();
                break;

        }
    }

    /**
     * Controller for the settings mode
     */
    private function mode_settings()
    {

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

    }

    private function security_check() {
        if (!check_form_key(self::FORM_KEY))
        {
            trigger_error('FORM_INVALID', E_USER_WARNING);
        }
    }
/*
    public function main($id, $mode)
    {
        global $config, $request, $template, $user;

        $user->add_lang_ext('champ94/eaglesteam', 'common');
        $this->tpl_name = 'acp_eagles_body';
        $this->page_title = $user->lang('ACP_EAGLES_TITLE');

        /**
         * For security purposes
         * @see https://area51.phpbb.com/docs/dev/3.2.x/extensions/tutorial_modules.html
         *//*
        add_form_key('champ94_eaglesteam_settings');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('champ94_eaglesteam_settings'))
            {
                trigger_error('FORM_INVALID', E_USER_WARNING);
            }
            
            $config->set('champ94_eaglesteam_option', $request->variable('champ94_eaglesteam_option', 0));
            trigger_error($user->lang('ACP_EAGLES_SETTING_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'U_ACTION'				    => $this->u_action,
            'CHAMP94_EAGLESTEAM_OPTION' => $config['champ94_eaglesteam_option'],
        ));
    }*/
}
