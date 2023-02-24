<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TelegramBot\Api\BotApi;

class TelegramBotCommand extends Command
{
    protected $signature = 'telegram:bot';
    protected $description = 'Handle Telegram bot updates';

    public function handle(): void
    {
        $telegram = new BotApi('6055093418:AAGgD8nmvDmMHxsV3YIhbn9laEOXoSNdpfM');
        $telegram->setWebhook();
        $updates = $telegram->getWebhookUpdates();
        foreach ($updates as $update) {
            $message = $update->getMessage();
            $chatId = $message->getChat()->getId();
            $telegram->sendMessage(
                $chatId,
                'Hello, I\'m a test bot!'
            );
        }
    }
}
