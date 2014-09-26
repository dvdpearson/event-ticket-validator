<?php

class ValidateController extends Controller {

    public function validate($id)
    {
        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket = $ticket->toArray();
        }

        $data = [
            'ticket' => $ticket
        ];

        return View::make('validate', $data);

    }

}
