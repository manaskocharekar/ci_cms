
<h2 align = "center"> All Pages </h2>
<?= anchor('Admin/Page/edit', '<i class= "icon-plus"></i> Add new'); ?>



<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Parent</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; if(count($Pages)) : foreach ($Pages as $Page): ?>
  
    <tr> 
      <th scope="row"><?= $i; ?></th>
      <td><?= anchor('Admin/Page/edit/' . $Page->pg_id, $Page->pg_title); ?></td>
      <td><?= $Page->parent_slug; ?></td>
      <td><?= btn_edit('Admin/Page/edit/'. $Page->pg_id); ?></td>
      <td><?= btn_delete('Admin/Page/delete/'. $Page->pg_id); ?></td>
    </tr>
  <?php $i++; endforeach;  else: ?>
    <tr colspan = "3"> No Pages Found</tr>
  <?php endif; ?>
   </tbody>
</table>