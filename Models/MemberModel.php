<?php
class MemberModel
{
  public $ID;
  public $Email;
  public $PasswordHash;
  public $EmailConfirmed;
  public $PhoneNumber;
  public $UserName;
  public $Address;
  public $CustomerName;
  public $Enabled;

  public function get_all()
  {
    include 'db_connection.php';
    $sql="SELECT Users.ID As id,
                  Users.Email As email,
                  Users.PasswordHash As password,
                  Users.EmailConfirmed As email_confirmed,
                  Users.PhoneNumber As phone,
                  Users.UserName As name,
                  Users.Address As address,
                  Users.CustomerName As customer_name,
                  Users.Enabled As enabled
          FROM Users";
    $rs=$mysqli->query($sql);
    if (!$rs)
      {exit("Error in SQL");}
    return $rs;
  }

  public function enable($id) {
    include 'db_connection.php';
    $sql = "UPDATE Users SET Enabled=1 WHERE id=$id";
    if (!$mysqli->query($sql)) {
        echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
  }

  public function disable($id) {
    include 'db_connection.php';
    $sql = "UPDATE Users SET Enabled=0 WHERE id=$id";
    if (!$mysqli->query($sql)) {
        echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
  }

  public function create() {
    include 'db_connection.php';
    $sql = "INSERT INTO Users (Name, Description) VALUES ('$this->Name', '$this->Description')";
    if (!$mysqli->query($sql)) {
        echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
  }
}
