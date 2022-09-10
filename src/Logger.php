<?php

namespace App;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonoLog;

class Logger
{
    const MAIN_LOGGER_NAME = 'main';

    public static function getLogger(string $name = null, string $logFile = null): MonoLog
    {
        if (!$name) {
            return new MonoLog(self::MAIN_LOGGER_NAME, [(new StreamHandler(ERROR_LOG_FILE, MonoLog::ERROR))
                ->setFormatter(self::getFormatter())]);
        }

        return new MonoLog($name, [(new StreamHandler($logFile, MonoLog::INFO))->setFormatter(self::getFormatter())]);
    }

    private static function getFormatter(): LineFormatter
    {
        return new LineFormatter(
            "[%datetime%] %channel%.%level_name%: %message%\n",
            null,
            true
        );
    }
}
