<!-- views/home_read_view.php  -->
<h1><?php echo $heading?></h1> 
<?php if(($results)) : ?> 
    <?php foreach($results as $row): ?> 
        <div class="whatever"> 
            <h4><?php echo $row->title ?></h4> 
            <p class="mr-5"><a href="<?php echo base_url()?>home/detail/<?php echo $row->article_id ?>" class="btn btn-info">Read more...</a></p>
        </div> 
    <?php endforeach;?> 
<?php endif; ?>