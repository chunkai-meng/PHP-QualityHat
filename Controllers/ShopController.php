<?php class ShopController {
  private $_conn;
  private $_limit;
  private $_page;
  private $_query;
  private $_links;
  private $_total;
  private $_categoryID;
  private $model;

  public function __construct($model) {
    $this->model = $model;
    require_once 'db_connection.php';
    $this->_conn = $mysqli;
  }

  public function index(){
    require 'db_connection.php';
    $this->_limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 3;
    $this->_page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    if(isset($_GET['ID'])){
      $this->_categoryID = $_GET['ID'];
      $this->_query = "SELECT * FROM hats WHERE CategoryID=$this->_categoryID";
    } else {
      $this->_categoryID = -1;
      $this->_query = "SELECT * FROM hats";
    }

    $rs = $mysqli->query( $this->_query );
    $this->_total = $rs->num_rows;

    $models    = $this->getData();
    require_once 'Views/Shop/index.php';
  }

  public function getData() {
    $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
    $rs         = $this->_conn->query( $query );
    if (!$rs)
      {exit("Error in SQL");}

    $results[] = null;
    while ( $row = $rs->fetch_assoc() ) {
        $results[]  = $row;
    }

    $result         = new stdClass();
    $result->page   = $this->_page;
    $result->limit  = $this->_limit;
    $result->total  = $this->_total;
    $result->data   = $results;
    return $result;
  }

  public function createLinks() {
    $current_page = $this->_page;
    $hat_number =  $this->_total;
    $page_needed =  ceil($this->_total/$this->_limit);
    $lastpage = ($current_page-1) <= 0 ? 0 : ($current_page-1);
    $nextpage = ($current_page+1) > $page_needed ? 0 : ($current_page+1);
    $last_disabled = $lastpage==0 ? 'disabled' : "";
    $next_disabled = $nextpage==0 ? 'disabled' : "";
    $id = $this->_categoryID;
    // echo "<br>$lastpage<br>$current_page<br>$nextpage<br>$page_needed<br>TotalHat:$hat_number";
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    require 'Views/Shop/PaginatingLink.php';
  }

}
?>
