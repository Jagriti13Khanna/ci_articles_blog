<!-- views/home_detail_view.php  -->
<h1><?php echo $heading?></h1> 
<?php if(($results)) : ?> 
    <?php foreach($results as $row): ?> 
        <div class="well"> 
            <h3><?php echo $row->title ?></h3> 
            <p><?php echo $row->description ?></p> 
            <div class="d-flex">
                <p class="mr-5"><a href="<?php echo base_url() ."home/edit/" .$row->article_id;?>" class="btn btn-primary btn-sm">Edit</a></p>
                <p class="mr-5"><a href="<?php echo base_url() ."home/delete/" .$row->article_id;?>" class="btn btn-danger btn-sm">Delete</a></p>
            </div>
        </div> 
    <?php endforeach;?> 
<?php else:?> 
    <p>No results</p> 
<?php endif; ?>