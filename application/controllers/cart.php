<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('cart_model');
		}

		public function index(){
			$data['products'] = $this->cart_model->retrieve_products();
			
			$data['content'] = 'cart/products'; // Select our view file that will display our products
    		$this->load->view('index', $data); // Display the page with the above defined content
		}

		public function add_cart_item(){
     		// var_dump($this->cart_model->validate_add_cart_item());
     		// die();	
		    if($this->cart_model->validate_add_cart_item() == TRUE){
		         
		        // Check if user has javascript enabled
		        if($this->input->post('ajax') != '1'){
		            redirect('cart'); // If javascript is not enabled, reload the page with new data
		        }else{
		            echo 'true'; // If javascript is enabled, return true, so the cart gets updated
		        }
		    }
		     
		}

		public function show_cart(){
		    $this->load->view('cart/cart');
		}

		public function contents(){
			$data['products'] = $this->cart_model->retrieve_products();
			var_dump($data['products']);
			die();
		}
	}
?>