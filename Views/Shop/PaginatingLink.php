<?php
if($id != -1) {
  echo "
  <li><a class='btn btn-outline-secondary $last_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $lastpage . "&ID=".$id."'><<<</a></li>
  <li><a class='btn btn-outline-secondary $next_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $nextpage . "&ID=".$id."'>>>>></a></li>
  ";
} else {
  echo "
  <li><a class='btn btn-outline-secondary $last_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $lastpage . "'><<<</a></li>
  <li><a class='btn btn-outline-secondary $next_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $nextpage . "'>>>>></a></li>
  ";
}

?>
