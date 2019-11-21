<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Cobalib {
        protected $CI;

        public function __construct()
        {
            $this->CI =& get_instance();
            // Load data model user
            $this->CI->load->model('User_model');
            
        }

        public function coba_lib()
        {
            echo "berhasil load lib";
        }
    }