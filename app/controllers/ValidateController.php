<?php

/**
 * Class ValidateController
 */
class ValidateController extends \Controller
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

        if (isset($_POST['unvalidate'])) {
            $ticket = Ticket::find($id);
            if ($ticket && $ticket->isitin) {
                $ticket->isitin = 0;
                $ticket->scantime = "0000-00-00 00:00:00";
                $ticket->save();
            }
        }

        if (isset($_POST['search'])) {
            return Redirect::to('validate/'.$_POST['ticketid']);
            die();
        }



        $ticket = Ticket::find($id);

        if (isset($ticket['transaction_id'])) {
            $linkedticket = Ticket::where('transaction_id', '=', $ticket->transaction_id)
                ->where('id', '<>', $ticket->id)->first();
        }

        if ($ticket) {
            $ticket = $ticket->toArray();
        }

        $data = [
            'ticket' => $ticket,
            'linkedticket' => (
                isset($linkedticket) && isset($linkedticket->transaction_id) &&
                $linkedticket->transaction_id!=="" ? $linkedticket : null
            )
        ];

        return View::make('validate', $data);

    }
}
