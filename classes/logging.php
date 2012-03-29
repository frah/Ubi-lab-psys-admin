<?php
class Logger {
    const LOGGING_PATH = "C:\apache\logs\ubipos_error.log";
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function log($mes) {
        $date = date("Y/m/d H:i:s");
        error_log($date." - ".$this->name."\n".$mes."\n", 3, self::LOGGING_PATH);
    }
}
?>
