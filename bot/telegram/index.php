<?php

require_once __DIR__ . '../../../vendor/autoload.php';
require_once __DIR__ . '../../../database/database_setup.php';

use Longman\TelegramBot\Request;
use PDO;
use Dotenv\Dotenv;

// Load the environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '../../../');
$dotenv->load();

// Get the Telegram bot token from the environment variables
$token = $_ENV['TELEGRAM_BOT_TOKEN'];

// Function to get a random quote from the database
function getRandomQuote()
{
    $pdo = new PDO('sqlite:../../../database/quotes.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT quote FROM quotes ORDER BY RANDOM() LIMIT 1");
    $randomQuote = $stmt->fetchColumn();

    return $randomQuote;
}

// Handle incoming updates
$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $command = $update['message']['text'];

    if ($command === '/getquote') {
        $randomQuote = getRandomQuote();

        $data = [
            'chat_id' => $chatId,
            'text' => $randomQuote,
        ];

        $botApiEndpoint = 'https://api.telegram.org/bot' . $token . '/sendMessage';
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data),
            ],
        ];
        $context = stream_context_create($options);
        file_get_contents($botApiEndpoint, false, $context);
    }
}
