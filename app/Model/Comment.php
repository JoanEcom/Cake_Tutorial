<?php

class Comment extends AppModel {

    public $validate = array(
        'message' => array(
            'rule' => 'notBlank'
        )
    );
}
