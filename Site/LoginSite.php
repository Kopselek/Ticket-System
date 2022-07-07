<?php
class LoginSite extends BaseSite
{
    public function create()
    {
        $form = new Form('form-login', "POST");
        $form->addElement(new TextInput('Login', 'login'));
        $form->addElement(new PasswordInput('Password', 'password'));
        $form->addElement(new Button('login-checkbox', 'Submit'));
        $this->forms[] = $form;
        $this->forms[] = new MessageOutput('msg');
    }
    public function render_site(): string
    {
        return implode(PHP_EOL, array_map(fn ($form) => $form->render(), $this->forms));
    }
}
