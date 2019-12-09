<?php

namespace Controller;

include_once '../Autoload.php';

use Controller\MessageActions\DeleteAction;
use Controller\MessageActions\EditAction;
use Controller\MessageActions\ReplyAction;
use Controller\MessageActions\SetAction;
use DateTime;

if ($_POST['create']) {
    
    $create = new SetAction();
    $date = new DateTime();
    $request = [
        'from_id' => $_POST['from_id'],
        'to_id' => $_POST['to_id'],
        'message' => $_POST['message'],
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
    ];
   
    $result = $create->execute($request);
    
    return $result;
}
if ($_POST['update']) {

    $create = new EditAction();
    $date = new DateTime();
    $request = [
        'id' => $_POST['id'],
        'message' => $_POST['message'],
        'updated_at' => $date->format('Y-m-d H:i:s')
    ];
    

    $result = $create->execute($request);
    return $result;
}
if ($_POST['delete']) {

    $create = new DeleteAction();
    $request = [
        'id' => $_POST['id'],
    ];

    $result = $create->execute($request);
    return $result;
}
if ($_POST['reply']) {
    
    $create = new ReplyAction();
    $date = new DateTime();
    $request = [
        'message_id' => $_POST['message_id'],
        'user_id' => $_POST['user_id'],
        'reply' => $_POST['replys'],
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => $date->format('Y-m-d H:i:s')
    ];
   
    $result = $create->execute($request);
    
    return $result;
}