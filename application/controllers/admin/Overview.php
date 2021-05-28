<?php

class Overview extends CI_Controller {
    public function construct()
    {
        parent::construct();
    }

    public function index()
    {
        // Load view admin/overview.php
        $this->load->view('admin/overview');
    }
}