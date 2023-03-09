<?php
use Imy\Core\Controller;
use Imy\Core\Tools;
use Class\Review;
use Carbon\Carbon;

class MainController extends Controller
{
    function init()
    {
        $this->v['name'] = 'Тестовое задание';
    }

    function ajax_review() {
        $db = new Review;
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES);


        if($name && $message) {
            $time = Carbon::now()->format('Y-m-d H:m:s');

            $db->create([
                'name' => $name,
                'message' => $message,
                'date' => $time
            ]);

            $template = tpl('tmp.rating');
            $this->v['message'] = Tools::get_include_contents($template,[
                'name' => $name,
                'message' => $message,
                'date' => $time,
            ]);
        }
    }

    function ajax_init() {
        $db = new Review;
            $template = tpl('tmp.response');

         $this->v['message'] = Tools::get_include_contents($template,[
                'datatable' => $db->datatable()
            ]);
    }
}
