<?php
require_once __DIR__ . "/../Admin@techpedia/configuration.php";

class authController extends configuration
{
    private $token_login = "b88179fb9aae869b373cd86044189dc6";

    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $email      = trim(htmlspecialchars($_POST['email']));
        $password   = trim(htmlspecialchars($_POST['password']));


        $this->cek_login($email, $password);
    }

    private function cek_login($email, $password)
    {
        $email      = $this->db->real_escape_string($email);
        $password   = $this->db->real_escape_string($password);

        $sql = $this->db->query("SELECT * FROM admins WHERE email = '$email'");
        $assoc = $sql->fetch_assoc();
        $num = $sql->num_rows;


        if ($num > 0) {
            if ($assoc['is_active'] != '1') {
                echo "<script>
                
                            swal('Whoopz!','Akun Anda telah dibanned! hubungi admin dan silahkan baca aturan penggunaan ','error')
                        .then((result) => {
                            document.location = 'index'
                        });
                            </script>";
            } else {
                if (password_verify($password, $assoc['password'])) {
                    $_SESSION['admins']      = TRUE;
                    $_SESSION['key']         = $this->token_login;
                    $_SESSION['id_admin']    = $assoc['id_admin'];
                    $_SESSION['username']    = $assoc['username'];
                    $_SESSION['email']       = $assoc['email'];
                    $_SESSION['telepon']     = $assoc['telepon'];
                    $_SESSION['foto_profil'] = $assoc['foto_profil'];
                    $_SESSION['id_role']     = $assoc['id_role'];
                    $_SESSION['position']    = $assoc['position'];



                    $username = $_SESSION['username'];
                    echo "<script>
                            swal('Gotcha!','Berhasil Login . Welcome $username','success')
                        .then((result) => {
                            document.location = '../Admin@techpedia/index'
                        });
                            </script>";

                    $id_admin = $assoc['id_admin'];

                    return $this->db->query("UPDATE tb_online_admin SET is_online = 1 WHERE id_admin = '$id_admin'");
                } else {
                    echo "<script>
                            swal('Whoopz!','Username atau Password Salah','error')
                        .then((result) => {
                            document.location = 'index'
                        });
                            </script>";
                }
            }
        } else {
            echo "<script>
                            swal('Whoopz!','Username atau Password Salah','error')
                        .then((result) => {
                            document.location = 'index'
                        });
                            </script>";
        }
    }
}

$auth_init = new authController();
