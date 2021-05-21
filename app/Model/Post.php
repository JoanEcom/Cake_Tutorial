<?php

class Post extends AppModel {
    public $actsAs = array('Json' => array('Post' => 'tags'));

    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'order' => 'Comment.created DESC',
        )
    );   

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        ),
        'tags' => array(
            'rule' => 'notBlank'
        )
    );
}
