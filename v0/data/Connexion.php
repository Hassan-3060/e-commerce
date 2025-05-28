<?php

class Connexion
{
    private static ?PDO $_pdo = null;
    private static Connexion $_Instance;

    private function __construct() {

    }

    public function __destruct() {
        self::$_pdo = null ;
    }

    static public function getInstance(){
        // Verification que l'instance n'a pas déja ete initialisée
        if(!(self::$_Instance instanceof self)){
            self::$_Instance = new self();
        }
        // Retour de l'instance unique
        return self::$_Instance;
    }
    public static function _get(): PDO
    {


        try {

            $_pdo = new PDO('pgsql:host='.BDD_HOST.';port='.BDD_PORT.';dbname='.BDD_NAME, BDD_USER, BDD_PASS);
            $_pdo->exec('SET search_path TO '.BDD_SCHEMA);
            $_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $_pdo;


        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }


    }

    public static function prepare(string $query): PDOStatement {
        if (self::$_pdo === null) {
            self::_get();
        }
        try {
            return self::$_pdo->prepare($query);
        }
        catch (PDOException $e) {
            throw new RuntimeException('Error preparing query: ' . $e->getMessage(), 0, $e);
        }
    }


    public static function query(string $request) {
        $cnx = self::_get();
        $req = $cnx->prepare($request);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $ligne;
        }

        return $results;
    }

    public static function exec(string $query): int {
        if (is_null(self::$_pdo)) {
            self::_get();
        }
        return self::$_pdo->exec($query);
    }
}