<!-- HEader -->        
<?php echo $__env->make('admin.layout._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    

<!-- Page content -->
<div class="page-content">
<?php echo $__env->make('admin.layout._sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- BEGIN Content -->
<div id="main-content">
    <?php echo $__env->yieldContent('main_content'); ?>
</div>
    <!-- END Main Content -->

<!-- Footer -->        
<?php echo $__env->make('admin.layout._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
</div>  
                
              