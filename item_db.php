<?php
function select_item_by_category($todoitems) {
    global $db;
    $query = 'SELECT * FROM todoitems
                WHERE Title = :todoitems
                ORDER BY itemnum DESC';
                $statement = $db->prepare($query);
                $statement->bindValue(':todoitems', $todoitems);
                $statement->execute();
                $items = $statement->fetchAll();
                $statement->closeCursor();
                return $results;
                
}

function insert_item($todoitems, $description) {
    global $db;
    $count = 0;
    $query =  'INSERT INTO todoitems
                (Title, Description)
                        VALUES
                            (:newtodoitems, :newdescription)';
                $statement = $db->prepare($query);
                $statement->bindValue(':newtodoitems', $newtodoitems);
                 $statement->bindValue(':newdescription',$description);
               if($statement->execute()) {
                $count = $statement->rowCount();
               };
                $statement->closeCursor();
                return $count;
}


function delete_item($itemnum) {
    global $db;
    $count = 0;
    $query = 'DELETE * FROM todoitems
                WHERE ITEMNUM = :itemnum';
                $statement = $db->prepare($query);
                $statement->bindValue(':itemnum', $itemnum);
                if($statement->execute()) {
                    $count = $statement->rowCount();
                };
                $statement->closeCursor();
                return $count;
                
}

function update_item($itemnum, $todoitems, $description) {
    global $db;
    $count = 0;
    $query = 'UPDATE todoitems 
                    SET Title = :todoitems, Description=:description
                        WHERE ITEMNUM =:itemnum';
                $statement = $db->prepare($query);
                $statement->bindValue(':itemnum', $itemnum);
                $statement->bindValue(':todoitems', $todoitems);
                $statement->bindValue(':description', $description);
                if($statement->execute()){
                    $count = $statement->rowCount();
                };
                $statement->closeCursor();
                return $count;
            }
?>
