<?php
require_once("logging.php");

/**
 * DataAccessObject
 */
class DAO {
    const DB_HOST = "localhost";
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
            $this->pdo = new PDO("mysql:"+self::DB_HOST."; dbname=ubilab_pos", self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * PreparedStatementを準備して返す
     * @param type $statement SQL文
     * @param type $driver_options ドライバオプション
     */
    public function prepare($statement, $driver_options = array()) {
        return $this->pdo->prepare($statement, $driver_options);
    }

    public function __destruct() {
        $this->pdo = null;
    }
}
?>
