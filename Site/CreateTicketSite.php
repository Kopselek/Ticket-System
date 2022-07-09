<?php
class CreateTicketSite extends BaseSite
{
    public function create()
    {
        $form = new Form('form', "POST");
        $form->addElement(new TextInput('Ticket title', 'ticket'));
        $form->addElement(new TextAreaInput('Message...', 'ticket-content', 'form'));
        $form->addElement(new Button('ticket-submit', 'Sumbit'));
        $this->forms[] = $form;
        $this->forms[] = new MessageOutput('msg');
    }
}
