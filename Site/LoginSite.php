<?php
class LoginSite extends BaseSite
{
    public function create()
    {
        $form = new Form('form', "POST");
        $form->addElement(new TextInput('Login', 'login'));
        $form->addElement(new PasswordInput('Password', 'password'));
        $form->addElement(new Button('login-checkbox', 'Submit'));
        $form->addElement(new Button('register-site-checkbox', 'Register'));
        $this->forms[] = $form;
        $this->forms[] = new MessageOutput('msg');
    }
}
