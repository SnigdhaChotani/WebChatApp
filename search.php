<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'company');

$term = $_GET['term'];
if (isset($term)){
    $return_arr = array();

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $attr = 'name';
        $table = 'countries';
        if (substr($term, 0, 1) === '@')
        {
            $term = ltrim($term, '@');
            $attr = 'name';
            $table = 'birds';
        }
        $stmt = $conn->prepare('SELECT '.$attr.' FROM '.$table.' WHERE '.$attr.' LIKE :term');        
        $stmt->execute(array('term' => '%'.$term.'%'));
        
        while($row = $stmt->fetch()) {
            if ($attr === 'birdname')
            {
                $return_arr[] =  '@'.$row[$attr];
            }
            else{
                $return_arr[] =  $row[$attr];
            }
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

?>
