
    <h3><?php echo empty($Page->pg_id) ? 'Add a new Page' : 'Edit Page:  ' .'<span style = "color: #1b5e20;">'.  $Page->pg_title. '</h1>' ;?></h3>

    <?php //echo '<pre>'. print_r($this->session->all_Pagedata(), TRUE) . '</pre>' ; ?>
    <?= validation_errors(); ?>
    <?= form_open(); ?>
    <table class = "table">
        <tr>
            <td>Parent</td>
            <td><?= form_dropdown('pg_parent_id', $pages_no_parents, $this->input->post('pg_parent_id') ? $this->input->post('pg_parent_id') : $Page->pg_parent_id); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_hidden('pg_id', set_value('pg_id', $Page->pg_id)); ?></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><?= form_input('pg_title', set_value('pg_title', $Page->pg_title)); ?></td>
        </tr>
        <tr>
            <td>Slug</td>
            <td><?= form_input('pg_slug', set_value('pg_slug', $Page->pg_slug)); ?></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><?= form_textarea('pg_content', set_value('pg_content', $Page->pg_content), 'id = mytextarea', 'cols=5000'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_submit('submit', 'Save', 'class = "btn btn-primary"'); ?></td>
        </tr>   
    </table>
    <?= form_close(); ?>
