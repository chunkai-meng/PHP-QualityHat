<?php
require_once 'Views/Shared/CheckSession.php';

if (!isset($_SESSION['flag']) || ($_SESSION['flag'] == false))
{
  if (!$_GET['content_page'])
  {
    $full_name = $_SERVER['PHP_SELF'];
    $full_name = str_replace(".php","",$full_name);
    $full_name = str_replace("/mengc06/PHPPractical/","",$full_name);
  }
  else
  {
    $full_name = $_GET['content_page'];
  }

  $_SESSION['request_page'] = $full_name;
  header("Location: index.php?content_page=Member&action=Login");
  exit;
}
?>
