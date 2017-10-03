<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index()
	{
		$data['students'] = $this->student_model->get_students();
		$this->load->view('index', $data);
	}

	public function computation()
	{
		$data['students'] = $this->student_model->get_students();
		$this->load->view('computation', $data);
	}	

	public function grades()
	{
		$data['students'] = $this->student_model->get_students();
		$this->load->view('grades', $data);
	}

	public function get_student($id)
	{
		$grades = $this->student_model->get_student($id);

		echo json_encode($grades);
	}

	public function add()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('middle_name', 'Middle Name', 'required|trim');
		//$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('add');
		}
		else
		{
			$data = array
			(
				'first_name' 	=> $this->input->post('first_name'),
				'middle_name' => $this->input->post('middle_name'),
				'last_name'		=> $this->input->post('last_name'),
				'grade'       => $this->input->post('grade')

			);

			if($this->student_model->add($data))
			{
				$this->session->set_flashdata('success_msg', 'Successfully Added !');
				redirect('student/index');
			}

		}
	}

}