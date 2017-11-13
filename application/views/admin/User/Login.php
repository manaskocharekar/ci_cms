<div class = "modal-header">
    <h3>Log In</h3>

</div>
<div class = "modal-body">
    <?php //echo '<pre>'. print_r($this->session->all_userdata(), TRUE) . '</pre>' ; ?>
    <?= validation_errors(); ?>
    <?= form_open(); ?>
    <table class = "table">
        <tr>
            <td>Email</td>
            <td><?= form_input('email'); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><?= form_password('password'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_submit('submit', 'Log In', 'class = "btn btn-primary"'); ?></td>
        </tr>   
    </table>
    <?= form_close(); ?>
</div>