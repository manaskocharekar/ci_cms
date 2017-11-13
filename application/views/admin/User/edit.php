<div class = "modal-header">
    <h3><?php echo empty($user->usr_id) ? 'Add a new user' : 'Edit User:  ' .'<span style = "color: #1b5e20;">'.  $user->usr_name. '</h1>' ;?></h3>

</div>
<div class = "modal-body">
    <?php //echo '<pre>'. print_r($this->session->all_userdata(), TRUE) . '</pre>' ; ?>
    <?= validation_errors(); ?>
    <?= form_open(); ?>
    <table class = "table">
        <tr>
            <td></td>
            <td><?= form_hidden('usr_id', set_value('usr_id', $user->usr_id)); ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?= form_input('usr_name', set_value('usr_name', $user->usr_name)); ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= form_input('usr_email', set_value('usr_email', $user->usr_email)); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?= form_password('usr_pass'); ?></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><?= form_password('password_confirm'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_submit('submit', 'Save', 'class = "btn btn-primary"'); ?></td>
        </tr>   
    </table>
    <?= form_close(); ?>
</div>