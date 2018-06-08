<?php
// recupero il contenuto inviato da Telegram
$content = file_get_contents("php://input");
// converto il contenuto da JSON ad array PHP
$update = json_decode($content, true);
// se la richiesta è null interrompo lo script
if(!$update)
{
  exit;
}
 
// assegno alle seguenti variabili il contenuto ricevuto da Telegram
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
// pulisco il messaggio ricevuto togliendo eventuali spazi prima e dopo il testo
$text = trim($text);
// converto tutti i caratteri alfanumerici del messaggio in minuscolo
$text = strtolower($text);
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["reply_markup"] = '{ "keyboard": [["Burrone Oscuro (0-2)"], ["Grotta Infestata (2-5)"], ["Vulcano Impetuoso (5-20)"], ["Caverna degli Orchi (20-35)"], ["Cratere Ventoso (35-50)"], ["Deserto Rosso (50-75)"], ["Foresta Maledetta (75-100)"], ["Valle delle Anime (100- )"]], "one_time_keyboard": false}';
$parameters["method"] = "sendMessage";
 
if ((isset($message['text']) ? $message['text'] : "")=="Burrone Oscuro (0-2)")
{
    $parameters = array('chat_id' => $chatId, "text" => "ciao");
    $parameters["reply_markup"] = '{ "keyboard": [["1"], ["2"], ["3"], ["4"], ["5"], ["6"], ["7"], ["8"]], "one_time_keyboard": false}';
    $parameters["method"] = "sendMessage";
    if ((isset($message['text']) ? $message['text'] : "")=="1"){
        $parameters = array('chat_id' => $chatId, "text" => "istanza 1");
        $parameters["method"] = "sendMessage";
    }
}
// mi preparo a restitutire al chiamante la mia risposta che è un oggetto JSON
// imposto l'header della risposta
header("Content-Type: application/json");
// la mia risposta è un array JSON composto da chat_id, text, method
// chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
// text è il testo della risposta
 
// method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
 
// imposto la keyboard
// converto e stampo l'array JSON sulla response
echo json_encode($parameters);