<?php

/**
 * Admin Account Controller
 */
class FrontEnd extends Controller
{
    function __construct()
    {
    }

	public function index($id=0){
        $data = [
            "id"=>$id
        ];
        if($id == true){
            $this->view('user_cms/index',$data);
        }else {
            redirect('pages');
        }
	}
    
}