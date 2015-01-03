<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->params['title']; ?></title>
        <?php foreach ($this->params['styles'] as $value) { ?>
            <link rel="stylesheet" href="View/css/<?php echo $value; ?>">
        <?php } ?>
        <?php foreach ($this->params['scripts'] as $value) { ?>
            <script src="View/js/<?php echo $value; ?>"></script>
        <?php } ?>
    </head>
    <body>
        <header>
            
        </header>
        <main>
        