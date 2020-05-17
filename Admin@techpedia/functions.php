<?php

require_once __DIR__ . "/configuration.php";

require_once __DIR__ . '/PHPMailer/PHPMailerAutoload.php';

class fungsi extends configuration
{
    private $Base_url = "https://techpedia.pecelsec.com/";
    private $ekstensi = array('jpg', 'jpeg', 'png', 'gif', 'svg');
    private $premium_token = '$2a$07$NoSyt3MiSs4f3$';
    private $modules_token = '$2a$07$c4TchM3IfYoUC4n$';

    function __construct()
    {
        parent::__construct();
    }

    public function hitung($query)
    {
        return $this->db->query($query)->num_rows;
    }

    public function validation($param)
    {
        switch ($param) {
            case '1':
                echo '<div class="alert alert-success" style="width: 50%">Berhasil</div>';
                break;

            case '2':
                echo '<div class="alert alert-danger" style="width: 50%">Gagal</div>';
                break;

            default:
                echo '<div class="alert alert-warning" style="width: 50%">Terjadi Kesalahan</div>';
                break;
        }
    }

    public function base_url($url = null)
    {
        return $this->Base_url . $url;
    }

    public function add_kategori()
    {
        $nama_kategori = trim(htmlspecialchars($_POST['nama_kategori']));
        $kategori_uri = str_replace(" ", "-", $nama_kategori);
        $icon = time() . $_FILES['icon_kategori']['name'];
        $tmp = $_FILES['icon_kategori']['tmp_name'];

        $eks = explode(".", $icon);
        $end = strtolower(end($eks));

        if (!empty($nama_kategori) || !empty($_FILES['icon_kategori']['name'])) {


            if (in_array($end, $this->ekstensi) === true) {
                move_uploaded_file($tmp, '../assets/images/icon_kategori/' . $icon);
                return $this->db->query("INSERT INTO kategori VALUES (NULL,'$nama_kategori','$kategori_uri', '$icon')");
            }
        } else {
            $this->validation(2);
        }
    }

    public function edit_kategori($var)
    {
        $nama_kategori = trim(htmlspecialchars($_POST['nama_kategori']));
        $uri = str_replace(" ", "-", trim(strtolower($nama_kategori)));

        $sql = $this->db->query("SELECT * FROM kategori WHERE kategori_uri = '$var' ");
        $assoc = $sql->fetch_assoc();
        $id_kategori = $assoc['id_kategori'];
        $icon_lama = $assoc['icon_kategori'];

        if (!empty($_FILES['icon_kategori']['name'])) {

            $icon_kategori = time() . $_FILES['icon_kategori']['name'];
            $path          = $_FILES['icon_kategori']['tmp_name'];

            $pecah         = explode(".", $icon_kategori);
            $nama          = strtolower(end($pecah));

            if (in_array($nama, $this->ekstensi) === true) {

                unlink("../assets/images/icon_kategori/" . $icon_lama);
                move_uploaded_file($path, '../assets/images/icon_kategori/' . $icon_kategori);

                return $this->db->query("UPDATE kategori SET nama_kategori = '$nama_kategori' , kategori_uri = '$uri' , icon_kategori = '$icon_kategori' WHERE id_kategori = '$id_kategori'  ");
            }
        } else {
            return $this->db->query("UPDATE kategori SET nama_kategori = '$nama_kategori' , kategori_uri = '$uri' WHERE id_kategori = '$id_kategori' ");
        }
    }

    public function tampil($query)
    {
        $sql = $this->db->query($query);
        $row = array();
        while ($rows = $sql->fetch_assoc()) {
            $row[] = $rows;
        }

        return $row;
    }

    public function hapus_kategori($var)
    {
        $ambil = $this->db->query("SELECT * FROM kategori WHERE kategori_uri = '$var'")->fetch_assoc();
        $id_kategori = $ambil['id_kategori'];
        $fotolama = $ambil['icon_kategori'];
        unlink("../assets/images/icon_kategori/" . $fotolama);

        return $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id_kategori' ");
    }

    public function add_sliders()
    {
        $judul = trim(htmlspecialchars($_POST['judul']));
        $deskripsi = trim(htmlspecialchars($_POST['deskripsi']));
        $isi = trim($_POST['isi']);
        $foto_sliders = time() . $_FILES['foto_sliders']['name'];
        $tmp_foto     = $_FILES['foto_sliders']['tmp_name'];
        $pecah = explode(".", $foto_sliders);
        $end = strtolower(end($pecah));


        if (in_array($end, $this->ekstensi) === true) {
            move_uploaded_file($tmp_foto, "../assets/images/foto_sliders/" . $foto_sliders);
            return $this->db->query("INSERT INTO sliders VALUES (NULL,'$judul','$deskripsi','$foto_sliders','$isi') ");
        }
    }

    public function edit_sliders($id)
    {
        $judul = trim(htmlspecialchars($_POST['judul']));
        $deskripsi = trim(htmlspecialchars($_POST['deskripsi']));
        $isi = trim($_POST['isi']);

        if (!empty($_FILES['foto_sliders']['name'])) {

            $foto_sliders = time() . $_FILES['foto_sliders']['name'];
            $tmp_foto     = $_FILES['foto_sliders']['tmp_name'];
            $pecah = explode(".", $foto_sliders);
            $end = strtolower(end($pecah));

            $sql = $this->db->query("SELECT * FROM sliders WHERE id_sliders = '$id' ")->fetch_assoc();
            $fotolama = $sql['foto_sliders'];

            if (in_array($end, $this->ekstensi) === true) {
                unlink("../assets/images/foto_sliders/" . $fotolama);
                move_uploaded_file($tmp_foto, "../assets/images/foto_sliders/" . $foto_sliders);
                return $this->db->query("UPDATE sliders SET foto_sliders = '$foto_sliders' , deskripsi = '$deskripsi' , judul = '$judul' , isi = '$isi' WHERE id_sliders = '$id' ");
            }
        } else {
            return $this->db->query("UPDATE sliders SET deskripsi = '$deskripsi' , judul = '$judul' , isi = '$isi' WHERE id_sliders = '$id' ");
        }
    }

    public function hapus_sliders($id)
    {
        $ambil = $this->db->query("SELECT * FROM sliders WHERE id_sliders = '$id'")->fetch_assoc();
        $fotolama = $ambil['foto_sliders'];
        unlink("../assets/images/foto_sliders/" . $fotolama);

        return $this->db->query("DELETE FROM sliders WHERE id_sliders = '$id' ");
    }

