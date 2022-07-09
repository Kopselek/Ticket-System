<?php
class TicketSite extends BaseSite
{
    public string $login;
    public DBConnector $conn;
    public string $ticket_id;

    public function __construct(string $login, DBConnector $conn, string $ticket_id)
    {
        $this->login = $login;
        $this->conn = $conn;
        $this->ticket_id = $ticket_id;
        parent::__construct();
    }
    public function create()
    {
        $this->conn->Connect();
        $permission = $this->conn->UserHavePermissionToTicket($this->login, $this->ticket_id);
        if ($permission) {
            $this->forms[] = new Text(TextTypes::h1, sprintf('Ticket %s', $this->ticket_id));
            $tickets = $this->conn->GetTicket($this->ticket_id);
            $titule = $tickets[0]["title"];
            $this->forms[] = new Text(TextTypes::h2, sprintf('Title: %s', $titule));

            $form = new Form('form', "POST");
            $form->addElement(new TextAreaInput('Ticket message', 'ticket-content', 'form'));
            $form->addElement(new Button('message-ticket', 'Submit'));
            $this->forms[] = $form;
            $this->forms[] = new MessageOutput('msg');

            foreach ($tickets as $ticket) {
                $div = $this->CreateTicketMessage($ticket["user"], $ticket["date"], $ticket["message"]);
                $this->forms[] = $div;
            }
        } else {
            header("Location:../");
        }
        $this->conn->Disconnect();

        // $this->forms[] = new Text(TextTypes::h1, sprintf('Welcome %s!', $this->login));
        // $form = new Form('form-logout', "POST");
        // $form->addElement(new Button('logout', 'Logout'));
        // $form->addElement(new Button('create-ticket', 'Create new Ticket'));
        // $this->forms[] = $form;
        // $this->forms[] = new MessageOutput('msg');
        // $this->forms[] = new Text(TextTypes::h2, 'Your tickets:');
    }

    private function CreateTicketMessage($user, $date, $message): Div
    {
        $div = new Div('ticket');
        $div->addElement(new Text(TextTypes::h3, sprintf('%s - %s', $user, $date)));
        $div->addElement(new TextArea($message, true));
        return $div;
    }
}
