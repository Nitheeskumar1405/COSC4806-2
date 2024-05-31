<?php
require_once('database.php');

class User {
    public function get_all_users() {
        $db = db_connect();
        if ($db === null) {
            return [];
        }
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function create_user($username, $password) {
        $db = db_connect();
        if ($db === null) {
            return false;
        }
        $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        return $statement->execute();
    }

    public function username_exists($username) {
        $db = db_connect();
        if ($db === null) {
            return false;
        }
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
?>
