<?php
require_once __DIR__ . "/../Admin@techpedia/configuration.php";

require_once __DIR__ .  '/../Admin@techpedia/PHPMailer/PHPMailerAutoload.php';

class authController extends configuration
{
    private $token_login = "496cd1609e4a4d5323dda6bc575c88dff69264bb";

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

        $sql = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        $assoc = $sql->fetch_assoc();
        $num = $sql->num_rows;


        if ($num > 0) {
            if ($assoc['is_active'] == '2') {
                echo "<script>
                
                            swal('Whoopz!','Akun Anda dibanned! hubungi admin dan silahkan baca aturan penggunaan ','error')</script>";
                exit;
            } elseif ($assoc['is_active'] == '0') {
                echo "<script>
                            swal('Whoopz!','Akun Anda Belum diaktivasi.','error')</script>";
                exit;
            } else {
                if (password_verify($password, $assoc['password'])) {
                    $_SESSION['users']       = TRUE;
                    $_SESSION['keyUsers']    = $this->token_login;
                    $_SESSION['idUsers']     = $assoc['id_user'];
                    $_SESSION['namaUsers']    = $assoc['nama'];
                    $_SESSION['emailUsers']       = $assoc['email'];
                    $_SESSION['teleponUsers']     = $assoc['telepon'];
                    $_SESSION['foto_profil'] = $assoc['foto_profil'];
                    $_SESSION['is_premium'] = $assoc['is_premium'];
                    $_SESSION['position'] = $assoc['position'];
                    $_SESSION['about'] = $assoc['about'];
                    $_SESSION['created_at'] = $assoc['created_at'];



                    $username = $_SESSION['namaUsers'];
                    echo "<script>
                            swal('Gotcha!','Berhasil Login . Welcome $username','success')
                        .then((result) => {
                            document.location = '../index'
                        });
                            </script>";

                    $id_user = $assoc['id_user'];


                    return $this->db->query("UPDATE tb_online_user SET is_online = 1 WHERE id_user = '$id_user'");
                } else {
                    echo "<script>
                            swal('Whoopz!','Username atau Password Salah','error')</script>";
                }
            }
        } else {
            echo "<script> swal('Whoopz!','Username atau Password Salah','error') </script>";
        }
    }

    public function register()
    {
        $nama       = trim(htmlspecialchars($_POST['nama']));
        $email      = trim(htmlspecialchars($_POST['email']));
        $telepon    = trim(htmlspecialchars($_POST['telepon']));
        $password   = trim(htmlspecialchars($_POST['password']));

        $timestamp =  date("Y-m-d H:i:s");


        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' ");
        $num = $query->num_rows;


        if ($num > 0) {
            echo "<script>
                            swal('Whoopz!','Email telah Terdaftar','error')
                       
                            </script>";
            exit;
        } else {
            $pass = password_hash($password, PASSWORD_DEFAULT);

            $this->db->query("INSERT INTO users VALUES (NULL,'$nama','$email','$telepon','$pass','default.png','0','0','Member Of TechPedia','Member Of TechPedia','$timestamp','$timestamp') ");

            $this->activate($email);
        }
    }

    public function verifyActivate($var)
    {
        $sql = $this->db->query("SELECT * FROM activate WHERE token = '$var' ");
        $fetch = $sql->fetch_assoc();
        $id_user = $fetch['id_user'];
        $cek = $sql->num_rows;

        $baru = $this->db->query("SELECT * FROM users WHERE id_user = '$id_user' ")->fetch_assoc();


        if (time() - $fetch['date'] < (60 * 60 * 24)) {
            if ($cek > 0) {

                if ($baru['is_active'] == '1') {
                    echo "<script>
                            swal('Gotcha!','Akun anda telah diaktivasi','success')
                        .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
                    exit;
                } elseif ($baru['is_active'] == '2') {
                    echo "<script>
                            swal('Gotcha!','Akun anda telah dibanned.','success')
                        .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
                    exit;
                } else {

                    echo "<script>
                                swal('Gotcha!','Berhasil Aktivasi Akun','success')
                            .then((result) => {
                                document.location = '../index'
                            });
                                </script>";

                    $this->db->query("DELETE FROM activate WHERE id_user = '$id_user' ");

                    $this->db->query("INSERT INTO tb_online_user VALUES (NULL,'$id_user','0') ");

                    return $this->db->query("UPDATE users SET is_active = 1 WHERE id_user = '$id_user'");
                }
            } else {
                echo "<script>
                            swal('Whoopz!','Token tidak valid','error')
                         .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
                exit;
            }
        } else {
            echo "<script>
                            swal('Whoopz!','Token Expired , silahkan ulangi kembali','error')
                         .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
            exit;
        }
    }

    public function activate()
    {
        $email = trim(htmlspecialchars($_POST['email']));

        $sql = $this->db->query("SELECT * FROM users WHERE email = '$email' ");
        $assoc = $sql->fetch_assoc();
        $hitung = $sql->num_rows;

        $id_user = $assoc['id_user'];
        $nama = $assoc['nama'];

        if ($hitung > 0) {


            $mail = new PHPMailer;
            $limitnya = 1;
            $tgl = time();
            $token = md5(uniqid(true));


            $cek = $this->db->query("SELECT * FROM activate WHERE id_user = '$id_user' ");
            $fetch = $cek->fetch_assoc();
            $num = $cek->num_rows;

            if ($num < 1) {
                $this->db->query("INSERT INTO activate VALUES(NULL,'$id_user','$token','$limitnya','$tgl') ");
            } elseif ($num > 0) {

                if ($fetch['limitnya'] <= 2) {
                    $this->db->query("UPDATE activate SET limitnya  = limitnya + 1 , token = '$token' WHERE id_user = '$id_user' ");
                } else {
                    if (time() - $fetch['date'] > (60 * 60 * 24)) {
                        return $this->db->query("UPDATE activate SET limitnya = 0 WHERE id_user = '$id_user' ");
                    } else {

                        echo "<script>
                                    swal('Whoopz!','Limit Aktivasi sebanyak 3 kali , coba lagi besok ','error')
                                
                                    </script>";
                        exit;
                    }
                }
            }



            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.ganskul.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@techpedia.ganskul.com';
            $mail->Password = 'Exorcism1337';
            $mail->SMTPSecure = 'tls';
            $mail->Port = "587";

            $mail->setFrom('no-reply@techpedia.tech', 'TechPedia');
            $mail->addReplyTo('no-reply@techpedia.tech', 'TechPedia');

            // Menambahkan penerima
            $mail->addAddress($email);

            // Subjek email
            $mail->Subject = 'Activate Account - TechPedia';

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
                                   <td align='left' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> <span class='h1 textColorDark' style='font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);'>Activate Your Account</span> </td> 
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
                                   Mohon untuk mengunjungi tautan di bawah ini untuk aktivasi akun anda di website Techpedia . <br><br> Jika tidak melakukan aktivitas ini , tolong abaikan email ini
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
                                      <td align='center' valign='center' width='100%' class='Button-primary-wrapper' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);'> <a href='https://techpedia.ganskul.com/auth/activate/$token' target='_blank' class='Button-primary' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;'> Activate Account </a> </td> 
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
                            swal('Whoopz!','Pesan tidak terkirim','error') </script>";
            } else {
                echo "<script>
                            swal('Success!','Berhasil , silahkan cek email pada inbox atau spam ','success')
                            .then((result) => {
                            document.location = 'index'
                        });
                        
                            </script>";
            }
        }
    }


    public function forgotpass()
    {
        $email = trim(htmlspecialchars($_POST['email']));

        $sql = $this->db->query("SELECT * FROM users WHERE email = '$email' ");
        $assoc = $sql->fetch_assoc();
        $hitung = $sql->num_rows;

        $id_user = $assoc['id_user'];
        $nama = $assoc['nama'];

        if ($hitung > 0) {

            if ($assoc['is_active'] != 1) {
                echo "<script>
                            swal('Whoopz!','Akun anda belum diaktivasi . silahkan login ulang ','error')
                            .then((result) => {
                            document.location = 'index'
                        });
                        
                            </script>";
                exit;
            }

            $mail = new PHPMailer;
            $limitnya = 1;
            $tgl = time();
            $token = md5(uniqid(true));

            $cek = $this->db->query("SELECT * FROM resetpassword WHERE id_user = '$id_user' ");
            $fetch = $cek->fetch_assoc();
            $num = $cek->num_rows;

            if ($num < 1) {
                $this->db->query("INSERT INTO resetpassword VALUES(NULL,'$id_user','$token','$limitnya','$tgl') ");
            } elseif ($num > 0) {

                if ($fetch['limitnya'] <= 2) {
                    $this->db->query("UPDATE resetpassword SET limitnya  = limitnya + 1 , token = '$token' WHERE id_user = '$id_user' ");
                } else {
                    if (time() - $fetch['date'] > (60 * 60 * 24)) {
                        return $this->db->query("UPDATE resetpassword SET limitnya = 0 WHERE id_user = '$id_user' ");
                    } else {

                        echo "<script>
                                    swal('Whoopz!','Limit reset password sebanyak 3 kali , coba lagi besok ','error')
                                
                                    </script>";
                        exit;
                    }
                }
            }



            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.forstone.web.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@techpedia.forstone.web.id';
            $mail->Password = 'Exorcism1337';
            $mail->SMTPSecure = 'tls';
            $mail->Port = "587";

            $mail->setFrom('no-reply@techpedia.tech', 'TechPedia');
            $mail->addReplyTo('no-reply@techpedia.tech', 'TechPedia');

            // Menambahkan penerima
            $mail->addAddress($email);

            // Subjek email
            $mail->Subject = 'Forgot Password - TechPedia';

            // Mengatur format email ke HTML
            $mail->isHTML(true);

            // Konten/isi email
            $mailContent = "
           <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
                      <html xmlns='http://www.w3.org/1999/xhtml' style='background-color: rgb(240, 240, 240);'> 
                       <head> 
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
                                   <td align='left' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;'> <span class='h1 textColorDark' style='font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);'>Reset your password</span> </td> 
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
                                   Mohon untuk mengunjungi tautan di bawah ini untuk mengatur ulang password pada akun anda di website Techpedia . <br><br> Jika tidak melakukan aktivitas ini , tolong abaikan email ini
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
                                      <td align='center' valign='center' width='100%' class='Button-primary-wrapper' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);'> <a href='https://techpedia.forstone.web.id/auth/reset_pass/$token' target='_blank' class='Button-primary' style='-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;'> Reset your password </a> </td> 
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
                            swal('Success!','silahkan cek email anda pada inbox atau spam ','success')
                        
                            </script>";
            }
        } else {
            echo "<script>
                            swal('Whoopz!','Email tidak terdaftar','error')
                        
                            </script>";
        }
    }

    public function resetpass($var)
    {
        $sql = $this->db->query("SELECT * FROM resetpassword WHERE token = '$var' ");
        $fetch = $sql->fetch_assoc();
        $id_user = $fetch['id_user'];
        $cek = $sql->num_rows;


        if (time() - $fetch['date'] < (60 * 60)) {
            if ($cek > 0) {

                $new = trim(htmlspecialchars($_POST['password']));
                $encrypt = password_hash($new, PASSWORD_DEFAULT);


                echo "<script>
                            swal('Gotcha!','Berhasil Reset Password','success')
                        .then((result) => {
                            document.location = '../index'
                        });
                            </script>";

                $this->db->query("DELETE FROM resetpassword WHERE id_user = '$id_user' ");

                return $this->db->query("UPDATE users SET password = '$encrypt' WHERE id_user = '$id_user'");
            } else {
                echo "<script>
                            swal('Whoopz!','Token tidak valid','error')
                         .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
                exit;
            }
        } else {
            echo "<script>
                            swal('Whoopz!','Token Expired , silahkan ulangi kembali','error')
                         .then((result) => {
                            document.location = '../index'
                        });
                            </script>";
            exit;
        }
    }
}

$auth_init = new authController();
