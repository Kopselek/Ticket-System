<?php

class PanelSite extends BaseSite
{
    public string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
        parent::__construct();
    }
    public function create()
    {
        $this->forms[] = new Text(TextTypes::h1, sprintf('Welcome %s!', $this->login));
        $form = new Form('form-logout', "POST");
        $form->addElement(new Button('logout', 'Logout'));
        $this->forms[] = $form;

        $this->forms[] = new MessageOutput('msg');
    }
}
