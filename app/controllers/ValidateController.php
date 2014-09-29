<?php

namespace AppValidation;

/**
 * Class ValidateController
 */
class ValidateController extends Controller
{

    /**
     * @param $id
     * @return mixed
     */
    public function validate($id)
    {
        if (isset($_POST['validate'])) {
            $ticket = Ticket::find($id);
            if ($ticket && !$ticket->isitin) {
                $ticket->isitin = 1;
                $ticket->scantime = new DateTime("now +1 hour");
                $ticket->save();
            }
        }

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
