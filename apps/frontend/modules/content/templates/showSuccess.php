<p> Hello world </p>
<?php if ($hour > 9): ?>
<p>or should i say good afternoon, it is already <?php echo $hour; ?> </p>
<?php endif; ?>
<form method="POST" action="<?php echo url_for('content/update') ?>">
    <lable for="name">What is your name</lable>
    <input type="text" name="name" id="name" value=""/>
    <input type="submit" id="ok"/>


    <?php echo link_to("I neversay my name", 'content/update?name=anonymous',
                       'class = special_link
                   confirm =  You idiot!! are you sure
                   absolute = false') ?>


</form>

