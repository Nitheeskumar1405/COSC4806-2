<?php
require_once('database.php');

class User {
    public function get_all_users() {
        $db = db_connect();
        if ($db === null) {
            return [];  // Return an empty array if the database connection failed
        }
        $statement = $db->prepare("SELECT * FROM users;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function create_user($user_name, $user_password) {
        $db = db_connect();
        if ($db === null) {
            return false;  // Return false if the database connection failed
        }
        $statement = $db->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_password)");
        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(':user_password', $user_password);
        return $statement->execute();
    }
}
?>
