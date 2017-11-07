<?php
if($id != -1) {
  echo "
  <a class='btn btn-outline-secondary $last_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $lastpage . "&ID=".$id."'>Prev</a>
  <a class='btn btn-outline-secondary $next_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $nextpage . "&ID=".$id."'>Next</a>
  ";
} else {
  echo "
  <a class='btn btn-outline-secondary $last_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $lastpage . "'>Prev</a>
  <a class='btn btn-outline-secondary $next_disabled' role='button' href='index.php?content_page=Shop&limit=3&page=". $nextpage . "'>Next</a>
  ";
}

?>
