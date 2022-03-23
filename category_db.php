<?php 
//Textbook Example
function get_categories() {
    global $db;
    $query = 'SELECT * FROM category
                ORDER BY categoryID';
                $statement = $db->prepare($query);
                $statement->execute();
                $items = $statement->fetchAll();
                $statement->closeCursor();
                return $categories;
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM category
                WHERE categoryID = :category_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':category_id', $category_id);
                $statement->execute();
                $items = $statement->fetchAll();
                $statement->closeCursor();
                $category_name = $category['categoryName'];
                return $category_name;
}

function delete_category($category_id) { 
    global $db;
$query = 'DELETE FROM category
            WHERE categoryID = :category_id'; 
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id); 
            $statement->execute(); 
            $statement->closeCursor();
}

function add_category($category_id, $categoryName) { 
    global $db;
$query = 'INSERT INTO products (categoryID, categoryname,) 
            VALUES (:category_id, :categoryname)'; 
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id); 
            $statement->bindValue(':categoryname', $categoryName); 
            $statement->execute(); 
            $statement->closeCursor();
} 
?>

