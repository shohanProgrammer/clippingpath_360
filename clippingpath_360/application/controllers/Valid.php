<?php
class Example extends Controller {

    function Example()
    {
        parent::Controller();
        $this->load->helper('form');
        $this->load->helper('url');

    }

    function index() {
        $this->load->view('example_view');
        $this->getvalue();
    }



}
?>