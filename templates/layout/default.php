<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sistema de Gestion AlfaStreet - ';
?>

<!doctype html>
<html lang="en">

<head>
    <base href="./">
    <!-- Required meta tags -->
    <?= $this->Html->charset('utf-8') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Option 1: CoreUI for Bootstrap CSS -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') ?>
    <?= $this->Html->css('/vendors/simplebar/css/simplebar.css') ?>
    <?= $this->Html->css('/css/vendors/simplebar.css') ?>
    <?= $this->Html->css(['style', 'examples']) ?>
    <?= $this->Html->css('/vendors/@coreui/chartjs/css/coreui-chartjs.css') ?>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
    </script>
    <title><?= $cakeDescription ?></title>
</head>

<body>
    <?php if($this->request->getSession()->read('Auth')){
        echo $this->element('sidebar'); 
    }?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <?php if($this->request->getSession()->read('Auth')){ 
            echo $this->element('header');
        } ?>

        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->element('scripts') ?>

</html>


<div class="content">

</div>