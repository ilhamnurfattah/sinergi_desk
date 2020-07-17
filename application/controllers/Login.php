<?php


class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('login');
	}

	public function cek(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek = $this->db->select('*')
			->from('user')
			->join('karyawan as kar','user.username=kar.nik')
			->where('username', $username)
			->where('password', $password)
			->get()->row_object();
		if (count($cek) > 0 ){
			$data_sess = array(
				'nama' => $cek->nama,
				'level' => $cek->level,
				'id' => $cek->nik,
				'status' => 'login',
			);
			$this->session->set_userdata($data_sess);
			$this->session->set_flashdata('info',"toastr.success('Selamat anda berhasil login!','Success!')");
			if ($cek->level == 'dev'){
				return redirect(site_url('dev/home'));
			}elseif ($cek->level == 'user'){
				return redirect(site_url('user/home'));
			}else{
				return redirect(site_url('home'));
			}
		}else{
			$this->session->set_flashdata('info',"toastr.error('Username atau Password salah!','Gagal!')");
			return redirect(site_url('login'));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect(site_url('login'));
	}
}
