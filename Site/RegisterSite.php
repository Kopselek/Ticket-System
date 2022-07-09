<?php
class RegisterSite extends BaseSite
{
    public function create()
    {
        $form = new Form('form', "POST");
        $form->addElement(new TextInput('Login', 'login'));
        $form->addElement(new PasswordInput('Password', 'password'));
        $form->addElement(new TextInput('Email', 'email'));
        $form->addElement(new Button('register-checkbox', 'Submit'));
        $this->forms[] = $form;
        $this->forms[] = new MessageOutput('msg');
    }
}
