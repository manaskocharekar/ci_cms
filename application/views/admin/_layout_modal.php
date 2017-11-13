<?php $this->load->view('admin/include/header'); ?>

<div class = "supreme-container" >


<!-- Modal -->
<div class="modal-backdrop show " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style = "padding : 100px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
<?php $this->load->view($subview); ?> 
     
      <div class="modal-footer">
          <h5 align = "right"> &copyManasK <h5>
      </div>
    </div>
  </div>
</div>

</div>


<?php $this->load->view('admin/include/footer'); ?>