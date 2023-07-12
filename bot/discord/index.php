<?php

require '../vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$discord = new Discord([
    'token' => $_ENV['DISCORD_BOT_TOKEN'],
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is online!" . PHP_EOL;
});

$discord->on('message', function (Message $message, Discord $discord) {
    if ($message->content === '!quote') {
        $pdo = new PDO('sqlite:../database/quotes.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT quote FROM quotes ORDER BY RANDOM() LIMIT 1");
        $stmt->execute();
        $randomQuote = $stmt->fetchColumn();

        $message->channel->sendMessage($randomQuote);
    }
});

$discord->run();
