<?php

declare(strict_types=1);

namespace App\Utils;

use Illuminate\Support\Facades\{DB, Log};

final class DbTransactionManager
{
    /** @var array */
    private array $additionalErrMsgData;

    /**
     * @param callable $callback
     * @param string $logChannelName
     * @throws \Throwable
     * @return void
     */
    public function wrap(callable $callback, string $logChannelName = 'db_transaction_err'): void
    {
        DB::beginTransaction();

        $this->additionalErrMsgData = [];

        try {
             $callback();
        } catch (\Throwable $exception) {
            DB::rollBack();

            $errMsg = 'ERROR: ' . $exception->getMessage() . PHP_EOL
                . 'STACK TRACE: ' . $exception->getTraceAsString();

            if ($this->additionalErrMsgData !== []) {
                $errMsg .= PHP_EOL . 'ADDITIONAL DATA: ' . Json::encode(array: $this->additionalErrMsgData);
            }

            Log::channel(channel: $logChannelName)->debug(message: $errMsg);

            $this->additionalErrMsgData = [];

            throw $exception;
        }

        DB::commit();
    }

    /**
     * @param array $additionalErrMsgData
     * @return void
     */
    public function writeAdditionalErrMsgData(array $additionalErrMsgData): void
    {
        $this->additionalErrMsgData = $additionalErrMsgData;
    }
}
