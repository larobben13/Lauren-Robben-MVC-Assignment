<?php include('header.php')?>
<section>
        <h2>My To Do List</h2>
        <form action = "<?php echo $_SERVER['PHP_SELF']?>" method="GET">
            <input type="hidden" name="action" value="select">
            <label for= 'todoitems'>ToDo Items:</label>
            <input type="text" itemnum="todoitems" name="todoitems" required>
            <button>Submit</button>
            </form>
    </section>
    <section>
        <h2>Add To Do Items</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="hidden" name="action" value="insert">
                <label for='newtodoitems'>Title:</label>
                <input type="text" itemnum="newtodoitems" name="todoitems" required>
                <label for='description'>Description:</label>
                <input type="text" itemnum="description" name="description" required>
                <button>Submit</button>
            </form>
    </section>
    
<?php include('footer.php')?>
