<?php
class Course extends CI_Model {
    public function add_course($course){
         $query = "INSERT INTO Courses (title, description, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
         $values = array($course['title'], $course['description']);
         return $this->db->query($query, $values);
    }
    public function get_courses(){
		$query = "SELECT id, title, description, created_at FROM courses ORDER BY created_at DESC";
		return $this->db->query($query)->result_array();
	}
	public function get_course_by_id($course_id){
         return $this->db->query("SELECT * FROM courses WHERE id = ?", array($course_id))->row_array();
    }
    public function delete_course($id){
        $query = "DELETE FROM courses WHERE courses.id = $id";
        return $this->db->query($query);
    }
}
?>