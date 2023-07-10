# QuoteBot

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT) | [![Discord](https://img.shields.io/badge/Discord-Bot-7289DA)](https://discord.com/) | [![Telegram](https://img.shields.io/badge/Telegram-Bot-2CA5E0)](https://telegram.org/)

---

QuoteBot is a simple Discord and Telegram bot that provides random quotes sourced from a collection of famous quotes. This repository contains the source code and instructions to set up and run the bot.

![QuoteBot](quotebot.png)

## Directory Tree

```
- project/
  |- bot/
  |  |- discord/
  |  |  |- index.php
  |  |- telegram/
  |     |- telegram_bot.php
  |     |- Commands/
  |        |- RandomQuoteCommand.php
  |- database/
  |  |- quotes.db
  |- vendor/
  |- .env
  |- composer.json
  |- composer.lock
```

## Technologies Used

- PHP
- Discord.js
- Telegram Bot API
- SQLite

## Prerequisites

To run the QuoteBot, you'll need the following:

- PHP 7.4 or higher installed on your system
- Composer dependency manager (https://getcomposer.org/)
- Discord bot token (for the Discord bot)
- Telegram bot API key and username (for the Telegram bot)

## Getting Started

Follow these steps to set up and run QuoteBot on your local machine:

1. **Clone the repository:** Start by cloning this repository to your local machine using the following command:

   ```bash
   git clone https://github.com/your-username/quotebot.git
   ```

2. **Install dependencies:** Navigate to the project directory and install the necessary dependencies using Composer. Run the following command:

   ```bash
   composer install
   ```

3. **Database setup:** Create an SQLite database and populate it with quotes. Follow the instructions in the `database_setup.php` file to create the database and populate it.

4. **Environment variables:** Create a `.env` file in the root directory of the project. You can use the provided `example.env` file as a template. Replace the placeholders with your actual bot tokens and API keys.

5. **Running the Discord bot:** Execute the Discord bot script using the following command:

   ```bash
   php bot/discord/index.php
   ```

6. **Running the Telegram bot:** Run the Telegram bot script using the following command:

   ```bash
   php bot/telegram/telegram_bot.php
   ```

Congratulations! QuoteBot is now up and running on your local machine. You can invite the Discord bot to your server or interact with the Telegram bot by searching for it in the Telegram app.

## Quotes Source

The quotes used by QuoteBot are sourced from a collection of famous quotes available at [https://type.fit/api/quotes](https://type.fit/api/quotes). 

## Contributing

Contributions to QuoteBot are welcome! If you find any issues or have suggestions for improvements, please submit an issue or pull request. Make sure to adhere to the existing coding style and follow best practices.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

---

Feel free to customize the project name, adjust the setup instructions, or add more details to the README file according to your preferences and the specific needs of your project.
