
<h2 align = "center"> All Posts </h2>
<?= anchor('Admin/Post/edit', '<i class= "icon-plus"></i> Add new'); ?>



<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Publication Date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; if(count($Posts)) : foreach ($Posts as $Post): ?>
  
    <tr> 
      <th scope="row"><?= $i; ?></th>
      <td><?= anchor('Admin/Post/edit/' . $Post->p_id, $Post->p_title); ?></td>
      <td><?= $Post->p_date ?></td>
      <td><?= btn_edit('Admin/Post/edit/'. $Post->p_id); ?></td>
      <td><?= btn_delete('Admin/Post/delete/'. $Post->p_id); ?></td>
    </tr>
  <?php $i++; endforeach;  else: ?>
    <tr colspan = "3"> No Posts Found</tr>
  <?php endif; ?>
   </tbody>
</table>