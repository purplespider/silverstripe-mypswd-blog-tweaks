<?php

/**
 * A {@link GridFieldBulkActionHandler} for bulk marking comments as moderated
 *
 * @package comments
 */
class CommentsGridFieldBulkAction_MarkAsModerated extends CommentsGridFieldBulkAction
{
    
    private static $allowed_actions = array(
        'markasmoderated'
    );

    private static $url_handlers = array(
        'markasmoderated' => 'markasmoderated'
    );


    public function markasmoderated(SS_HTTPRequest $request)
    {
        $ids = array();
        
        foreach ($this->getRecords() as $record) {
            array_push($ids, $record->ID);

            $record->Moderated = 1;
            $record->write();
        }

        $response = new SS_HTTPResponse(Convert::raw2json(array(
            'done' => true,
            'records' => $ids
        )));

        $response->addHeader('Content-Type', 'text/json');

        return $response;
    }
}
