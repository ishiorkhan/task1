<?php

class Form extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model(['FormSubmit', 'Roles']);

		$data['roles'] = $this->Roles->getRoles();

		$this->load->view('index',$data);
	}
	public function form_submit()
	{
		$this->load->model('FormSubmit');

		$name = $this->input->post('name');
		$surname = $this->input->post('surname');
		$date = date('y.m.d', strtotime($this->input->post('date')));
		$role_id = $this->input->post('role_id');
		$salary = $this->input->post('salary');

		$data = array(
			'name' => $name,
			'surname' => $surname,
			'date' => $date,
			'role_id' => $role_id,
			'salary' => $salary,
			'created_at' => date('Y-m-d H:i:s')
		);

$result = $this->FormSubmit->insert_data($data);

		if ($result) {
			$response = array(
				'status' => 'success',
				'message' => 'Form gonderildi!'
			);
		}
		else {
			$response = array(
				'status' => 'error',
				'message' => 'Form gonderilmesi zamani xeta yarandi!'
			);
		}

		echo json_encode($response);
	}
    public function list()
    {
        $this->load->model(['FormSubmit', 'Roles']);

        $data['employees'] = $this->FormSubmit->getEmp();
        $data['roles'] = $this->Roles->getRoles();

        $this->load->view('list', $data);
    }

    public function search()
    {
        $search_text = $this->input->get('search_text');
        $this->load->model(['Filter', 'Roles', 'Logs']);
        $data['search'] = $this->Filter->getSearch($search_text);
        $data['roles'] = $this->Roles->getRoles();

        if ($search_text != ''){
            $logs = array(
                'search_text' => $search_text,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->Logs->insertLog($logs);
        }

        $this->load->view('list', $data);
    }

    public function search_keyup()
    {
        $search_text = $this->input->get('search_text');
        $this->load->model('Filter');
        $data['results'] = $this->Filter->getSearchKey($search_text);

        echo json_encode($data['results']);
    }

    public function filter()
    {
        $this->load->model('FormSubmit');
				$search_text = $this->input->get('search_text');
        $salary = $this->FormSubmit->getEmp();
        $salary = array_column($salary, 'salary');
        $role = $this->input->get('role');
        $min_salary = $this->input->get('min_salary') == '' ? min(array_values($salary)) : $this->input->get('min_salary');
        $max_salary = $this->input->get('max_salary') == '' ? max(array_values($salary)) : $this->input->get('max_salary');

        $this->load->model(['Filter', 'Roles']);
        $data['filter'] = $this->Filter->getFilter($role, $min_salary, $max_salary, $search_text);
        $data['roles'] = $this->Roles->getRoles();

        $this->load->view('list', $data);
    }

}
