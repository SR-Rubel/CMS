<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query="SELECT * FROM post";
        $all_post_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($all_post_query)){
        $post_id=$row['post_id'];
        $post_author=$row['post_author'];
        $post_title=$row['post_title'];
        $post_category_id=$row['post_category_id'];
        $post_status=$row['post_status'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_comment_count=$row['post_comment_count'];
        $post_date=$row['post_date'];

        $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
        $select_all_cat_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_cat_query)){
        $cat_title=$row['cat_title'];
        }

        echo "<tr>
        <td>$post_id</td>
        <td>$post_author</td>
        <td>$post_title</td>
        <td>$cat_title</td>
        <td>$post_status</td>
        <td><img src='../images/$post_image' alt='this is post image' class='img-reponsive' width='100'></td>
        <td>$post_tags</td>
        <td>$post_comment_count</td>
        <td>$post_date</td>
        <td><a href='posts.php?delete={$post_id}'>DELETE<a/></td>
        <td><a href='posts.php?source=edit_post&p_id={$post_id}'>EDIT POST<a/></td>
        </tr>";
        }
        ?>
        <?php ?>
    </tbody>
</table>

<?php 
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query="DELETE FROM post WHERE post_id=$delete_id";
        $delete_query=mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header("location: ./posts.php");
    }
?>