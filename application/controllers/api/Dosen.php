<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends \Restserver\Libraries\REST_Controller
{
	// primary key dan nama tabel diatur disini
	public $tablePk = 'nidn';
    public $table = "tbdosen";
    public $tableView;
    public $validation;
	public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
		$this->validation = $this->form_validation;
    }
    
    function index_get($id = '')
    {
		/*
		Daftar query string :
		1. per_page (integer) = banyak data perhalaman
		2. page (integer) = halaman data, jika per_page diset. bernilai 1 jika per_page tidak diset
		3. sort (nm_field|asc atau desc) = mengurutkan field, hanya untuk satu field
		 */
		
		
		//$validasi untuk cek apakah query string berisi atau tidak
		//jika false, maka querystring akan divalidasi
		$validasi = true;
		
		//$data untuk menampung output akhir 
        $data = new stdClass;
		
		//query string dimasukkan ke variabel
		$per_page = $this->query('per_page');
		$page = $this->query('page');
		$sort = $this->query('sort');
		
		//nilai semua query string akan diseleksi oleh form validation
		$this->validation->set_data($this->query());
		
		//pengecekan query string jika query string tersebut mmemiliki nilai
		if(empty($per_page)){
			$this->validation->set_rules('per_page','Per page','is_natural|callback_optional');
		}
		if(empty($page)){
			$this->validation->set_rules('page','Page','is_natural|callback_optional');
		}
		if(empty($sort)){
			$this->validation->set_rules('sort','Sort','regex_match[/[a-zA-Z0-9]{0,20}\|(asc|desc)/]|callback_optional');
		}
		
		//jika salah satu query string memiliki nilai, maka $validasi berubah dan akan dijalankan validasi query string
		if(empty($per_page) || empty($page) || empty($sort)){
			$validasi = false;
		}
		
		//validasi hanya berjalan jika salah satu query string berisi nilai
		if($this->validation->run() == FALSE && $validasi = FALSE){
			
			//error ditampung pada properti errors
			$data->errors = $this->validation->error_array(); 
			
			//status code ditampung disini
			$data->status_code = '422';
			
			//output akhir
			return $this->response($data, '422');
		}else{
			
			//semua query string dikonversi nilainya
			$per_page = (int)$this->query('per_page');
			$page = (int)$this->query('page');
			
			//jika query string SORT berisi, maka ambil nilainya
			//SORT memili format 'nm_field|asc atau desc'
			if(isset($sort)) $sort = explode('|',$sort);
			
			//ketika SORT berisi, maka masukan nilainya ke kueri
			//ketika ID berisi, maka tambahkan klausul where alias mengambil detail data
			$kueri = DB::table($this->table)
				->when($sort, function ($query) use ($sort) {
							return $query->orderBy($sort[0], substr($sort[1],0,4));
		                })
				->when($id, function ($query) use ($id) {
							return $query->where($this->tablePk, $id);
		                });
		    
		    if($per_page || $page){
				//jika query string per_page atau page berisi,maka limit diset ke 10 atau sesuai dengan per_page
				$data = $kueri->paginate($per_page ?: 10);
			}else {
				
				//jika tidak, maka tampilkan semua data
				$data->data = $kueri->get();
			}
			
			//status code 200 berhasil
			$data->status_code = "200";
			
			//output akhir
			return $this->response($data, $data->status_code);
		}
    }
    
    function index_post()
    {
		//Jika ID berisi, maka update dijalankan
		//Jika ID null, maka post dijalankan
		
		//data menampung output
		$data = new stdclass;
		
		//data yang di input ditampung di $insert
		$insert = $this->_post_args;
		
		//set data yang akan divalidasi
		$this->validation->set_data($insert);
		
		//aturan validasi untuk input
		$this->validation->set_rules('nidn','NOBP','required|max_length[15]|min_length[14]');
		$this->validation->set_rules('nm_dosen','Nama Dosen','required|max_length[150]');
		
		if($this->validation->run() == FALSE){
			
			//set status code
			$data->status_code = 422;
			
			//error ditampung disini
			$data->errors = $this->validation->error_array();
			
			//output
			$this->response($data, 422);
		}else{			
			$runQuery = DB::table($this->table)->insert($insert);
			if($runQuery) $data->status_code = "200";
			else $data->status_code = "500";
			
			$this->response($data, $data->status_code);
		}
    }
    
    function index_put($id)
    {
		//data menampung output
		$data = new stdclass;
		
		//data yang di input ditampung di $insert
		$insert = $this->_put_args;
		
		//set data yang akan divalidasi
		$this->validation->set_data($insert);
		
		//aturan validasi untuk input
		$this->validation->set_rules('nm_dosen','Nama Dosen','required|max_length[150]');
		
		if($this->validation->run() == FALSE){
			
			//set status code
			$data->status_code = 422;
			
			//error ditampung disini
			$data->errors = $this->validation->error_array();
			
			//output
			$this->response($data, 422);
		}else{			
			$runQuery = DB::table($this->table)->where($this->tablePk, $id)->update($insert);
			
			if($runQuery) $data->status_code = "200";
			else $data->status_code = "500";
			
			$this->response($data, $data->status_code);
		}
    }
        
    function index_delete($id)
    {
    	$status = DB::table($this->table)->where($this->tablePk,$id)->delete();
		return $this->response(['status'=>$status]);
    }
    
    function optional($val){
		RETURN TRUE;
	}
    
}
