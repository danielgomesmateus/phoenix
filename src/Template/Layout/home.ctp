<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="sumit kumar">
        <title>
            Fênix - Soluções em TI e Assessoria Contábil
        </title>
        <?php echo $this->Html->css('font-awesome/css/font-awesome.min.css'); ?>
        <?php echo $this->Html->css('style.min.css'); ?>
        <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans'); ?>
    </head>
    <body>
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->Element('Common/navbar'); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->Element('Common/contact'); ?>
        <?php echo $this->Element('Common/footer'); ?>
        <?php echo $this->Element('Common/scripts'); ?>
    </body>
</html>
