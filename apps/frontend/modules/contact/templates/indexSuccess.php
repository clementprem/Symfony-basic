<form action="<?php echo url_for('contact/index') ?>" method="POST">
    <table>
        <tr>
        <td colspan="2">
        <ul class="error_list">
        <li>Referrer: Required.</li>
        </ul>
        </td>
        </tr>

        <tr>
            <th><?php echo $form['name']->renderLabel() ?>:</th>
            <td>
                <?php echo $form['name']->renderError() ?>
                <?php echo $form['name'] ?>
            </td>
            <th><?php echo $form['email']->renderLabel() ?>:</th>
            <td>
                <?php if ($form['email']->hasError()): ?>
                <ul class="error_list">
                <?php foreach ($form['email']->getError() as $error): ?>
                <li><?php echo $error ?></li>
                <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php echo $form['email'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['subject']->renderLabel() ?>:</th>
            <td colspan="3">
                <?php echo $form['subject']->renderError() ?>
                <?php echo $form['subject'] ?>
            </td>
        </tr>
        <tr>
            <th><?php echo $form['message']->renderLabel() ?>:</th>
            <td colspan="3">
                <?php echo $form['message']->renderError() ?>
                <?php echo $form['message'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" />
            </td>
        </tr>
    </table>
</form>
