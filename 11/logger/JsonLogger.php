<?php

namespace logger;

use Psr\Log\LoggerInterface;

class JsonLogger implements LoggerInterface
{
    private $fileName;
    private $file;
    private $count = 0;

    /**
     * JsonLogger constructor.
     *
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->file = fopen($this->fileName, "w+");
        fwrite($this->file, "[\n");
    }

    public function __destruct()
    {
        fwrite($this->file, "\n]");
        fclose($this->file);
    }

    public function emergency($message, array $context = array())
    {
        $this->log("warning", $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log("alert", $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log("critical", $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log("error", $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log("warning", $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log("notice", $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log("info", $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log("debug", $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        $json = json_encode(
            [
            "type" => $level,
            "date" => date("d m Y H:i:s"),
            "message" => $message
            ], JSON_PRETTY_PRINT
        );

        if ($this->count == 0) {
            fwrite($this->file, $json);
            $this->count++;
        } else {
            fwrite($this->file, ",\n".$json);
        }

    }

}
