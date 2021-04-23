<?php if(!defined('BASEPATH')) exit('No Direct script access allowed');

class Courses extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Course');
    }

    public function index(){
        $courses = $this->Course->get_all_courses();
        $display['courses'] = $courses;
        $display['error'] = $this->session->flashdata('error');
        $this->load->view('cindex', $display);
    }

    public function add(){
        if($this->input->post()){
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            if(strlen($name) >= 5){
                $course_info = array('name' => $name, 'description' => $description);
                $add_course = $this->Course->add_course($course_info);
                if($add_course == FALSE){
                    $this->session->set_flashdata('error', 'Error! Please try again.');
                }
            }else{
                $this->session->set_flashdata('error', 'Please input at least 5 characters long');
            }
            redirect('');
        }
    }
    public function destroy($id){
        $course = $this->Course->get_course_by_id($id);
        $display['course'] = $course;
        $this->load->view('destroy', $display);
    }
    public function delete($id){
        if($this->input->get('yes')){
            $this->Course->delete_course($id);
        }
        redirect('');
    }
}
