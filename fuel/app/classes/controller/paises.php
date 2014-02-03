<?php

class Controller_Paises extends Controller_Template {
    
    public function before() {
        parent::before();
        
        if (!Auth::check()) {
            \Session::set_flash('siac-message', array('danger' => 'Debes estar conectado para acceder a esa área.'));
            \Response::redirect('/usuarios/login');
        }
    }

    public function action_index() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Paises &raquo; Index';
        $this->template->content = View::forge('paises/index', $data);
    }

    public function action_getpaises() {

        $param = \Input::param('query');        
        $paises = \Model_Conf_Paise::query()->select('id', 'nom_pais')->where('nom_pais', 'like', $param . '%')->get();        
        $data = array();
        foreach ($paises as $pais) {
            $data[] = array('id' => $pais->id, 'name' => $pais->nom_pais);
        }
        $content_type = array('Content-type' => 'application/json');
        return new \Response(json_encode($data), '200', $content_type);
    }

    

}
