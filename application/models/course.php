<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model{
    public function add_course($course){
        $query = "INSERT INTO courses (name, description, created_at, updated_at) VALUES (?,?,?,?)";
        $values = array($course['name'], $course['description'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }

    public function get_all_courses(){
        return $this->db->query("SELECT id, name, description, DATE_FORMAT(created_at, '%b %D %Y %1:%i%p')
        AS date_created FROM courses
        ORDER BY date_created DESC")->result_array();
    }

    public function get_course_by_id($course_id){
        return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
    }

    public function delete_course($id){
        return $this->db->query("DELETE FROM courses WHERE id =?", array($id));
    }
}