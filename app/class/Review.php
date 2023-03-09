<?php
namespace Class;
use Imy\Core\Model;

class Review extends Model
{

    protected $info;
    protected $model;
    protected $database = 'default';
    protected $entity = 'review';

    function __construct($data = false)
    {
        $this->model = M($this->entity, $this->database);
        $result = $this->model->get();
    }

    function datatable() {

        $items = M($this->entity,$this->database)->get();

        $items = $items->fetchAll();

        $return = [];
        $return['data'] = $items;

        return $items;
    }

    function create($data)
    {
        $this->info = M($this->entity, $this->database)->factory();
        return $this->set($data);
    }

    function set($key, $val = false)
    {
        if (is_array($key)) {
            $this->info->setValues($key);
        } else {
            $this->info->setValue($key, $val);
        }

        return $this->info->save();
    }

        function error($msg)
    {
        return [
            'status'  => 'error',
            'message' => $msg
        ];
    }

    function success($msg)
    {
        return [
            'status'  => 'success',
            'message' => $msg
        ];
    }
}
