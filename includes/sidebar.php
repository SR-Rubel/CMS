<div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->



                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">


                                <?php
                                $query="SELECT * FROM categories";
                                $select_all_cat=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_cat)){
                                $cat_id=$row['cat_id'];
                                $post_cat=$row['cat_title'];
                                echo "<li><a href='./category_sort.php?category=$cat_id'>{$post_cat}</a>";
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                 <!-- Side Widget Well -->
                 <?php include "widget.php";?>

            </div>