     public function add_bab_modules()
    {
        $nama_bab       = trim(htmlspecialchars($_POST['nama_bab']));
        $kategori_bab   = htmlspecialchars(strtolower($_POST['kategori_bab']));
        $bab_uri        = str_replace(" ", "-", strtolower($nama_bab));
        $rarity         = trim(htmlspecialchars($_POST['rarity']));
        $foto_bab       = time() . $_FILES['foto_babmodules']['name'];
        $tmp_foto       = $_FILES['foto_babmodules']['tmp_name'];

        $pecah          = explode(".", $foto_bab);
        $end            = strtolower(end($pecah));


        if (!empty($nama_bab) || !empty($kategori_bab)) {

            if (in_array($end, $this->ekstensi) === true) {
                move_uploaded_file($tmp_foto, "../assets/images/foto_babmodules/" . $foto_bab);
            }
            return $this->db->query("INSERT INTO bab_modules VALUES (NULL,'$nama_bab','$kategori_bab','$bab_uri','$rarity','$foto_bab') ");
        }
    }
    public function edit_bab_modules($var)
    {
        $nama_bab       = trim(htmlspecialchars($_POST['nama_bab']));
        $kategori_bab   = htmlspecialchars(strtolower($_POST['kategori_bab']));
        $bab_uri        = str_replace(" ", "-", strtolower($nama_bab));
        $rarity         = trim(htmlspecialchars($_POST['rarity']));

        $sql = $this->db->query("SELECT * FROM bab_modules WHERE bab_uri = '$var' ")->fetch_assoc();
        $id_bab = $sql['id_bab'];
        $fotolama = $sql['foto_babmodules'];

        if (!empty($nama_bab) || !empty($kategori_bab)) {

            if (!empty($_FILES['foto_babmodules']['name'])) {
                $foto_bab       = time() . $_FILES['foto_babmodules']['name'];
                $tmp_foto       = $_FILES['foto_babmodules']['tmp_name'];
                $pecah          = explode(".", $foto_bab);
                $end            = strtolower(end($pecah));

                if (in_array($end, $this->ekstensi) === true) {
                    move_uploaded_file($tmp_foto, "../assets/images/foto_babmodules/" . $foto_bab);
                    unlink("../assets/images/foto_babmodules/" . $fotolama);
                    return $this->db->query("UPDATE bab_modules SET nama_bab = '$nama_bab' , kategori_bab = '$kategori_bab' , bab_uri = '$bab_uri' , rarity = '$rarity' , foto_babmodules = '$foto_bab' WHERE id_bab = '$id_bab' ");
                }
            } else {
                return $this->db->query("UPDATE bab_modules SET nama_bab = '$nama_bab' , kategori_bab = '$kategori_bab' , bab_uri = '$bab_uri' , rarity = '$rarity' WHERE id_bab = '$id_bab' ");
            }
        }
    }

    public function hapus_bab_modules($var)
    {
        $ambil = $this->db->query("SELECT * FROM bab_modules WHERE bab_uri = '$var'")->fetch_assoc();
        $fotolama = $ambil['foto_babmodules'];
        unlink("../assets/images/foto_babmodules/" . $fotolama);

        return $this->db->query("DELETE FROM bab_modules WHERE bab_uri = '$var' ");
    }

    public function add_apps()
    {
        $bahasa   = trim(htmlspecialchars($_POST['bahasa']));
        $kategori = trim(htmlspecialchars($_POST['kategori']));
        $apps_uri = str_replace(" ", "-", strtolower($bahasa));

        $waktu = date('Y-m-d');

        if (!empty($_FILES['icon']['name']) || !empty($_FILES['foto']['name'])) {

            $icon = time() . $_FILES['icon']['name'];
            $tmp_icon = $_FILES['icon']['tmp_name'];
            $pecah_icon = explode(".", $icon);
            $end_icon = strtolower(end($pecah_icon));

            $foto = time() . $_FILES['foto']['name'];
            $tmp_foto = $_FILES['foto']['tmp_name'];
            $pecah_foto = explode(".", $foto);
            $end_foto = strtolower(end($pecah_foto));

            if (in_array($end_icon, $this->ekstensi) && in_array($end_foto, $this->ekstensi) === true) {
                move_uploaded_file($tmp_icon, "../assets/images/icon_apps/" . $icon);
                move_uploaded_file($tmp_foto, "../assets/images/foto_apps/" . $foto);

                return $this->db->query("INSERT INTO apps VALUES (NULL,'$foto','$icon','$bahasa','$kategori','$apps_uri','$waktu','$waktu') ");
            }
        }
    }

    public function edit_apps($var)
    {
        $bahasa   = trim(htmlspecialchars($_POST['bahasa']));
        $kategori = trim(htmlspecialchars($_POST['kategori']));
        $apps_uri = str_replace(" ", "-", strtolower($bahasa));

        $sql = $this->db->query("SELECT * FROM apps WHERE apps_uri = '$var' ")->fetch_assoc();
        $id_apps = $sql['id_apps'];

        $fotolama = $sql['foto'];
        $iconlama = $sql['icon'];

        if (!empty($_FILES['icon']['name'])) {

            $icon = time() . $_FILES['icon']['name'];
            $tmp_icon = $_FILES['icon']['tmp_name'];
            $pecah_icon = explode(".", $icon);
            $end_icon = strtolower(end($pecah_icon));

            if (in_array($end_icon, $this->ekstensi) === true) {
                unlink("../assets/images/icon_apps/" . $iconlama);
                move_uploaded_file($tmp_icon, "../assets/images/icon_apps/" . $icon);
                return $this->db->query("UPDATE apps SET icon = '$icon', bahasa = '$bahasa' , kategori = '$kategori' , apps_uri = '$apps_uri' WHERE id_apps = '$id_apps' ");
            }
        } else {
            return $this->db->query("UPDATE apps SET bahasa = '$bahasa' , kategori = '$kategori' , apps_uri = '$apps_uri' WHERE id_apps = '$id_apps' ");
        }
        if (!empty($_FILES['foto']['name'])) {
            $foto = time() . $_FILES['foto']['name'];
            $tmp_foto = $_FILES['foto']['tmp_name'];
            $pecah_foto = explode(".", $foto);
            $end_foto = strtolower(end($pecah_foto));

            if (in_array($end_foto, $this->ekstensi) === true) {
                unlink("../assets/images/foto_apps/" . $fotolama);
                move_uploaded_file($tmp_foto, "../assets/images/foto_apps/" . $foto);
                return $this->db->query("UPDATE apps SET foto = '$foto' , bahasa = '$bahasa' , kategori = '$kategori' , apps_uri = '$apps_uri' WHERE id_apps = '$id_apps' ");
            }
        }
    }

    public function hapus_apps($var)
    {
        $sql = $this->db->query("SELECT * FROM apps WHERE apps_uri = '$var' ")->fetch_assoc();
        $fotolama = $sql['foto'];
        $iconlama = $sql['icon'];
        unlink("../assets/images/foto_apps/" . $fotolama);
        unlink("../assets/images/icon_apps/" . $iconlama);

        return $this->db->query("DELETE FROM apps WHERE apps_uri = '$var' ");
    }

    public function getAjax($var)
    {
        $sql = $this->db->query("SELECT * FROM bab_modules WHERE kategori_bab = '$var' ");
        $row = array();
        while ($rows = $sql->fetch_assoc()) {
            $row[] = array(
                "nama_bab"     => $rows['nama_bab'],
                "id_bab"       => $rows['id_bab']
            );
        }

        echo json_encode($row, true);
    }

