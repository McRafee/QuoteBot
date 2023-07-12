<?php

try {
    $pdo = new PDO('sqlite:quotes.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec('CREATE TABLE IF NOT EXISTS quotes (id INTEGER PRIMARY KEY AUTOINCREMENT, quote TEXT)');

    // Check if quotes table is empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM quotes");
    $count = $stmt->fetchColumn();

    if ($count === 0) {
        // Fetch quotes from type.fit API
        $url = 'https://type.fit/api/quotes';
        $response = file_get_contents($url);
        $quotes = json_decode($response, true);

        // Insert quotes into the database
        $stmt = $pdo->prepare("INSERT INTO quotes (quote) VALUES (?)");
        foreach ($quotes as $quoteData) {
            $quote = $quoteData['text'];
            $stmt->execute([$quote]);
        }
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
