<?php 
require('model/database.php'); 
require('model/item_db.php'); 
require('model/category_db.php');

$itemnum = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);

//$newtodoitems = filter_input(INPUT_POST, "newtodoitems", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'create_read_form';
    }
}

$todoitems = filter_input(INPUT_POST, "newtodoitems", FILTER_SANITIZE_STRING);
if(!$todoitems) {
    $todoitems = filter_input(INPUT_GET, "todoitems", FILTER_SANITIZE_STRING);

}
?>

<section>
    <h2>Category Manager</h2>
        <form action="add_category.php" method="POST" id="add_category">

            <label>Category:</label>
            <select name="category_id">
            <option value="school">School</option> 
            <option value="sports">Sports</option> 
            <option value="personal">Personal</option>
            <option value="work">Work</option>

            </select>
            <label>&nbsp;</label>
            <input type="submit" value="Add Category"><br>
                </form>
</section>
    
<?php
 //Switch/Navigation for Pages
        switch($action){
            case 'select':
                if($todoitems){
                    $results = select_item_by_category($todoitems);
                    include('view/update_delete_form.php');
                } else{
                    $error_message = "invalid item data. Check all fields.";
                    include('view/error.php');
                }
                break;
            case 'insert':
                if($todoitems && $description){
                    $count = insert_item($todoitems, $description);
                    header("Location: .?action=select&todoitems={$todoitems}&created={$count}");
                }else{
                    $error_message = "invalid item data. Check all fields.";
                    include('view/error.php');
                }
                break;
            case 'update':
            if($itemnum && $todoitems && $description){
                $count = insert_item($todoitems, $description);
                header("Location: .?action=select&todoitems={$todoitems}&updated={$count}");
            }else{
                $error_message = "invalid item data. Check all fields.";
                include('view/error.php');
            }
                break;
            case 'delete':
                if($itemnum){
                    $count = delete_item($itemnum);
                    header("Location: .?deleted{$count}");
                }
                break;
            default:
            include('view/create_read_form.php');

        }
    
    ?>
