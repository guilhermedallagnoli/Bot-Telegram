<?php

namespace App\Comunication;

use TelegramBot\Api\BotApi;

class Alert
{

    /**
     * Token de acesso ao bot
     * @var string
     */
    const TELEGRAM_BOT_TOKEN = '742349248i3294hbfs8934290hg923427'; // SEU TOKEN

    /**
     * ID do chat
     * @var integer
     */
    const TELEGRAM_CHAT_ID = 645634214234; // SEU ID

    /**
     * Método responsável por enviar a mensagem de alerta
     *
     * @param string $message
     * @return boolean
     */
    public static function sendMessage($message)
    {
        // INSTANCIA DO BOT COM O TOKEN GERADO
        $obBotApi = new BotApi(self::TELEGRAM_BOT_TOKEN);

        //ENVIA A MENSAGEM PARA O TELEGRAM
        return $obBotApi->sendMessage(self::TELEGRAM_CHAT_ID, $message);
    }
}
