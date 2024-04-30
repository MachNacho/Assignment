<?php
include_once("DBconnect.php");

// Retrieve search parameters
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category = isset($_GET['searchItems']) ? $_GET['searchItems'] : '';

$sql = "SELECT * FROM products";

//function to create the order by query
function DBsorting($category){
    switch($category)
    {
        case 1:
            return " ORDER BY LastUpdate DESC";
            break;
        case 2:
            return " ORDER BY LastUpdate ASC";
            break;
        case 3:
            return " ORDER BY Price DESC";
            break;
        case 4:
            return " ORDER BY Price ASC";
            break;
        default:
        break;
    }
}

// Build SQL query
$sql = "SELECT * FROM products WHERE 1";

if (!empty($keyword)) {
    $sql .= " AND (Name LIKE '%$keyword%')";
}

if (!empty($category)) {
    $sql .= DBsorting($category);
}

// Execute SQL query
$result = $conn->query($sql);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

?>

