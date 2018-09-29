<?php

try {

  $content = file_get_contents("php://input");
  $update = json_decode($content, true);

  $a = 3/0;

  if(!$update)
  {
    exit;
  }

  $message = isset($update['message']) ? $update['message'] : "";
  $text = isset($message['text']) ? $message['text'] : "";
  $text = trim($text);
  if (substr($text, 0, 1) == '/')
  {
    exit;
  }


  $messageId = isset($message['message_id']) ? $message['message_id'] : "";
  $chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
  $firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
  $lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
  $username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
  $date = isset($message['date']) ? $message['date'] : "";


  $text = strtolower($text);

} catch (Exception $e) {
  $text = 'Caught exception: ' . $e->getMessage() . "\n";
}


header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
