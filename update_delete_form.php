<?php include('header.php')?>
<?php 
    if ($results) {?>
            <section>
                <h2>Update or Delete Data</h2>
                <?php foreach ($results as $result){
                    $itemnum = $result["ItemNum"];
                    $todoitems = $result["Title"];
                    $description = $result["Description"];
                ?>
                <form class="update" action="." method="POST">
                    <input type="hidden" name="action" value="update">
                <input type="hidden" name="itemnum" value="<?php echo $itemnum ?>">

                <label for="todoitems-<?php echo $itemnum ?>">Title:</label>
                <input type="text" itemnum="todoitems-<?php echo $todoitems?>" name="todoitems" value="-<?php echo $todoitems?>" required>
                <label for="description-<?php echo $itemnum ?>">Description:</label>
                <input type="text" itemnum="description-<?php echo $description?>" name="description" value="-<?php echo $description?>" required>
                <button>Update</button>
                </form>
                <form class="delete" action="." method="POST">
                <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="itemnum" value="<?php echo $itemnum?>">
                    <button class="red">Delete</button>
                </form>
                <?php }?>
        </section>
       
       <?php } else {?>
        <p>Sorry, No to do list items exist yet</p>
        <?php }?>
<?php include('footer.php')?>