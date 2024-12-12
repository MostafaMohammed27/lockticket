<?php
function plugin_lockticket_prevent_steal(CommonDBTM $item) {
    global $DB;

    // Check if the item is a ticket
    if ($item instanceof Ticket) {
        $ticket = new Ticket();
        $ticket->getFromDB($item->getID());

        // Check if the current user is the assigned user
        if ($ticket->fields['users_id_recipient'] != Session::getLoginUserID()) {
            Session::addMessageAfterRedirect(
                "This ticket is locked and can only be modified by the assigned user.",
                false,
                ERROR
            );
            return false; // Prevent further actions
        }
    }
}
?>
