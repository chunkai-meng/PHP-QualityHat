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
    $sql= "SELECT ID,
                  Email,
                  PasswordHash,
                  EmailConfirmed,
                  PhoneNumber,
                  Username,
                  Address,
                  CustomerName,
                  Enabled
          FROM Users";
    $rs=$mysqli->query($sql);
    if (!$rs)
      {exit("Error in SQL");}
    return $rs;
  }

  public function getuserid($name)
  {
    include 'db_connection.php';
    $sql="SELECT Users.ID FROM Users WHERE Username='$name'";
    $rs=$mysqli->query($sql);
    if (!$rs)
      {exit("Error in SQL");}
    $row = mysqli_fetch_array($rs);
    $userid = $row[0];
    return $userid;
  }

  public function getuserinfo($id)
  {
    include 'db_connection.php';
    echo "<br>ID: $id<br>";
    $sql='SELECT CustomerName, PhoneNumber, Address FROM Users WHERE id='.$id;
    $rs=$mysqli->query($sql);
    if (!$rs)
      {exit("Error in SQL");}
    // $password_hash = mysqli_result($sql, 0);
    if ($rs->num_rows == 1) {
      // output data of each row
      echo "<br>The Result is :<br>";
      $row = $rs->fetch_assoc();
      $this->CustomerName = $row["CustomerName"];
      $this->PhoneNumber = $row["PhoneNumber"];
      $this->Address = $row["Address"];
    } else {
        echo "User Not Found!";
    }
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
    $sql = "INSERT INTO Users (Username, Email, PasswordHash, CustomerName, PhoneNumber, Address) VALUES ('$this->Name', '$this->Email', '$this->PasswordHash', '$this->CustomerName', '$this->PhoneNumber', '$this->Address')";
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
