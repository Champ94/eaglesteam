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
    public $page_title;
    public $tpl_name;
    public $u_action;

    public function main($id, $mode)
    {
        global $config, $request, $template, $user;

        $user->add_lang_ext('champ94/eaglesteam', 'common');
        $this->tpl_name = 'acp_eagles_body';
        $this->page_title = $user->lang('ACP_EAGLES_TITLE');

        /**
         * For security purposes
         * @see https://area51.phpbb.com/docs/dev/3.2.x/extensions/tutorial_modules.html
         */
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
    }
}
