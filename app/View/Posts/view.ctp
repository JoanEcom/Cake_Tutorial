
<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Creado: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<p><small><?php echo $post['Post']['tags']; ?></small></p>

<hr>

<h3 style="margin-top: 40px;">Agregar Comentario</h3>
<?php
echo $this->Form->create('Comment', array('url' => '/Comments/add'));
echo $this->Form->input('message', array('rows' => '3','label' => 'Comentario', 'style' => 'width: 40%;'));
echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));
echo $this->Form->end('Enviar');
?>

<?php foreach ($post['Comment'] as $comment): ?>
    <div style="width: 40%;">
        <div style="margin-right: 0px;">
            <?php
                echo $this->Form->postLink(
                    'Borrar',
                    array('controller' => 'comments', 'action' => 'delete', $comment['id']),
                    array('confirm' => '¿Esta seguro?')
                );
            ?>
        </div>
        <hr>
        <p><small><?php echo $comment['created']; ?></small></p>
        <p><?php echo h($comment['message']); ?></p>
    </div>
<?php endforeach; ?>
