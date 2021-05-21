<?php
App::uses('ModelBehavior', 'Model');

class JsonBehavior extends ModelBehavior {

    public function setup(Model $Model, $settings = array()) {
        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = array(
                'Post' => 'tags');
        }
        $this->settings[$Model->alias] = array_merge(
            $this->settings[$Model->alias], (array)$settings);
    }

    public function beforeSave(Model $model,$options = array()) 
    {
        $model->data[$model->name][$this->settings[$model->name][$model->name]] = $this->jsonFormatBeforeSave($model->data[$model->name][$this->settings[$model->name][$model->name]]);
        return true;
    }

    public function jsonFormatBeforeSave($attribute)
    {
        $attribute = explode(",", $attribute);
        return json_encode($attribute);
    }

    public function afterFind(Model $model, $results, $primary = false) {
        foreach ($results as $key => $val) {
            if (isset($val[$model->name][$this->settings[$model->name][$model->name]])) {
                $results[$key][$model->name][$this->settings[$model->name][$model->name]] = $this->jsonFormatAfterFind($val[$model->name][$this->settings[$model->name][$model->name]]);
            }
        }
        return $results;
    }
    
    public function jsonFormatAfterFind($attribute) {
        $attribute = json_decode($attribute);       
        $attribute = implode(" ", $attribute);
        return trim($attribute, '"');
    }

}
?>