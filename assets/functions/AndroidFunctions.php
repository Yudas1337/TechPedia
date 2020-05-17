<?php

require_once __DIR__ . "/../../Admin@techpedia/configuration.php";

class AndroidFunctions extends configuration{

	function __construct()
	{
		parent::__construct();
	}
	
	public function tambahulasan()
	{
	    $response = array("isError" => FALSE);

    $ulasan      = trim(htmlspecialchars($_POST['ulasan']));
    $id          = trim(htmlspecialchars($_POST['id']));
    $id_user     = trim(htmlspecialchars($_POST['id_user']));


    $sql    = $this->db->query("SELECT * from komentar WHERE id_user = '$id_user' AND id_modules = '$id'")->num_rows;

	    if ($sql > 0) {
	        $response["isError"]   = TRUE;
	        $response["message"]   = "Anda telah memberi ulasan";

	        echo json_encode($response);
	    } else {

	         $this->db->query("INSERT INTO komentar VALUES (NULL,'$id_user','$id',NOW(),'$ulasan') ");

 				$response["isError"] = FALSE;
	            $response["message"] = "Berhasil Tambah Ulasan !";

	            echo json_encode($response);

	    }

	    $this->db->close();

 	}
	
	
	public function modulpopuler()
	{
	   
	    $query = $this->db->query("SELECT id_modules, count(id_modules) as jumlah FROM komentar GROUP BY komentar.id_modules ORDER BY jumlah DESC");
	    
	    while($loop = $query->fetch_object())
	    {
	        $jumlah = $loop->jumlah;
	        
	        $sql = $this->db->query("SELECT * FROM modules JOIN komentar ON modules.id = komentar.id_modules GROUP BY komentar.id_modules ORDER BY '$jumlah' DESC LIMIT 12 ");
	    }
	    
	    $arr = array();
	    
	    while($data = $sql->fetch_object())
	    {
	        $hitung = $sql->num_rows;
	        
	        $id_apps = $data->id_apps;
	        $kategori = $this->db->query("SELECT * FROM apps WHERE id_apps = '$id_apps'")->fetch_object();
	        
	        array_push($arr,array(
	            
	            'kategori'      => $kategori->kategori,
	            'judul'         => $data->judul,
	            'foto_modul'    => $data->foto_modul,
	            'tanggal'       => $data->tanggal,
	            'judul_uri'     => $data->judul_uri,
	            'bahasa'        => $kategori->bahasa,
	            'id'            => $data->id
	            
	            ));
	    }
	    
	     echo json_encode(array(

	        'value' => '1',
	        'result' => $arr

	    ));

	    $this->db->close();
	}
	
	public function modulterbaru()
	{
	    $sql = $this->db->query("SELECT * FROM modules ORDER BY id DESC LIMIT 12");
	    $arr = array();
	    
	    while($data = $sql->fetch_object())
	    {
	        $id_apps = $data->id_apps;
	        $kategori = $this->db->query("SELECT * FROM apps WHERE id_apps = '$id_apps'")->fetch_object();
	        
	        array_push($arr,array(
	            
	            'kategori'      => $kategori->kategori,
	            'judul'         => $data->judul,
	            'foto_modul'    => $data->foto_modul,
	            'tanggal'       => $data->tanggal,
	            'judul_uri'     => $data->judul_uri,
	            'bahasa'        => $kategori->bahasa,
	            'id'            => $data->id
	            
	            ));
	    }
	    
	     echo json_encode(array(

	        'value' => '1',
	        'result' => $arr

	    ));

	    $this->db->close();
	}

	public function kategoribab()
	{
		$bahasa = trim(htmlspecialchars($_POST['bahasa']));
	    $bahasa = str_replace(" ", "-", strtolower($bahasa));

	    $sql = $this->db->query("SELECT * FROM bab_modules JOIN apps ON bab_modules.kategori_bab = apps.apps_uri WHERE bab_modules.kategori_bab = '$bahasa'");

	    $arr = array();

	    while ($data = $sql->fetch_object()) {
	        $id_bab  = $data->id_bab;
	        $id_apps = $data->id_apps;
	        $total = $this->db->query("SELECT * FROM modules WHERE id_bab = '$id_bab'")->num_rows;
	        array_push($arr, array(

	            'nama_bab'          => $data->nama_bab,
	            'kategori_bab'      => $data->kategori_bab,
	            'id_bab'            => $data->id_bab,
	            'rarity'            => $data->rarity,
	            'foto_babmodules'   => $data->foto_babmodules,
	            'id_apps'           => $id_apps,
	            'total'             => $total

	        ));
	    }


	    echo json_encode(array(

	        'value' => '1',
	        'result' => $arr

	    ));

	    $this->db->close();

	}

