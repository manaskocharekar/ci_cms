
<h2 align = "center"> All Users </h2>
<?= anchor('Admin/User/edit', '<i class= "icon-plus"></i> Add new'); ?>



<table class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>Edit Name</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; if(count($users)) : foreach ($users as $user): ?>
  
    <tr> 
      <th scope="row"><?= $i; ?></th>
      <td><?= anchor('Admin/User/edit/' . $user->usr_id, $user->usr_name); ?></td>
      <td><?= btn_edit('Admin/User/edit/'. $user->usr_id); ?></td>
      <td><?= btn_delete('Admin/User/delete/'. $user->usr_id); ?></td>
    </tr>
  <?php $i++; endforeach;  else: ?>
    <tr colspan = "3"> No Users Found</tr>
  <?php endif; ?>
   </tbody>
</table>