    public function tambah_modules()
    {
        $bahasa  = trim(htmlspecialchars($_POST['bahasa']));
        $id_bab  = trim(htmlspecialchars($_POST['id_bab']));
        $judul   = trim(htmlspecialchars(strip_tags($_POST['judul'])));
        $tanggal = trim(htmlspecialchars($_POST['tanggal']));
        $tanggal = date_create($tanggal);
        $tanggal = date_format($tanggal, " d M Y");
        $konten  = trim($_POST['konten']);
        $status  = trim(htmlspecialchars($_POST['status']));

        $judul_uri = strtolower(str_replace(" ", "-", $judul));

        $sql = $this->db->query("SELECT * FROM apps WHERE apps_uri = '$bahasa'")->fetch_assoc();
        $id_apps = $sql['id_apps'];

        if (!empty($_FILES['foto_modul']['name'])) {
            $foto_modul = time() . $_FILES['foto_modul']['name'];
            $path_foto  = $_FILES['foto_modul']['tmp_name'];
            $pecah = explode(".", $foto_modul);
            $end = strtolower(end($pecah));

            $waktu = date("Y-m-d H:i:s");

            if (in_array($end, $this->ekstensi) === true) {
                move_uploaded_file($path_foto, "../assets/images/foto_modules/" . $foto_modul);

                return $this->db->query("INSERT INTO modules VALUES (NULL,'$id_apps','$id_bab','$judul','$foto_modul','$tanggal','$konten','$status','$judul_uri','$waktu','$waktu') ");
            }
        }
    }

    public function edit_modules($var)
    {
        $bahasa  = trim(htmlspecialchars($_POST['bahasa']));
        $id_bab  = trim(htmlspecialchars($_POST['id_bab']));
        $judul   = trim(htmlspecialchars(strip_tags($_POST['judul'])));
        $tanggal = trim(htmlspecialchars($_POST['tanggal']));
        $tanggal = date_create($tanggal);
        $tanggal = date_format($tanggal, " d M Y");

        $konten  = trim($_POST['konten']);
        $status  = trim(htmlspecialchars($_POST['status']));

        $judul_uri = strtolower(str_replace(" ", "-", $judul));

        $sql = $this->db->query("SELECT * FROM apps WHERE apps_uri = '$bahasa'")->fetch_assoc();
        $query = $this->db->query("SELECT * FROM modules WHERE judul_uri = '$var' ")->fetch_assoc();
        $id_apps = $sql['id_apps'];

        $id = $query['id'];
        $fotolama = $query['foto_modul'];


        $waktu = date("Y-m-d H:i:s");

        if (!empty($_FILES['foto_modul']['name'])) {
            $foto_modul = time() . $_FILES['foto_modul']['name'];
            $path_foto  = $_FILES['foto_modul']['tmp_name'];
            $pecah = explode(".", $foto_modul);
            $end = strtolower(end($pecah));

            if (in_array($end, $this->ekstensi) === true) {
                unlink("../assets/images/foto_modules/" . $fotolama);
                move_uploaded_file($path_foto, "../assets/images/foto_modules/" . $foto_modul);

                return $this->db->query("UPDATE modules SET id_apps = '$id_apps' , id_bab = '$id_bab' , judul = '$judul' , foto_modul = '$foto_modul' , tanggal = '$tanggal' , konten = '$konten' , statusnya = '$status' , judul_uri = '$judul_uri' , created_at = '$waktu', updated_at = '$waktu' WHERE id = '$id' ");
            }
        } else {
            return $this->db->query("UPDATE modules SET id_apps = '$id_apps' , id_bab = '$id_bab' , judul = '$judul'  , tanggal = '$tanggal' , konten = '$konten' , statusnya = '$status' , judul_uri = '$judul_uri' , created_at = '$waktu', updated_at = '$waktu' WHERE id = '$id' ");
        }
    }

    public function hapus_modules($var)
    {
        $ambil = $this->db->query("SELECT * FROM modules WHERE judul_uri = '$var'")->fetch_assoc();
        $id = $ambil['id'];
        $fotolama = $ambil['foto_modul'];
        unlink("../assets/images/foto_modules/" . $fotolama);

        return $this->db->query("DELETE FROM modules WHERE id = '$id' ");
    }

