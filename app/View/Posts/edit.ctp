
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'Titulo'));
echo $this->Form->input('body', array('rows' => '3','label' => 'Texto'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Guardar Post');
?>