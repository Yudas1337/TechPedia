<?php
error_reporting(0);

require_once __DIR__ . "/../templates/header.php";



if (isset($_GET['modul'])) {

    $abs = trim(htmlspecialchars($_GET['modul']));
    $query = $init->tampil("SELECT * FROM modules WHERE judul_uri = '$abs' ")[0];
    $idnya = $query['id'];
    $id_bab = $query['id_bab'];

    $query2 = $init->tampil("SELECT * FROM bab_modules WHERE id_bab = '$id_bab' ")[0];

    $rarity = $query2['rarity'];

    $id_apps = $query['id_apps'];

    $apps = $init->tampil("SELECT * FROM apps WHERE id_apps = '$id_apps' ")[0];

    $modul = $init->tampil("SELECT * FROM modules ORDER BY rand() LIMIT 12 ");
    $catapps = $init->tampil("SELECT * FROM apps ORDER BY rand() LIMIT 12 ");

    $komentar = $init->tampil("SELECT * FROM komentar JOIN users ON komentar.id_user = users.id_user WHERE komentar.id_modules = '$idnya' ");
    $jumlahkomentar = $init->hitung("SELECT * FROM komentar WHERE id_modules = '$idnya' ");

    if (isset($_SESSION['idUsers'])) {
        $id = $_SESSION['idUsers'];
        $query3 = $init->tampil("SELECT * FROM users WHERE id_user = '$id' ")[0];
        $premium = $query3['is_premium'];


        if ($premium == 0) {

            if ($premium != $rarity) {
                echo "<script>alert('Anda Bukan premium member')
                document.location = '../../courses'
                </script>";
                exit;
            }
        }
    } else {
        echo "<script>alert('Anda harus login terlebih dahulu')
        document.location = '../../auth'
        </script>";
        exit;
    }
}

?>