	public function searchkategoribab()
	{
		$searchkategori = trim(htmlspecialchars($_POST['searchkategori']));
	    $bahasa = trim(htmlspecialchars($_POST['bahasa']));


	    $sql = $this->db->query("SELECT * FROM bab_modules JOIN apps ON bab_modules.kategori_bab = apps.apps_uri  WHERE bab_modules.nama_bab LIKE '%$searchkategori%' AND bab_modules.kategori_bab = '$bahasa'");

	    $arr = array();

	    while ($data = $sql->fetch_object()) {
	        $id_bab = $data->id_bab;
	        $total = $this->db->query("SELECT * FROM modules WHERE id_bab = '$id_bab'")->num_rows;
	        
	        array_push($arr, array(
	            'nama_bab'          => $data->nama_bab,
	            'kategori_bab'      => $data->kategori_bab,
	            'id_bab'            => $data->id_bab,
	            'rarity'            => $data->rarity,
	            'foto_babmodules'   => $data->foto_babmodules,
	            'id_apps'           => $data->id_apps,
	            'total'             => $total

	        ));
	    }

	    echo json_encode(array(
	        "value" => 1,
	        "result" => $arr
	    ));

	    $this->db->close();
	}

	public function tampilmenu()
	{
		$sql = $this->db->query("SELECT * FROM kategori");

	    $result = array();

	    while ($row = $sql->fetch_object()) {
	        array_push($result, array(
	            'id_kategori'       => $row->id_kategori,
	            'nama_kategori'     => $row->nama_kategori,
	            'icon_kategori'     => $row->icon_kategori
	        ));
	    }
	    echo json_encode(array(
	        "value"     => 1,
	        'result' => $result
	    ));

	    $this->db->close();

	}

	public function slider()
	{
	    $sql = $this->db->query("SELECT * FROM sliders");
	    $result = array();
	    while ($row = $sql->fetch_object()) {
	        array_push($result, array(
	            'isi'                   => $row->isi,
	            'id_sliders'            => $row->id_sliders,
                'judul'                 => $row->judul,
	            'foto_sliders'          => $row->foto_sliders,
	            'deskripsi'             => $row->deskripsi

	        ));
	    }
	    echo json_encode(array("valueSliders" => 1, "resultSliders" => $result));
	    $this->db->close();

	}

	public function listmenu()
	{
		$nama_kategori = trim(htmlspecialchars($_POST['nama_kategori']));

	    $response = array();
	    $sql = $this->db->query("SELECT * FROM apps WHERE kategori = '$nama_kategori' ORDER BY rand() ");
	    
	    $result = array();
	    while ($row = $sql->fetch_object()) {
	        
	        $id_apps = $row->id_apps;
	        
	      $detail = $this->db->query("SELECT * FROM appsdetail WHERE id_apps = '$id_apps' ")->fetch_object();
	      
	        array_push($result, array(
	            'icon'         => $row->icon,
	            'bahasa'       => $row->bahasa,
	            'apps_detail'  => $detail->apps_detail

	        ));
	        
	        
	    }
	    echo json_encode(array("value" => 1, "result" => $result));
	    $this->db->close();
	}

	public function searchmenu()
	{
		$nama_kategori = trim(htmlspecialchars($_POST['nama_kategori']));
	    $searchmenu = trim(htmlspecialchars($_POST['searchmenu']));

	    $sql = $this->db->query("SELECT * FROM apps WHERE bahasa LIKE '%$searchmenu%' AND kategori = '$nama_kategori'");
	    
	    $result = array();
	    while ($row = $sql->fetch_object()) {
	        $id_apps = $row->id_apps;
	        $detail = $this->db->query("SELECT * FROM appsdetail WHERE id_apps = '$id_apps' ")->fetch_object();
	        array_push($result, array(
	            'icon'                      => $row->icon,
	            'bahasa'                    => $row->bahasa,
	            'apps_detail'               => $detail->apps_detail

	        ));
	    }
	    echo json_encode(array("value" => 1, "result" => $result));
	    $this->db->close();

	}

	public function modules()
	{
		$id_bab = trim(htmlspecialchars($_POST['id_bab']));
	    $id_apps = trim(htmlspecialchars($_POST['id_apps']));
	    $sql = $this->db->query("SELECT * FROM modules JOIN apps ON apps.id_apps = modules.id_apps WHERE apps.id_apps ='$id_apps' AND modules.statusnya = 1 AND modules.id_bab = '$id_bab' ");
	    $arr = array();

	    while ($data = $sql->fetch_object()) {
	        $id = $data->id;
	        $num = $this->db->query("SELECT * FROM komentar WHERE id_modules = '$id' ")->num_rows;
	        
	        array_push($arr, array(
	            'id' => $id,
	            'judul' => $data->judul,
	            'tanggal' => $data->tanggal,
	            'foto_modul' => $data->foto_modul,
	            'judul_uri' => $data->judul_uri,
	            'konten' => $data->konten,
	            'bahasa' => $data->bahasa,
	            'kategori' => $data->kategori,
	            'komentar' => $num
	        ));
	    }

	    echo json_encode(array(
	        'value' => 1,
	        'result' => $arr
	    ));

	    $this->db->close();
	}

