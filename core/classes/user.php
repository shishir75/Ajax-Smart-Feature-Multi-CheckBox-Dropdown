<?php

	class User
	{
    protected $pdo;
    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function checkInput($var)
    {
      $var = htmlspecialchars($var);
      $var = trim($var);
      $var = stripcslashes($var);
      return $var;
    }

		public function viewUsers()
		{
			$sql = "SELECT * FROM users ORDER BY user_id DESC";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll();
		}

    public function viewUserByID($user_id)
    {
      $sql = "SELECT * FROM users WHERE user_id = :user_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(":user_id", $user_id);
      $stmt->execute();

      return $stmt->fetch();
    }


    public function update_status($status, $user_id)
    {
      $sql = "UPDATE users SET status = :status WHERE user_id = :user_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(":status", $status);
      $stmt->bindValue(":user_id", $user_id);
      $stmt->execute();
    }

    public function delete_user($user_id)
    {
      $sql = "DELETE FROM users WHERE user_id = :user_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(":user_id", $user_id);
      $stmt->execute();

    }


    public function create($table, $fields = array())
    {
      $columns = implode(',', array_keys($fields));
      $values  = ':'.implode(', :', array_keys($fields));
      $sql = "INSERT INTO {$table} ({$columns}) VALUES({$values})";
      $stmt = $this->pdo->prepare($sql);

      if ($stmt) {
        foreach ($fields as $key => $data) {
          $stmt->bindValue(':'.$key, $data);
        }
        $stmt->execute();
        return $this->pdo->lastInsertId();
      }
    }


    public function update($table, $user_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
            $columns .= ', ';
        }
        $i++;
      }
      $sql = "UPDATE {$table} SET {$columns} WHERE user_id = {$user_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }
        $stmt->execute();
      }
    }
























}



?>