<h1>Blog posts</h1>
<?php echo $this->Html->link(
    'Agregar Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Acciones</th>
        <th>Creado</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php
            echo $this->Form->postLink(
                'Borrar',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => '¿Esta seguro?')
            );
            ?>
            <?php
                echo $this->Html->link(
                    'Editar',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>