	public function searchmodules()
	{
		$searchmodules = trim(htmlspecialchars($_POST['searchmodules']));
	    $id_bab = trim(htmlspecialchars($_POST['id_bab']));
	    $id_apps = trim(htmlspecialchars($_POST['id_apps']));


	    $sql = $this->db->query("SELECT * FROM modules JOIN apps ON apps.id_apps = modules.id_apps WHERE apps.id_apps = '$id_apps' AND modules.judul LIKE '%$searchmodules%' AND modules.id_bab = '$id_bab' AND modules.statusnya = 1 ");

	    $arr = array();

	    while ($data = $sql->fetch_object()) {
	        $id = $data->id;
	        $num = $this->db->query("SELECT * FROM komentar WHERE id_modules = '$id' ")->num_rows;
	        array_push($arr, array(
	            'id' => $id,
	            'judul' => $data->judul,
	            'tanggal' => $data->tanggal,
	            'foto_modul' => $data->foto_modul,
	            'judul_uri' => $data->judul_uri,
	            'konten' => $data->konten,
	            'bahasa' => $data->bahasa,
	            'kategori' => $data->kategori,
	            'komentar' => $num
	        ));
	    }

	    echo json_encode(array(
	        'value' => 1,
	        'result' => $arr
	    ));

	    $this->db->close();
	}

	public function login()
	{
	  $response  = array("isError" => FALSE);

	  $email 	 = trim(htmlspecialchars($_POST['email']));
	  $password  = trim(htmlspecialchars($_POST['password']));

	  $email     = $this->db->real_escape_string($email);
	  $password  = $this->db->real_escape_string($password);

	  $sql   = $this->db->query("SELECT * FROM users WHERE email = '$email'");
	  $nums  = $sql->num_rows;
	  $row   = $sql->fetch_object();

	  if ($nums > 0) {
	    if (password_verify($password, $row->password)) {

	      if ($row->is_active == 0) {
	        $response["isError"] = TRUE;
	        $response["message"] = "Akun anda telah dinonaktifkan! hubungi admin untuk bantuan";
	      } else {
	        $response["isError"] = FALSE;
	        $response["message"] = "Berhasil Login";
	        $response["data"]["id_user"] = $row->id_user;
	        $response["data"]["nama"] = $row->nama;
	        $response["data"]["email"] = $row->email;
	        $response["data"]["telepon"] = $row->telepon;
	        $response["data"]["foto_profil"] = $row->foto_profil;
	        $response["data"]["is_active"] = $row->is_active;
	        $response["data"]["is_premium"] = $row->is_premium;
	        $response["data"]["created_at"] = $row->created_at;
	        $response["data"]["position"] = $row->position;
	        $response["data"]["about"] = $row->about;
	      }


	      echo json_encode($response);
	    } else {
	      $response["isError"] = TRUE;
	      $response["message"] = "Email atau Password Salah!";

	      echo json_encode($response);
	    }
	  } else {
	    $response["isError"] = TRUE;
	    $response["message"] = "Email atau Password Salah!";

	    echo json_encode($response);
	  }

	  $this->db->close();
	}

	public function register()
	{
	
	$response = array("isError" => FALSE);

    $nama      = trim(htmlspecialchars($_POST['nama']));
    $email     = trim(htmlspecialchars($_POST['email']));
    $telepon   = trim(htmlspecialchars($_POST['telepon']));
    $password  = trim(htmlspecialchars($_POST['password']));

    $hitungpass = strlen($password);
    
    if($hitungpass < 6)
    {
            $response["isError"]   = TRUE;
	        $response["message"]   = "Password Minimal 6 Karakter";
	        echo json_encode($response);
    }
    
    else
    {
         $encrypt_password = password_hash($password, PASSWORD_DEFAULT);

        $sql    = $this->db->query("SELECT email from users WHERE email = '$email'")->num_rows;
    
    	    if ($sql > 0) {
    	        $response["isError"]   = TRUE;
    	        $response["message"]   = "User Telah Terdaftar";
    
    	        echo json_encode($response);
    	    } else {
    
    	         $this->db->query("INSERT INTO users VALUES (NULL,'$nama','$email','$telepon','$encrypt_password','default.png','1','0','Member of Techpedia','Member of TechPedia',NOW(),NOW())");
    
     				$response["isError"] = FALSE;
    	            $response["message"] = "Registrasi Berhasil !";
    
    	            echo json_encode($response);
    
    	    }
    }

   

	    $this->db->close();

 	}
}


$init = new AndroidFunctions();