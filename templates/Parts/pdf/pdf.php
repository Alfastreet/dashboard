<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $parts
 */

use Cake\Chronos\Date;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= 'Inventario Alfastreet a fecha de ' . Date::now() ?></title>
</head>

<body>
    <h1><?= 'Inventario Alfastreet a fecha de ' . Date::now() ?></h1>

    <table class="display table table-responsive table-striped table-hover table-sm table-bordered text-center">
        <thead>
            <tr>
                <th><?= __('Serial') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Moneda') ?></th>
                <th><?= __('Precio') ?></th>
                <th><?= __('Tipo de Producto') ?></th>
                <th><?= __('Cantidad Disponible') ?></th>
                <th><?= __('Imagen') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parts as $part) : ?>
                <tr>
                    <td><?= h($part->serial) ?></td>
                    <td><?= h($part->name) ?></td>
                    <td><?= $part->has('money') ? h($part->money->name) : '' ?></td>
                    <td><?= $this->Number->currency($part->value, $part->has('money') ? h($part->money->shortcode) : '' ) ?></td>
                    <td><?= $part->has('typeproduct') ? h($part->typeproduct->type) : '' ?></td>
                    <td><?= h($part->amount) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>