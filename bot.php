<?php
$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$text = $text."garv chutiya hai";
$token='5333155758:AAHzUW34eFbOhWSi34DpmROqWpnlbNnby8Y';
$url ="https://api.telegram.org/bot$token/sendMessage?text=$text&chat_id=$chat_id";
file_get_contents($url);
?>