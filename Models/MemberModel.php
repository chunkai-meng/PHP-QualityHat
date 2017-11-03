<?php
class MemberModel
{
  public $ID;
  public $Email;
  public $PasswordHash;
  public $EmailConfirmed;
  public $PhoneNumber;
  public $Name;
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
                  Users.Username As name,
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
    $sql = "INSERT INTO Users (Username, Email, PasswordHash, CustomerName) VALUES ('$this->Name', '$this->Email', '$this->PasswordHash', '$this->CustomerName')";
    if (!$mysqli->query($sql)) {
        echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
  }

  public function check_passwd($name, $passwd){
    include 'db_connection.php';
    $sql = "SELECT PasswordHash FROM Users WHERE Username='$name'";
    // "SELECT `password` FROM `users` WHERE `username` = '$loggin_user'";
    $rs=$mysqli->query($sql);
    if (!$rs)
      {exit("Error in SQL");}
    // $password_hash = mysqli_result($sql, 0);
    $row = mysqli_fetch_array($rs);
    $password_hash = $row[0];

    if (password_verify($passwd, $password_hash)) {
      echo 'Password is valid!';
      return (true);
    } else {
        echo 'Invalid password.';
      return (false);
    }
  }

  public function check_login(){
    session_start(); //starting session
    //checking if user is not authenticated
    if (!isset($_SESSION['flag']) || ($_SESSION['flag'] == false))
    {
      if (!$_GET['content_page'])
      {
        $full_name = $_SERVER['PHP_SELF'];
        $full_name = str_replace(".php","",$full_name);
        $full_name = str_replace("/xli2017s1_wad/PHPPractical/","",$full_name);
      }
      else
      {
        $full_name = $_GET['content_page'];
      }

      $_SESSION['request_page'] = $full_name;
      header("Location: index.php?content_page=Member&action=Login");
      return(false);
    }
    else
    {
      return (true);
    }
  }
}
