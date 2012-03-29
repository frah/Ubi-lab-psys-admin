<?php
require_once("logging.php");

/**
 * DataAccessObject
 */
class DAO {
    const DB_HOST = "localhost";
    const DB_NAME = "ubilab_pos";
    const DB_USER = "ubilab_admin";
    const DB_PASS = "ubilab_admin";

    private $pdo;
    private $logger;

    /**
     * コンストラクタ
     * DB接続失敗時はPDOExceptionをスロー
     */
    public function __construct() {
        $this->logger = new Logger("DAO");

        try {
            $this->pdo = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * PreparedStatementを準備して返す
     * @param string $statement SQL文
     * @param string $driver_options ドライバオプション
     * @return PDOStatement PreparedStatementクラスオブジェクト
     */
    public function prepare($statement, $driver_options = array()) {
        return $this->pdo->prepare($statement, $driver_options);
    }

    /**
     *
     * @param string $statement SQLクエリ
     * @return PDOStatement 結果セット
     */
    public function query($statement) {
        $ret = $this->pdo->query($statement);
        if ($ret === false) {
            $this->logger->log(print_r($this->pdo->errorInfo(), true));
        }
        return $ret;
    }

    /**
     * データベースごとに適切なクオート処理を施す
     * @param string $string クオート処理する文字列
     * @return string クオート済み文字列
     */
    public function quote($string) {
        return $this->pdo->quote($string);
    }

    public function __destruct() {
        $this->pdo = null;
    }
}
?>
