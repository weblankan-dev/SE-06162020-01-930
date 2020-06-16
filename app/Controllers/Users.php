<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);

		if (session()->get('isLoggedIn')){
			return redirect()->to(site_url().'dashboard');
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email' => 'required',
				'password' => 'required|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password incorrect'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))->first();
				$this->setUserSession($user);
				return redirect()->to(site_url().'dashboard');
			}
		}

		echo view('templates/index_header');
		echo view('login', $data);
		echo view('templates/footer');
	}

	public function register(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'contactnumber' => 'required|min_length[10]|max_length[10]',
				'address' => 'required|min_length[10]|max_length[80]',
				'password' => 'required|min_length[6]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
			$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'username' => $this->request->getVar('username'),
					'email' => $this->request->getVar('email'),
					'contactnumber' => $this->request->getVar('contactnumber'),
					'address' => $this->request->getVar('address'),
					'password' => $this->request->getVar('password'),
				];

				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'User Registration Successful');
				return redirect()->to(site_url());

			}
		}
		echo view('templates/index_header');
		echo view('register', $data);
		echo view('templates/footer');
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['userid'],
			'username' => $user['username'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function logout(){
		session()->destroy();
		return redirect()->to(site_url());
	}

	public function allUsers(){
		$db = db_connect();

		$query = $db->query('SELECT * FROM users');
		$data['fetchdata'] = $query->getResult();

		echo view('templates/header');
		echo view('users', $data);
		echo view('templates/footer');
	}

	public function deleteUser($userid = '0'){
		$db = db_connect();
		$query = $db->query('DELETE FROM users WHERE userid = '.$userid);

		if ($query) {
			$session = session();
			$session->setFlashdata('success', 'User Deleted Successful');
			return redirect()->to(site_url());
		}

	}

	public function editUser($userid = '0'){
		$data = [];
		helper(['form']);

		$model = new UserModel();
		$data['fetchdata'] = $model->where('userid', $userid) ->first();

		echo view('templates/header');
		echo view('edit-user', $data);
		echo view('templates/footer');
	}

}
