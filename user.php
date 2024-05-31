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
        // Debugging output
        echo "Inserting user: $username<br>";
        try {
            $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $result = $statement->execute();
            // Debugging output
            if ($result) {
                echo "User successfully inserted.<br>";
            } else {
                echo "Failed to insert user.<br>";
                print_r($statement->errorInfo());
            }
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
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

    public function get_user_by_username($username) {
        $db = db_connect();
        if ($db === null) {
            return false;
        }
        $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
?>
