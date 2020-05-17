<?php
require_once __DIR__ . "/../Admin@techpedia/configuration.php";


class UserController extends configuration
{
    function __construct()
    {
        parent::__construct();
    }

    public function user_logout()
    {
        session_start();

        $id_user = $_SESSION['idUsers'];

        $this->db->query("UPDATE tb_online_user SET is_online = 0 WHERE id_user = '$id_user'");

        unset($_SESSION['keyUsers']);
        unset($id_user);
        unset($_SESSION['idUsers']);
        unset($_SESSION['namaUsers']);
        unset($_SESSION['emailUsers']);
        unset($_SESSION['teleponUsers']);
        unset($_SESSION['foto_profil']);
        unset($_SESSION['is_premium']);
        unset($_SESSION['position']);
        unset($_SESSION['about']);
        unset($_SESSION['created_at']);
        $_SESSION['users'] = FALSE;
    }

    public function user_edit_profile()
    {
        $id_user = $_SESSION['idUsers'];
        $nama = trim(htmlspecialchars($_POST['nama']));
        $telepon  = trim(htmlspecialchars($_POST['telepon']));
        $position = trim(htmlspecialchars($_POST['position']));
        $about = trim(htmlspecialchars($_POST['about']));

        if (!empty($_FILES['foto_profil']['name'])) {
            $foto_profil = time() . $_FILES['foto_profil']['name'];
            $path_foto   = $_FILES['foto_profil']['tmp_name'];
            $pecah = explode(".", $foto_profil);
            $end = strtolower(end($pecah));

            $sql = $this->db->query("SELECT * FROM users WHERE id_user = '$id_user'")->fetch_assoc();
            $fotolama = $sql['foto_profil'];

            if (in_array($end, $this->ekstensi) === true) {
                if ($fotolama != 'default.png') {
                    unlink("../assets/images/foto_users/" . $fotolama);
                }
                move_uploaded_file($path_foto, "../assets/images/foto_users/" . $foto_profil);
                return $this->db->query("UPDATE users SET nama= '$nama' ,telepon = '$telepon' , foto_profil = '$foto_profil' , position = '$position' , about = '$about'  WHERE id_user = '$id_user'  ");
            }
        } else {
            return $this->db->query("UPDATE users SET nama = '$nama' , telepon = '$telepon' , position = '$position' , about = '$about' WHERE id_user = '$id_user' ");
        }
    }
    public function update_pass()
    {
        $old_pass       = trim(htmlspecialchars($_POST['old_pass']));
        $new_pass       = trim(htmlspecialchars($_POST['new_pass']));
        $repeat_pass    = trim(htmlspecialchars($_POST['repeat_pass']));

        $id_user = $_SESSION['idUsers'];
        $sql = $this->db->query("SELECT * FROM users WHERE id_user = '$id_user'")->fetch_assoc();
        if (password_verify($old_pass, $sql['password'])) {

            if (strlen($new_pass) < 6) {
                echo "<script>
                            swal('Whoopz!','Password Minimal 6 Karakter','error')
                        
                            </script>";
            } else {
                if ($new_pass == $repeat_pass) {
                    $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                    return $this->db->query("UPDATE users SET password = '$new_pass' WHERE id_user = '$id_user' ");
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

    public function add_testimonials()
    {
        $testi = trim(htmlspecialchars($_POST['testi']));

        $id = $_SESSION['idUsers'];

        $sql = $this->db->query("SELECT * FROM testimonials WHERE id_user = '$id' ");
        $cek = $sql->num_rows;

        if ($cek > 0) {
            return $this->db->query("UPDATE testimonials SET testi = '$testi' WHERE id_user = '$id' ");
        } else {
            return $this->db->query("INSERT INTO testimonials VALUES ('','$id','$testi') ");
        }
    }
}

$user = new UserController();
