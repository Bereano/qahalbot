<?php

try {

  $content = file_get_contents("php://input");
  $update = json_decode($content, true);

  if(!$update)
  {
    exit;
  }

  $message = isset($update['message']) ? $update['message'] : "";
  $messageId = isset($message['message_id']) ? $message['message_id'] : "";
  $chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
  $firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
  $lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
  $username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
  $date = isset($message['date']) ? $message['date'] : "";
  $text = isset($message['text']) ? $message['text'] : "";

  $text = strtolower(trim($text));

  switch ($text) {
    case '/help':
      $text = '+---------------------------+' . "\n" .
              '| Come possiamo aiutarti?   |' . "\n" .
              '+---------------------------+' . "\n";
      break;

    default:
      $text = 'Comando non riconosciuto...';
      break;
  }

  //$text = strtolower($text);

} catch (Exception $e) {
  $text = 'Caught exception: ' . $e->getMessage();
}


header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