    public function logout()
    {
        session_start();

        $id_admin = $_SESSION['id_admin'];

        $this->db->query("UPDATE tb_online_admin SET is_online = 0 WHERE id_admin = '$id_admin'");

        unset($_SESSION['key']);
        unset($id_admin);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['telepon']);
        unset($_SESSION['foto_profil']);
        unset($_SESSION['id_role']);
        unset($_SESSION['position']);
        $_SESSION['admins'] = FALSE;
    }

    public function edit_profile()
    {
        $id_admin = $_SESSION['id_admin'];
        $username = trim(htmlspecialchars($_POST['username']));
        $email    = trim(htmlspecialchars($_POST['email']));
        $telepon  = trim(htmlspecialchars($_POST['telepon']));
        $position = trim(htmlspecialchars($_POST['position']));

        $github = trim(htmlspecialchars($_POST['github']));
        $twitter =  trim(htmlspecialchars($_POST['twitter']));
        $facebook =  trim(htmlspecialchars($_POST['facebook']));
        $instagram =  trim(htmlspecialchars($_POST['instagram']));
        $linkedin =  trim(htmlspecialchars($_POST['linkedin']));

        if (!empty($_FILES['foto_profil']['name'])) {
            $foto_profil = time() . $_FILES['foto_profil']['name'];
            $path_foto   = $_FILES['foto_profil']['tmp_name'];
            $pecah = explode(".", $foto_profil);
            $end = strtolower(end($pecah));

            $sql = $this->db->query("SELECT * FROM admins WHERE id_admin = '$id_admin'")->fetch_assoc();
            $fotolama = $sql['foto_profil'];

            if (in_array($end, $this->ekstensi) === true) {
                if ($fotolama != 'default.png') {
                    unlink("../assets/images/foto_users/" . $fotolama);
                }
                move_uploaded_file($path_foto, "../assets/images/foto_users/" . $foto_profil);
                return $this->db->query("UPDATE admins SET username = '$username' , email = '$email' , telepon = '$telepon' , foto_profil = '$foto_profil' , position = '$position' , github = '$github' , twitter = '$twitter' , facebook = '$facebook' , instagram = '$instagram' , linkedin = '$linkedin' WHERE id_admin = '$id_admin'  ");
            }
        } else {
            return $this->db->query("UPDATE admins SET username = '$username' , email = '$email' , telepon = '$telepon' , position = '$position' ,  twitter = '$twitter' , facebook = '$facebook' , github = '$github' , instagram = '$instagram' , linkedin = '$linkedin' WHERE id_admin = '$id_admin' ");
        }
    }

    public function update_pass()
    {
        $old_pass       = trim(htmlspecialchars($_POST['old_pass']));
        $new_pass       = trim(htmlspecialchars($_POST['new_pass']));
        $repeat_pass    = trim(htmlspecialchars($_POST['repeat_pass']));

        $id_admin = $_SESSION['id_admin'];
        $sql = $this->db->query("SELECT * FROM admins WHERE id_admin = '$id_admin'")->fetch_assoc();

        if (password_verify($old_pass, $sql['password'])) {

            if (strlen($new_pass) < 6) {
                echo "<script>
                            swal('Whoopz!','Password Minimal 6 Karakter','error')
                        
                            </script>";
            } else {
                if ($new_pass == $repeat_pass) {
                    $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                    return $this->db->query("UPDATE admins SET password = '$new_pass' WHERE id_admin = '$id_admin' ");
                } else {
                    echo "<script>
                            swal('Whoopz!','Pasword lama tidak cocok','error')
                        
                            </script>";
                }
            }
        } else {
            echo "<script>
                            swal('Whoopz!','Pasword lama tidak cocok','error')
                        
                            </script>";
        }
    }

    public function add_admin_role()
    {

        if (!empty($_POST['nama_role'])) {
            $nama_role = trim(htmlspecialchars($_POST['nama_role']));

            return $this->db->query("INSERT INTO admin_role VALUES (NULL,'$nama_role') ");
        }
    }

    public function update_role($id)
    {
        if (!empty($_POST['nama_role'])) {
            $var = trim(htmlspecialchars($_POST['nama_role']));

            return $this->db->query("UPDATE admin_role SET nama_role = '$var' WHERE id_role = '$id' ");
        }
    }

    public function hapus_admin_role($id)
    {
        return $this->db->query("DELETE FROM admin_role WHERE id_role = '$id'");
    }

    public function edit_admins($id)
    {
        $sql = $this->db->query("SELECT * FROM admins WHERE id_admin = '$id' ")->fetch_assoc();
        $is_active = $sql['is_active'];

        if ($is_active == 1) {
            return $this->db->query("UPDATE admins SET is_active = '0' WHERE id_admin = '$id'");
        } elseif ($is_active == 0) {
            return $this->db->query("UPDATE admins SET is_active = '1' WHERE id_admin = '$id'");
        } else {
            echo '<script>alert("Wrong Params!")</script>';
        }
    }

    public function add_admins()
    {
        $username = trim(htmlspecialchars($_POST['username']));
        $telepon = trim(htmlspecialchars($_POST['telepon']));
        $email = trim(htmlspecialchars($_POST['email']));
        $position = trim(htmlspecialchars($_POST['position']));
        $password = trim(htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
        $foto_profil = 'default.png';
        $id_role = trim(htmlspecialchars($_POST['id_role']));
        $is_active = 1;

        $this->db->query("INSERT INTO admins VALUES (NULL,'$username','$telepon','$email','$position','$password','$foto_profil','$id_role','$is_active','','','','','')");

        $sql = $this->db->query("SELECT * FROM admins WHERE email = '$email'  ")->fetch_assoc();
        $id = $sql['id_admin'];

        return  $this->db->query("INSERT INTO tb_online_admin VALUES (NULL,'$id','0') ");
    }

    public function hapus_admins($id)
    {
        $sql = $this->db->query("SELECT * FROM admins WHERE id_admin = '$id' ")->fetch_assoc();
        $fotolama = $sql['foto_profil'];

        if ($fotolama != 'default.png') {
            unlink("../assets/images/foto_users/" . $fotolama);
        }
        $this->db->query("DELETE FROM tb_online_admin WHERE id_admin = '$id'  ");
        return $this->db->query("DELETE FROM admins WHERE id_admin = '$id' ");
    }

    public function edit_users($id)
    {
        $sql = $this->db->query("SELECT * FROM users WHERE id_user = '$id' ")->fetch_assoc();
        $is_active = $sql['is_active'];

        if ($is_active == 1) {
            return $this->db->query("UPDATE users SET is_active = '0' WHERE id_user = '$id'");
        } elseif ($is_active == 0) {
            return $this->db->query("UPDATE users SET is_active = '1' WHERE id_user = '$id'");
        } else {
            echo '<script>alert("Wrong Params!")</script>';
        }
    }

    public function edit_premium($id)
    {
        $sql = $this->db->query("SELECT * FROM users WHERE id_user = '$id' ")->fetch_assoc();
        $is_premium = $sql['is_premium'];

        if ($is_premium == '1') {
            return $this->db->query("UPDATE users SET is_premium = '0' WHERE id_user = '$id' ");
        } elseif ($is_premium == '0') {
            return $this->db->query("UPDATE users SET is_premium = '1' WHERE id_user = '$id' ");
        } else {
            echo "<script>alert('Wrong Param!')</script>";
        }
    }

    public function hapus_users($id)
    {
        $sql = $this->db->query("SELECT * FROM users WHERE id_user = '$id' ")->fetch_assoc();
        $fotolama = $sql['foto_profil'];

        if ($fotolama != 'default.png') {
            unlink("../assets/images/foto_users/" . $fotolama);
        }

        return $this->db->query("DELETE FROM users WHERE id_user = '$id' ");
    }

    public function premium_token()
    {
        $id_user = trim(htmlspecialchars($_POST['id_user']));
        $random = rand(1234567890, 6);
        $hash = hash_hmac('ripemd160', $random, $this->premium_token);

        return $this->db->query("INSERT INTO premium_token VALUES (NULL,'$hash','$id_user') ");
    }

    public function modules_token()
    {
        $id_user = trim(htmlspecialchars($_POST['id_user']));
        $random = rand(1234567890, 6);
        $hash = hash_hmac('ripemd160', $random, $this->modules_token);

        return $this->db->query("INSERT INTO modules_token VALUES (NULL,'$hash','$id_user') ");
    }


    public function contact_us()
    {

        $name = trim(htmlspecialchars($_POST['name']));
        $email = trim(htmlspecialchars($_POST['email']));
        $subject = trim(htmlspecialchars($_POST['subject']));
        $message = trim(htmlspecialchars($_POST['message']));
        $time = date("Y-m-d H:i:s");

        return $this->db->query("INSERT INTO contact_us VALUES (NULL,'$name','$email','$subject','$message','$time') ");
    }

    public function del_messages($id)
    {
        return $this->db->query("DELETE FROM contact_us WHERE id_contact = '$id' ");
    }

    public function subs()
    {
        $email = trim(htmlspecialchars($_POST['email']));

        $cek = $this->db->query("SELECT * FROM subscribe WHERE email = '$email' ")->fetch_assoc();

        if ($cek) {
            echo "<script>alert('Email telah terdaftar!')</script>";
        } else {
            return $this->db->query("INSERT INTO subscribe VALUES (NULL,'$email')");
        }
    }

    public function add_portfolio()
    {
        $nama = trim(htmlspecialchars($_POST['nama']));
        $kategori = trim(htmlspecialchars($_POST['kategori']));
        $foto = time() . $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $pecah = explode(".", $foto);
        $end = strtolower(end($pecah));

        if (in_array($end, $this->ekstensi) === true) {

            move_uploaded_file($tmp, "../assets/images/foto_portfolio/" . $foto);

            return $this->db->query("INSERT INTO portfolio VALUES (NULL,'$nama','$kategori','$foto')");
        }
    }

    public function edit_portfolio($id)
    {
        $nama = trim(htmlspecialchars($_POST['nama']));
        $kategori = trim(htmlspecialchars($_POST['kategori']));

        if (!empty($_FILES['foto']['name'])) {

            $foto = time() . $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $pecah = explode(".", $foto);
            $end = strtolower(end($pecah));

            $sql = $this->db->query("SELECT * FROM portfolio WHERE id_portfolio = '$id' ")->fetch_assoc();
            $fotolama = $sql['foto'];

            if (in_array($end, $this->ekstensi) === true) {
                unlink("../assets/images/foto_portfolio/" . $fotolama);
                move_uploaded_file($tmp, "../assets/images/foto_portfolio/" . $foto);
                return $this->db->query("UPDATE portfolio SET nama = '$nama' , kategori = '$kategori' , foto = '$foto' WHERE id_portfolio = '$id'  ");
            }
        } else {

            return $this->db->query("UPDATE portfolio SET nama = '$nama' , kategori = '$kategori' WHERE id_portfolio = '$id' ");
        }
    }

    public function hapus_portfolio($id)
    {
        $sql = $this->db->query("SELECT * FROM portfolio WHERE id_portfolio = '$id' ")->fetch_assoc();
        $fotolama = $sql['foto'];
        unlink("../assets/images/foto_portfolio/" . $fotolama);
        return $this->db->query("DELETE FROM portfolio WHERE id_portfolio = '$id' ");
    }

    public function addArtikel()
    {
        $judul = trim(htmlspecialchars($_POST['judul']));
        $tanggal = trim(htmlspecialchars($_POST['tanggal']));
        $isi  = trim($_POST['isi']);
        $status  = trim(htmlspecialchars($_POST['statusArtikel']));
        $artikel_uri = strtolower(str_replace(" ", "-", $judul));
        $kategori = trim(htmlspecialchars($_POST['id_katArtikel']));

        $foto_artikel = time() . $_FILES['foto_artikel']['name'];
        $tmp = $_FILES['foto_artikel']['tmp_name'];

        $pecah  = explode(".", $foto_artikel);
        $end = strtolower(end($pecah));

        if (in_array($end, $this->ekstensi) === true) {
            move_uploaded_file($tmp, "../assets/images/foto_artikel/" . $foto_artikel);
            return $this->db->query("INSERT INTO artikel VALUES (NULL,'$judul','$tanggal','$kategori','$isi','$foto_artikel','$artikel_uri','$status') ");
        }
    }

    public function editArtikel($uri)
    {
        $judul = trim(htmlspecialchars($_POST['judul']));
        $tanggal = trim(htmlspecialchars($_POST['tanggal']));
        $isi  = trim($_POST['isi']);
        $status  = trim(htmlspecialchars($_POST['statusArtikel']));
        $artikel_uri = strtolower(str_replace(" ", "-", $judul));

        $sql = $this->db->query("SELECT * FROM artikel WHERE artikel_uri = '$uri' ")->fetch_assoc();
        $id_artikel = $sql['id_artikel'];

        if (!empty($_FILES['foto_artikel']['name'])) {
            $foto_artikel = time() . $_FILES['foto_artikel']['name'];
            $tmp = $_FILES['foto_artikel']['tmp_name'];

            $pecah  = explode(".", $foto_artikel);
            $end = strtolower(end($pecah));


            $fotolama = $sql['foto_artikel'];

            if (in_array($end, $this->ekstensi) === true) {
                unlink("../assets/images/foto_artikel/" . $fotolama);
                move_uploaded_file($tmp, "../assets/images/foto_artikel/" . $foto_artikel);
                return $this->db->query("UPDATE  artikel SET judul = '$judul' , tanggal = '$tanggal' , isi = '$isi' , foto_artikel =  '$foto_artikel' , artikel_uri = '$artikel_uri' , statusArtikel = '$status' WHERE id_artikel = '$id_artikel' ");
            }
        } else {
            return $this->db->query("UPDATE artikel SET judul = '$judul' , tanggal = '$tanggal' , isi = '$isi' , artikel_uri = '$artikel_uri' , statusArtikel = '$status' WHERE id_artikel = '$id_artikel'  ");
        }
    }

    public function hapusArtikel($uri)
    {
        $sql = $this->db->query("SELECT * FROM artikel WHERE artikel_uri = '$uri' ")->fetch_assoc();
        $id = $sql['id_artikel'];
        $fotolama = $sql['foto_artikel'];
        unlink('../assets/images/foto_artikel/' . $fotolama);

        return $this->db->query("DELETE FROM artikel WHERE id_artikel = '$id' ");
    }

    public function tambah_komentar()
    {

        $komentarnya = trim(htmlspecialchars($_POST['komentarnya']));
        $uri = trim(htmlspecialchars($_POST['uri']));

        $email = $_SESSION['emailUsers'];

        $num = $this->db->query("SELECT * FROM users WHERE email = '$email' ")->fetch_assoc();
        $cek = $this->db->query("SELECT * FROM modules WHERE judul_uri = '$uri' ")->fetch_assoc();

        if ($num > 0) {

            if ($cek > 0) {

                $waktu = date("Y-m-d H:i:s");
                $id_user = $num['id_user'];
                $id_modules = $cek['id_modules'];


                return $this->db->query("INSERT INTO komentar VALUES (NULL,'$id_user','$id_modules','$waktu','$komentarnya') ");
            }
        }
    }

    public function komentar_artikel()
    {
        $komentarnya = trim(htmlspecialchars($_POST['komentarnya']));
        $uri = trim(htmlspecialchars($_POST['uri']));

        $email = $_SESSION['emailUsers'];

        $num = $this->db->query("SELECT * FROM users WHERE email = '$email' ")->fetch_assoc();
        $cek = $this->db->query("SELECT * FROM artikel WHERE artikel_uri = '$uri' ")->fetch_assoc();

        if ($num > 0) {

            if ($cek > 0) {

                $waktu = date("Y-m-d H:i:s");
                $id_user = $num['id_user'];
                $id_artikel = $cek['id_artikel'];


                return $this->db->query("INSERT INTO komentar_artikel VALUES (NULL,'$id_user','$id_artikel','$waktu','$komentarnya') ");
            }
        }
    }

    public function add_katArtikel()
    {
        $nama = trim(htmlspecialchars($_POST['nama_katArtikel']));
        $uri = str_replace(" ", "-", $nama);
        $icon = time() . $_FILES['icon_katArtikel']['name'];
        $tmp = $_FILES['icon_katArtikel']['tmp_name'];
        $pecah = explode(".", $icon);
        $end = strtolower(end($pecah));

        if (in_array($end, $this->ekstensi) === true) {
            move_uploaded_file($tmp, "../assets/images/icon_katArtikel/" . $icon);
            return $this->db->query("INSERT INTO kategori_artikel VALUES (NULL,'$nama','$uri','$icon') ");
        }
    }

    public function edit_katArtikel($var)
    {
        $nama = trim(htmlspecialchars($_POST['nama_katArtikel']));
        $uri = str_replace(" ", "-", trim(strtolower($nama)));

        $sql = $this->db->query("SELECT * FROM kategori_artikel WHERE katArtikel_uri = '$var' ");
        $assoc = $sql->fetch_assoc();
        $id_katArtikel = $assoc['id_katArtikel'];
        $icon_lama = $assoc['icon_katArtikel'];

        if (!empty($_FILES['icon_katArtikel']['name'])) {

            $icon_katArtikel = time() . $_FILES['icon_katArtikel']['name'];
            $path          = $_FILES['icon_katArtikel']['tmp_name'];

            $pecah         = explode(".", $icon_katArtikel);
            $end         = strtolower(end($pecah));

            if (in_array($end, $this->ekstensi) === true) {

                unlink("../assets/images/icon_katArtikel/" . $icon_lama);
                move_uploaded_file($path, '../assets/images/icon_katArtikel/' . $icon_katArtikel);

                return $this->db->query("UPDATE kategori_artikel SET nama_katArtikel = '$nama' , katArtikel_uri = '$uri' , icon_katArtikel = '$icon_katArtikel' WHERE 	id_katArtikel = '$id_katArtikel'  ");
            }
        } else {
            return $this->db->query("UPDATE kategori_artikel SET nama_katArtikel = '$nama' , katArtikel_uri = '$uri' WHERE id_katArtikel = '$id_katArtikel' ");
        }
    }

    public function hapus_katArtikel($var)
    {
        $ambil = $this->db->query("SELECT * FROM kategori_artikel WHERE katArtikel_uri = '$var'")->fetch_assoc();
        $id_katArtikel = $ambil['id_katArtikel'];
        $fotolama = $ambil['icon_katArtikel'];
        unlink("../assets/images/icon_katArtikel/" . $fotolama);

        return $this->db->query("DELETE FROM kategori_artikel WHERE id_katArtikel = '$id_katArtikel' ");
    }

    public function add_services()
    {
        $nama = trim(htmlspecialchars($_POST['nama_services']));
        $harga = trim(htmlspecialchars($_POST['harga_services']));
        $keterangan = trim($_POST['keterangan']);
        $uri = str_replace(" ", "-", trim(strtolower($nama)));
        $foto = time() . $_FILES['foto_services']['name'];
        $tmp = $_FILES['foto_services']['tmp_name'];
        $pecah = explode(".", $foto);
        $end = strtolower(end($pecah));

        if (in_array($end, $this->ekstensi) === true) {

            move_uploaded_file($tmp, "../assets/images/foto_services/" . $foto);

            return $this->db->query("INSERT INTO services VALUES (NULL,'$nama','$harga','$foto','$keterangan','$uri') ");
        }
    }

    public function edit_services($var)
    {
        $sql = $this->db->query("SELECT * FROM services WHERE services_uri = '$var' ")->fetch_assoc();
        $id = $sql['id_services'];
        $nama_services = trim(htmlspecialchars($_POST['nama_services']));
        $harga_services = trim(htmlspecialchars($_POST['harga_services']));
        $keterangan = trim($_POST['keterangan']);
        $uri = str_replace(" ", "-", trim(strtolower($nama_services)));


        if (!empty($_FILES['foto_services']['name'])) {
            $foto = time() . $_FILES['foto_services']['name'];
            $tmp = $_FILES['foto_services']['tmp_name'];
            $pecah = explode(".", $foto);
            $end = strtolower(end($pecah));

            $fotolama = $sql['foto_services'];

            if (in_array($end, $this->ekstensi) === true) {
                unlink("../assets/images/foto_services/" . $fotolama);
                move_uploaded_file($tmp, "../assets/images/foto_services/" . $foto);

                return $this->db->query("UPDATE services SET nama_services = '$nama_services' , harga_services = '$harga_services' , keterangan = '$keterangan' , services_uri = '$uri' , foto_services = '$foto' WHERE id_services = '$id' ");
            }
        } else {
            return $this->db->query("UPDATE services SET nama_services = '$nama_services' , harga_services = '$harga_services' , keterangan = '$keterangan' , services_uri = '$uri' WHERE id_services = '$id' ");
        }
    }

    public function hapus_services($var)
    {
        $sql = $this->db->query("SELECT * FROM services WHERE services_uri = '$var' ")->fetch_assoc();
        $fotolama = $sql['foto_services'];
        $id = $sql['id_services'];

        unlink("../assets/images/foto_services/" . $fotolama);

        return $this->db->query("DELETE FROM services WHERE id_services = '$id' ");
    }

    public function add_order()
    {
        $id_user = $_SESSION['idUsers'];
        $nama = trim(htmlspecialchars($_POST['nama_pemesan']));
        $email = trim(htmlspecialchars($_POST['email_pemesan']));
        $no_hp = trim(htmlspecialchars($_POST['no_hp']));
        $subject = trim(htmlspecialchars($_POST['subject']));
        $deskripsi = trim(htmlspecialchars($_POST['deskripsi']));
        return $this->db->query("INSERT INTO orderdetail VALUES (NULL,'$id_user','$nama','$email','$no_hp','$subject','$deskripsi','0') ");
    }

    public function verifyOrder($id)
    {
        $sql = $this->db->query("SELECT * FROM orderdetail WHERE id_orderdetail = '$id' ")->fetch_assoc();
        $id_user = $sql['id_user'];
        $query =  $this->db->query("SELECT * FROM users WHERE id_user = '$id_user' ")->fetch_assoc();
        $email = $query['email'];
        $nama = $query['nama'];

        $this->db->query("UPDATE orderdetail SET statusnya = '1' WHERE id_orderdetail = '$id' ");

        $mail = new PHPMailer;

        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.forstone.web.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@techpedia.forstone.web.id';
        $mail->Password = 'Exorcism1337';
        $mail->SMTPSecure = 'tls';
        $mail->Port = "587";

        $mail->setFrom('no-reply@techpedia.tech.', 'TechPedia');
        $mail->addReplyTo('no-reply@techpedia.tech', 'TechPedia');

        // Menambahkan penerima
        $mail->addAddress($email);

        // Subjek email
        $mail->Subject = 'Transaction Details - TechPedia';

        // Mengatur format email ke HTML
        $mail->isHTML(true);

        // Konten/isi email
        $mailContent = "
           <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
                      <html xmlns='http://www.w3.org/1999/xhtml' style='background-color: rgb(240, 240, 240);'> 
                       <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'> 
                        <title></title> 
                         
                         
                        <meta name='viewport' content='width=device-width, initial-scale=1' /> 
                        <meta http-equiv='X-UA-Compatible' content='IE=edge' /> 
                        <style type='text/css'> /* GT AMERICA */ @font-face { font-display: fallback; font-family: 'GT America Regular'; font-weight: 400; src: url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2') format('woff2'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff') format('woff'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf') format('truetype'); } @font-face { font-display: fallback; font-family: 'GT America Medium'; font-weight: 600; src: url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2') format('woff2'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff') format('woff'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf') format('truetype'); } @font-face { font-display: fallback; font-family: 'GT America Condensed Bold'; font-weight: 700; src: url('https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2') format('woff2'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff') format('woff'), url('https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf') format('truetype'); } /* CLIENT-SPECIFIC RESET */ body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; } /* Prevent WebKit and Windows mobile changing default text sizes */ table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; } /* Remove spacing between tables in Outlook 2007 and up */ img { -ms-interpolation-mode: bicubic; } /* Allow smoother rendering of resized image in Internet Explorer */ .im { color: inherit !important; } /* DEVICE-SPECIFIC RESET */ a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; } /* iOS BLUE LINKS */ /* RESET */ img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block; } table { border-collapse: collapse; } table td { border-collapse: collapse; display: table-cell; } body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; } /* BG COLORS */ .mainTable { background-color: #F0F0F0; } .mainTable--hospitality { background-color: #f7f2ed; } html { background-color: #F0F0F0; } /* VARIABLES */ .bg-white { background-color: white; } .hr { /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */ background-color: #d3d3d8; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px; } .textAlignLeft { text-align: left !important; } .textAlignRight { text-align: right !important; } .textAlignCenter{ text-align: center !important; } .mt1 { margin-top: 6px; } .list { padding-left: 18px; margin: 0; } /* TYPOGRAPHY */ body { font-family: 'GT America Regular', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; color: #4f4f65; -webkit-font-smoothing: antialiased; -ms-text-size-adjust:100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility; } .h1 { font-family: 'GT America Condensed Bold', 'Roboto Condensed', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; } .h2 { font-family: 'GT America Medium', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; } .text { font-family: 'GT America Regular', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; } .text-list { font-family: 'GT America Regular', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; font-size: 16px; line-height: 25px; } .textSmall { font-family: 'GT America Regular', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 400; font-size: 14px; } .text-xsmall { font-family: 'GT America Regular', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; } .text-bold { font-weight: 600; } .text-link { text-decoration: underline; } .text-linkNoUnderline { text-decoration: none; } .text-strike { text-decoration: line-through; } /* FONT COLORS */ .textColorDark { color: #23233e; } .textColorNormal { color: #4f4f65; } .textColorBlue { color: #2020c0; } .textColorGrayDark { color: #7B7B8B; } .textColorGray { color: #A5A8AD; } .textColorWhite { color: #FFFFFF; } .textColorRed { color: #df3232; } /* BUTTON */ .Button-primary-wrapper { border-radius: 3px; background-color: #2020C0; } .Button-primary { font-family: 'GT America Medium', 'Roboto', 'Helvetica', 'Arial', sans-serif; border-radius: 3px; border: 1px solid #2020C0; color: #ffffff; display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none; } .Button-secondary-wrapper { border-radius: 3px; background-color: #ffffff; } .Button-secondary { font-family: 'GT America Medium', 'Roboto', 'Helvetica', 'Arial', sans-serif; border-radius: 3px; border: 1px solid #2020C0; color: #2020C0; display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none; } /* LAYOUT */ .Content-container { padding-left: 60px; padding-right: 60px; } .Content-container--main { padding-top: 54px; padding-bottom: 60px; } .Content { width: 580px; margin: 0 auto; } .wrapper { max-width: 600px; } .section { padding: 24px 0px; border-bottom: 1px solid #d3d3d8; } .section--noBorder { padding: 24px 0px 0; } .section--last { padding: 24px 0px; } .message { background-color: #F4F4F5; padding: 18px; } .card { border: 1px solid #d3d3d8; padding: 18px; } /* HEADER */ .header-tockLogoImage { display: block; color: #F0F0F0; } .header-heroImage { padding-bottom: 24px; } /* PREHEADER */ .preheader { display: none; font-size: 1px; color: #FFFFFF; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; } /* BANNER */ .notice { padding: 12px; background: #23233E; color: #FFFFFF; display: block; font-size: 14px; font-family: 'GT America Medium', 'Roboto', 'Helvetica', 'Arial', sans-serif; font-weight: 600; } /* INTRO */ .section--intro { padding-bottom: 48px; } /* BOOKING INFO */ .business-logo__container { width: 48px; height: 48px; border-radius: 3px; border: 1px solid #d3d3d8; overflow: hidden; } .business-logo__image { border: 1px solid transparent; border-radius: 3px; width: 48px; height: 48px; display: block; } .business-address--address { width: 50%; } .business-address--map { width: 50%; } .business-address--map-image { width: 100%; } /* MOBILE TICKETS */ .mobile-ticket--description { width: 65%; margin-top: 12px; margin-right: 5%; } .mobile-ticket--code { width: 30%; } .mobile-ticket--code-image { width: 100%; } /* RESERVATION ACTIONS */ .linksTable { border-bottom: 1px solid #d3d3d8; } .linksTableRow { padding: 24px 12px; } .actions-icon { vertical-align: middle; } .actions-text { vertical-align: middle; } /* RECEIPT */ .receipt__container { border: 1px solid #d3d3d8; padding: 24px; } .receipt__row { border-top: 1px solid #d3d3d8; } /* FEEDBACK ICONS */ .feedback-link { border: 1px solid #d4d5da; border-radius: 3px; display: inline-block; width: calc(32% - 2px); padding: 10px 0; } .feedback-link-bumper { display: inline-block; width: 1%; } .feedback-link img { height: 50px; width: 50px; } /* SOCIAL ICONS */ .social-link { display: inline-block; width: auto; } .social-link-text { padding: 14px 24px 14px 14px; } /* TABLET STYLES */ @media screen and (max-width: 648px) { /* DEVICE-SPECIFIC RESET */ div[style*='margin: 16px 0;'] { margin: 0 !important; } /* ANDROID CENTER FIX */ /* LAYOUT */ .wrapper { width: 100% !important; max-width: 100% !important; } .Content { width: 90% !important; } .Content-container { padding-left: 36px !important; padding-right: 36px !important; } .Content-container--main { padding-top: 30px !important; padding-bottom: 42px !important; } .responsiveTable { width: 100% !important; } /* RESERVATION ACTIONS */ .linksTableRow { padding-left: 0 !important; padding-right: 0 !important; padding-top: 12px !important; padding-bottom: 12px !important; } .linksTableRow--borderRight { border-right: none !important; padding-left: 0 !important; padding-right: 0 !important; } /* FEEDBACK LINK */ .feedback-link img { height: 38px !important; width: 38px !important; } } /* MOBILE STYLES */ @media screen and (max-width: 480px) { /* TYPOGRAPHY */ .h1 { font-size: 30px !important; line-height: 30px !important; } .text { font-size: 16px !important; line-height: 22px !important; } /* BUTTON */ .mobile-buttonContainer { width: 100% !important; } /* LAYOUT */ .Content { width: 100% !important; } .Content-container { padding-left: 18px !important; padding-right: 18px !important; } .Content-container--main { padding-top: 24px !important; padding-bottom: 30px !important; } .section { padding: 18px 0 !important; } .section--last { padding: 18px 0 !important; } .header { padding: 0 18px !important; } .business-address--address { width: 100% !important; } .business-address--map { margin-top: 30px !important; width: 100% !important; } .mobile-ticket--description { width: 100% !important; margin-top: 0px !important; } .mobile-ticket--code { margin-top: 30px !important; margin-left: 0; width: 100% !important; } /* RECEIPT */ .receipt__container { padding: 12px !important; } /* SOCIAL ICONS */ .social-link { display: block !important; width: 100% !important; border-bottom: 1px solid #d3d3d8 !important; } /* INTRO */ .section--intro { padding-top: 18px !important; padding-bottom: 18px !important; } } </style> 
                       </head> 
                       <body style='margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; height: 100%; margin: 0; padding: 0; width: 100%; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; color: rgb(79, 79, 101); -webkit-font-smoothing: antialiased; -ms-text-size-adjust: 100%; -moz-osx-font-smoothing: grayscale; font-smoothing: always; text-rendering: optimizeLegibility;'> 
                        <!-- EXTRA METADATA MARKUP --> 
                        <!--[if mso]>
                          <style type='text/css'>
                      .h1 {font-family: 'Helvetica', 'Arial', sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
                      .h2 {font-family: 'Helvetica', 'Arial', sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
                      .text {font-family: 'Helvetica', 'Arial', sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
                      .text-list {font-family: 'Helvetica', 'Arial', sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
                      .textSmall {font-family: 'Helvetica', 'Arial', sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
                      .text-xsmall {font-family: 'Helvetica', 'Arial', sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
                      .text-bold {font-weight: 600 !important;}
                      .text-link {text-decoration: underline !important;}
                      .text-linkNoUnderline {text-decoration: none !important;}
                      .text-strike {text-decoration: line-through !important;}
                      .textColorDark {color: #23233e !important;}
                      .textColorNormal {color: #4f4f65 !important;}
                      .textColorBlue {color: #2020c0 !important;}
                      .textColorGray {color: #A5A8AD !important;}
                      .textColorWhite {color: #FFFFFF !important;}
                      .Button-primary {font-family: 'Helvetica', 'Arial', sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
                      .Button-secondary {font-family: 'Helvetica', 'Arial', sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
                          </style>
                          <![endif]--> 
                        <!-- HIDDEN PREHEADER TEXT --> 
                        <div class='preheader' style='display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> 
                        </div> 
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class=' mainTable  ' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);'> 
                         <!-- HEADER --> 
                         <tr> 
                          <td align='center' class='header' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                           <!--[if (gte mso 9)|(IE)]>
                          <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                          <tr>
                          <td align='center' valign='top' width='600'>
                          <![endif]--> 
                           <table border='0' cellpadding='0' cellspacing='0' width='100%' class='Content' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;'> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr> 
                             <td align='left' valign='middle' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> </td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                           </table> 
                           <!--[if (gte mso 9)|(IE)]>
                          </td>
                          </tr>
                          </table>
                          <![endif]--> </td> 
                         </tr> 
                         <!-- CONTENT --> 
                         <tr> 
                          <td align='center' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                           <!--[if (gte mso 9)|(IE)]>
                          <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                          <tr>
                          <td align='center' valign='top' width='600'>
                          <![endif]--> 
                           <table border='0' cellpadding='0' cellspacing='0' width='100%' class='Content bg-white' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;'> 
                            <tr> 
                             <td class='Content-container Content-container--main text textColorNormal' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;'> 
                              <table width='100%' border='0' cellspacing='0' cellpadding='0' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;'> 
                               <tr> 
                                <td valign='top' align='left' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                                 <table width='100%' border='0' cellspacing='0' cellpadding='0' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;'> 
                                  <tr> 
                                   <td align='left' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> <span class='h1 textColorDark' style='font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);'>Continue Your Payment</span> </td> 
                                  </tr> 
                                  <tr class='spacer'> 
                                   <td height='18px' colspan='2' style='font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                                  </tr> 
                                  <tr> 
                                   <td align='left' colspan='2' valign='top' width='100%' height='1' class='hr' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;'>
                                    <!--[if gte mso 15]>&nbsp;<![endif]--></td> 
                                  </tr> 
                                  <tr class='spacer'> 
                                   <td height='18px' colspan='2' style='font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                                  </tr> 
                                 </table> </td> 
                               </tr> 
                               <tr> 
                                <td valign='top' align='left' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                                 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;'> 
                                  <tr> 
                                   <td align='left' class='text textColorNormal' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);'> 
                                   $nama <br><br>
                                   Mohon untuk melakukan pembayaran ke nomor rekening dibawah ini : <br>
                                   1230478950 <br><br>
                                   jika dalam 1 jam tidak ada pembayaran , maka order akan dibatalkan . anda bisa mengunjungi tautan di bawah ini untuk melihat riwayat order anda di website Techpedia . <br><br> Jika tidak melakukan aktivitas ini , tolong abaikan email ini
                                   </td> 
                                  </tr> 
                                  <tr class='spacer'> 
                                   <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                                  </tr> 
                                  <tr class='spacer'> 
                                   <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                                  </tr> 
                                  <tr> 
                                   <td align='center' valign='center' width='100%' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                                    <table border='0' cellspacing='0' cellpadding='0' width='100%' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;'> 
                                     <tr> 
                                      <td align='center' valign='center' width='100%' class='Button-primary-wrapper' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);'> <a href='https://techpedia.forstone.web.id/UserDashboard/index' target='_blank' class='Button-primary' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;'> Check Order Details </a> </td> 
                                     </tr> 
                                    </table> </td> 
                                  </tr> 
                                 </table> </td> 
                               </tr> 
                              </table> </td> 
                            </tr> 
                           </table> </td> 
                         </tr> 
                         <!-- FOOTER --> 
                         <tr> 
                          <td align='center' class='Content' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;'> 
                           <!-- Will most likely required a feature flag --> 
                           <!--[if (gte mso 9)|(IE)]>
                      <table align='center' border='0' cellspacing='0' cellpadding='0' width='600'>
                      <tr>
                      <td align='center' valign='top' width='600'>
                      <![endif]--> 
                           <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' class='Content-container' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;'> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr> 
                             <td align='center' valign='top' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> </td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='18px' colspan='2' style='font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr> 
                             <td align='center' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> 
                              <div class='text-xsmall textColorNormal' style='font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);'>
                               Powered by TechPedia
                              </div> 
                              <div class='text-xsmall textColorNormal' style='font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);'>
                               All Rights Reserved
                              </div> </td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                            <tr class='spacer'> 
                             <td height='12px' colspan='2' style='font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'>&nbsp;</td> 
                            </tr> 
                           </table> 
                           <!--[if (gte mso 9)|(IE)]>
                      </td>
                      </tr>
                      </table>
                      <![endif]--> </td> 
                         </tr> 
                        </table> 
                       
                      </body> 
                      </html>
            ";
        $mail->Body = $mailContent;

        // Menambahakn lampiran
        //$mail->addAttachment('lmp/file1.pdf');
        //$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

        // Kirim email

        if (!$mail->send()) {
            echo "<script>
                            swal('Whoopz!','Pesan tidak terkirim $mail->ErrorInfo ','error') </script>";
        } else {
            echo "<script>
                            swal('Success!','Berhasil , silahkan cek email pada inbox atau spam ','success')
                          .then((result) => {
                            document.location = 'order'
                        });
                            </script>";
        }
    }
    
    public function add_appsdetail()
    {
        $id_apps = trim(htmlspecialchars($_POST['id_apps']));
        $apps_detail = trim(htmlspecialchars($_POST['apps_detail']));

        return $this->db->query("INSERT INTO appsdetail VALUES(NULL,'$id_apps','$apps_detail') ");
    }

    public function hapus_appsdetail($var)
    {
        return $this->db->query("DELETE FROM appsdetail WHERE id_appsdetail = '$var' ");
    }

    public function edit_AppsDetail($var)
    {
        $id_apps = trim(htmlspecialchars($_POST['id_apps']));
        $apps_detail = trim(htmlspecialchars($_POST['apps_detail']));


        return $this->db->query("UPDATE appsdetail SET apps_detail = '$apps_detail' , id_apps = '$id_apps' WHERE id_appsdetail = '$var' ");
    }
}


$init = new fungsi();
