<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function get_students()
	{
		$query = $this->db->get('student');

		return $query->result();
	}

	public function add($data)
	{
		$query = $this->db->insert('student', $data);

		return $query;
	}

	public function get_student($id)
	{
		//$this->db->where('id', $id);
		$this->db->select('student.id, student.first_name, student.middle_name, student.last_name, grades.1st_quarter as grades_1st_quarter, grades.2nd_quarter as grades_2nd_quarter, grades.3rd_quarter as grades_3rd_quarter, grades.4th_quarter as grades_4th_quarter, grades.average as grades_average, subjects.name as subjects_name');
		$this->db->from('student');
		$this->db->join('grades', 'student.id = grades.student_id');
		$this->db->join('subjects', 'grades.subject_id = subjects.id');
		$this->db->where('student.id', $id);
		$query = $this->db->get();

		return $query->result();
	}




}