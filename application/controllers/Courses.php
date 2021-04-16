<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->output->enable_profiler(TRUE);
		$this->load->model("Course");
		$get_each_course = $this->Course->get_courses();
        $this->load->view('courses/index.php', array('get_each_course' => $get_each_course));
	}
    public function add(){
        $this->load->model("Course");
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Course Name', 'required|trim|min_length[5]');
        if($this->form_validation->run() == FALSE){
        	if(empty($this->input->post('title'))) {
        		$this->session->set_flashdata('error', '<p class="error">Couse name should not be empty. Please try again.</p>');
        	} else if(strlen($this->input->post('title')) < 5) {
        		$this->session->set_flashdata('error', '<p class="error">Couse name should be at least 5 characters. Please try again.</p>');
        	}
        } else {
        	$course_details = array("title" => $this->input->post('title'),"description" => $this->input->post('description')); 
	        $add_course = $this->Course->add_course($course_details);
	        if($add_course === TRUE) {
	            $this->session->set_flashdata('success', '<p class="course-added">Course "'.$this->input->post('title').'" was added!</p>');
	        }
        }
        redirect(base_url());
    }
    public function delete_confirmation($id){
	    $this->load->model('Course');
	    $delete_this_course = $this->Course->get_course_by_id($id);
	    $this->load->view('/courses/delete.php', array('course' => $delete_this_course));
	}
	public function deleted(){
        $this->load->model('Course');
        $this->Course->delete_course($this->input->post('course_id'));
	    $this->session->set_flashdata('deleted', '<p class="error">Course has been deleted.</p>');
        redirect(base_url());
    }
}
