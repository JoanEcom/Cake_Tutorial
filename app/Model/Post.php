<?php

class Post extends AppModel {
    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'order' => 'Comment.created DESC',
        )
    );

    public function beforeSave($options = array()) 
    {
        if (!empty($this->data['Post']['title']) && !empty($this->data['Post']['body']) && !empty($this->data['Post']['tags'])) 
        {
            $this->data['Post']['tags'] = $this->tagsFormatBeforeSave($this->data['Post']['tags']);
        }
        return true;
    }

    public function tagsFormatBeforeSave($tags)
    {
        $tags = explode(",", $tags);
        return json_encode($tags);
    }

    public function afterFind($results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val['Post']['tags'])) {
                $results[$key]['Post']['tags'] = $this->tagsFormatAfterFind($val['Post']['tags']);
            }
        }
        return $results;
    }
    
    public function tagsFormatAfterFind($tags) {
        $tags = json_decode($tags);       
        $tags = implode(" ", $tags);
        return trim($tags, '"');
    }
    

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
