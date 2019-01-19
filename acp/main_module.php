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

class main_module
{
    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $language, $template, $request, $config;

        $this->tpl_name = 'acp_eagles_body';
        $this->page_title = $language->lang('ACP_EAGLES_TITLE');

        /**
         * For security purposes
         * @see https://area51.phpbb.com/docs/dev/3.2.x/extensions/tutorial_modules.html
         */
        add_form_key('champ94_eaglesteam_settings');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('champ94_eaglesteam_settings'))
            {
                trigger_error('FORM_INVALID');
            }

            $config->set('champ94_eaglesteam_option', $request->variable('champ94_eaglesteam_option', 0));
            trigger_error($language->lang('ACP_EAGLES_SETTING_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'CHAMP94_EAGLESTEAM_OPTION' => $config['champ94_eaglesteam_option'],
            'U_ACTION'                  => $this->u_action,
        ));
    }
}
