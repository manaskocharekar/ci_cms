
    <h3><?php echo empty($Post->p_id) ? 'Add a new Post' : 'Edit Post:  ' .'<span style = "color: #1b5e20;">'.  $Post->p_title. '</h1>' ;?></h3>

    <?php //echo '<pre>'. print_r($this->session->all_Postdata(), TRUE) . '</pre>' ; ?>
    <?= validation_errors(); ?>
    <?= form_open(); ?>
    <table class = "table">
        <tr>
            <td>Publication Date</td>
            <td><?= form_input('p_date', set_value('p_date', $Post->p_date)); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_hidden('p_id', set_value('p_id', $Post->p_id)); ?></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><?= form_input('p_title', set_value('p_title', $Post->p_title)); ?></td>
        </tr>
        <tr>
            <td>Slug</td>
            <td><?= form_input('p_slug', set_value('p_slug', $Post->p_slug)); ?></td>
        </tr>
        <tr>
            <td>Content</td>
            <td><?= form_textarea('p_content', set_value('p_content', $Post->p_content), 'id = mytextarea', 'cols=5000'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= form_submit('submit', 'Save', 'class = "btn btn-primary"'); ?></td>
        </tr>   
    </table>
    <?= form_close(); ?>