<body class="post-template-default single single-post postid-1388 single-format-standard sidebar-active elementor-default" id="body">

    <div class="xs-inner-banner inner-banner2" style="background-image:url(//wp.xpeedstudio.com/agmycoo/wp-content/uploads/2018/12/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="inner-banner">
                        <p class="inner-banner-title"><?= $query['judul'];  ?></p>
                        <ul class="breadcrumbs list-inline">
                            <li><a href="<?= $init->base_url() ?>">Home</a></li>/<li><a href="<?= $init->base_url('courses') ?>">Courses</a></li>/<li><a href="<?= $init->base_url('courses/learns/' . $apps['bahasa']) ?>"><?= $apps['bahasa']; ?></a> / <?= $query['judul']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-content" class="main-container blog-single-post xs__blog" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="content-single">
                        <article id="post-1388" class=" post-details post-1388 post type-post status-publish format-standard has-post-thumbnail hentry category-frontend">
                            <div class="entry-thumbnail post-media post-image">
                                <img width="800" height="500" src="<?= $init->base_url('assets/images/foto_modules/' . $query['foto_modul']); ?>" class="attachment-full size-full wp-post-image" sizes="(max-width: 800px) 100vw, 800px" /> </div>
                            <div class="post-body clearfix">

                                <!-- Article header -->
                                <header class="entry-header clearfix">
                                    <h2 class="entry-title">
                                        <?= $query['judul']; ?> </h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date">
                                            <i class="icon icon-clock"></i>
                                            <?= $query['tanggal']; ?></span><span class="post-author"><i class="icon icon-user"></i>Admin</span><span class="meta-categories post-cat">
                                            <i class="icon icon-folder"> </i>
                                            <a href="<?= $init->base_url('courses/learns/' . $apps['bahasa']); ?>" rel="category tag"><?= $apps['bahasa']; ?></a>
                                        </span> </div>
                                </header><!-- header end -->

                                <!-- Articlef content -->
                                <div class="entry-content clearfix">
                                    <?= $query['konten']; ?>
                                </div> <!-- end entry-content -->
                            </div> <!-- end post-body -->
                        </article>
                        <footer class="entry-footer clearfix">
                        </footer> <!-- .entry-footer -->
                    </div> <!-- .entry-content -->


                    <div id="comments" class="blog-post-comment">

                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="/agmycoo/she-packed-her-seven-versalia-put-her-initial-2/#respond" style="display:none;">Cancel reply</a></small></h3>
                            <form method="post" id="commentform" class="comment-form FormKomentar">
                                <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span>
                                    <br>
                                    <?php if (!isset($_SESSION['namaUsers'])) : ?>
                                        <?php echo "<div class = 'alert alert-danger'>Untuk mengakses fitur komentar , anda harus login terlebih dahulu</div>"; ?>

                                    <?php endif; ?>
                                </p>
                                <div class="comment-info row">
                                    <div class="col-md-6">
                                        <input name="uri" type="text" value="<?= $abs; ?>" autocomplete="off" readonly style="display:none" /></div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 ">
                                        <textarea class="form-control" Placeholder="Enter Comments" id="comment" name="komentarnya" cols="45" rows="8" aria-required="true">
					</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn-comments btn btn-primary">Post Comments</button>
                                    </div>
                                </div>

                                </p>
                            </form>
                        </div><!-- #respond -->


                        <h2 class="comment-num">
                            <?= $jumlahkomentar . " Komentar" ?> </h2>



                        <ul class="comments-list">
                            <?php foreach ($komentar as $k) : ?>
                                <li class="comment byuser comment-author-agmycoo bypostauthor even thread-even depth-1 parent" id="comment-4">
                                    <div id="div-comment-4" class="comment-body">
                                        <img src="<?= $init->base_url('assets/images/foto_users/' . $k['foto_profil']); ?>" width="60" height="60" alt="Agmycoo" class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo" />
                                        <div class="meta-data">

                                            <div class="pull-right reply"><a rel='nofollow' class='comment-reply-link' href='https://wp.xpeedstudio.com/agmycoo/she-packed-her-seven-versalia-put-her-initial-2/?replytocom=4#respond' onclick='return addComment.moveForm( "div-comment-4", "4", "respond", "1388" )' aria-label='Reply to Agmycoo'><i class="fa fa-mail-reply-all"></i> Reply</a> </div>


                                            <span class="comment-author vcard"><cite><?= $k['nama']; ?></cite> <span class="says">says:</span> </span>

                                            <div class="comment-meta commentmetadata comment-date">
                                                <?= $k['waktu']; ?> </div>
                                        </div>
                                        <div class="comment-content">

                                            <p><?= $k['komentarnya']; ?></p>
                                        </div>
                                    </div>

                                </li><!-- #comment-## -->
                            <?php endforeach; ?>
                        </ul><!-- .comment-list -->





                    </div><!-- #comments -->
                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 col-md-12">
                    <aside id="sidebar" class="sidebar" role="complementary">
                      
                        <div id="categories-2" class="widget widget_categories">
                            <h4 class="widget-title">Categories</h4>
                            <ul>
                                <?php foreach ($catapps as $c) : ?>
                                    <li class="cat-item cat-item-10"><a href="<?= $init->base_url('courses/learns/' . $c['apps_uri']); ?>"><?= $c['bahasa']; ?></a>
                                    </li>
                                <?php
                                endforeach;
                                ?>

                            </ul>
                        </div>
                        <div id="meta-2" class="widget widget_meta">
                            <h4 class="widget-title">Modul Lainnya</h4>
                            <ul>
                                <?php foreach ($modul as $m) : ?>



                                    <li><a href="<?= $init->base_url('courses/modul/' . $m['judul_uri']); ?>" class="text-center mt-5">

                                            <?= $m['judul']; ?></a></li>

                                <?php endforeach; ?>
                            </ul>
                        </div>


                    </aside> <!-- #sidebar -->
                </div><!-- Sidebar col end -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div>
    <!--#main-content -->
    <?php
    require_once __DIR__ . "/../templates/footer.php";
    if (isset($_POST['submit'])) {
        if (!$_SESSION['namaUsers']) {
            echo "<script>
                swal('Whoopz!','Gagal Tambah Komentar , Anda harus login terlebih dahulu!','error')</script>";
        } elseif ($_SESSION['namaUsers']) {

            if ($init->tambah_komentar($_POST) > 0) {
                echo "<script>
                     swal('Gotcha!','Berhasil Tambah Komentar','success') </script>";
            }
        }
    }

    ?>