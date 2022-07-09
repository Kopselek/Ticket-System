<?php
class PanelSite extends BaseSite
{
    public string $login;
    public DBConnector $conn;

    public function __construct(string $login, DBConnector $conn)
    {
        $this->login = $login;
        $this->conn = $conn;
        parent::__construct();
    }
    public function create()
    {
        $this->forms[] = new Text(TextTypes::h1, sprintf('Welcome %s!', $this->login));
        $form = new Form('form-logout', "POST");
        $form->addElement(new Button('logout', 'Logout'));
        $form->addElement(new Button('create-ticket', 'Create new Ticket'));
        $this->forms[] = $form;
        $this->forms[] = new MessageOutput('msg');
        $this->forms[] = new Text(TextTypes::h2, 'Your tickets:');

        $this->conn->Connect();
        $list = $this->conn->GetUserTickets($this->login);
        if (!is_null($list)) {
            foreach ($list as $ticket) {
                $url = '?ticket=' . $ticket[0];
                $text = 'Ticket ' . $ticket[0];
                $this->forms[] = new Href($url, $text, true);
            }
        }
    }
}
