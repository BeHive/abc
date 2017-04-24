<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'vendor/Slim/Slim.php';
require_once 'vendor/Spyc/Spyc.php';
//require_once 'vendor/Mail/Mail.php';

$globalLang = 'pt';
function handleSession()
{
    session_cache_limiter(false);
    $app = \Slim\Slim::getInstance();

    if ($app->request->getResourceUri() != '/admin/login' && $app->request->getResourceUri() != '/admin' && (!isset($_SESSION["hasSession"]) || !$_SESSION["hasSession"])) {
        return $app->response->redirect("/admin");
    }

}

function handleLang()
{
    global $globalLang;
    $app = \Slim\Slim::getInstance();

    $params = $app->request->params();
    if(isset($params['lang'])){
        if($params['lang'] == 'en')
        $globalLang = 'en';
    }
}

function flash($type = 'green', $messages = '')
{
    $_SESSION['flash'] = array("type" => $type, "message" => $messages);
}

\Slim\Slim::registerAutoloader();

$menu = Spyc::YAMLLoad($_SERVER['DOCUMENT_ROOT'] . '\\configs\\menu.yml');
$social = Spyc::YAMLLoad($_SERVER['DOCUMENT_ROOT'] . '\\configs\\social.yml');
$dbConf = Spyc::YAMLLoad($_SERVER['DOCUMENT_ROOT'] . '\\configs\\db.yml');

$dsn = 'mysql:host=' . $dbConf['host'] . ';dbname=' . $dbConf['dbname'];
$username = $dbConf['user'];
$password = $dbConf['pwd'];
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$db = new PDO($dsn, $username, $password, $options);

$app = new \Slim\Slim(array(
    'debug' => true,
    'templates.path' => $_SERVER['DOCUMENT_ROOT'] . '\layout'
));

// GET route
$app->get('/','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;

    if($globalLang == 'pt'){
        $sth = $db->prepare('SELECT id, titulo, short_desc FROM areas_pratica');
    }
    else {
        $sth = $db->prepare('SELECT id, titulo_en, short_desc_en FROM areas_pratica');
    }

    $sth->execute();
    $areas = $sth->fetchAll();

    if($globalLang == 'pt'){
        $sth = $db->prepare('SELECT pictureList, sociedade as sociedade, filosofia as filosofia, beliefs as beliefs, areas as areas FROM homepage');
    }
    else {
        $sth = $db->prepare('SELECT pictureList, sociedade_en as sociedade, filosofia_en as filosofia, beliefs_en as beliefs, areas_en as areas FROM homepage');
    }

    $sth->execute();
    $blocos = $sth->fetchAll();

    $sth = $db->prepare('SELECT * FROM blog order by date desc');
    $sth->execute(array());
    $blog = $sth->fetchAll();


    $app->render('homepage.php', array("section" => "homepage","sectionTitle"=>"Homepage",'lang'=>$globalLang,'blocos'=>$blocos[0],'menu' => $menu, 'social' => $social, 'db' => $db, 'areas' => $areas, 'blog' => $blog));
    $db = null;
});

$app->post("/reuniao",'handleLang', function () use ($app, $db) {
    $name = utf8_encode($app->request->post('name'));
    $email = utf8_encode($app->request->post('email'));
    $body = utf8_encode($app->request->post('body'));

    $sth = $db->prepare('INSERT INTO mensagens (name,email,body,date) VALUES (?,?,?,?)');
    $sth->execute(array($name, $email, $body, date("Y-m-d H:i:s")));
});

$app->get('/comunicacao', 'handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM blog order by date desc');
    $sth->execute(array());
    $blog = $sth->fetchAll();

    $app->render('comunicacao.php', array("section" => "comunicacao","sectionTitle"=>$globalLang == 'pt'?"comunicação":"communication","blog" => $blog,'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db,));
    $db = null;
})->name('comunicacao');

$app->get('/comunicacao/:id', 'handleLang', function ($id) use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM blog where id = ?');
    $sth->execute(array($id));
    $blog = $sth->fetchAll();

    $app->render('post.php', array("section" => "comunicacao","sectionTitle"=>$globalLang == 'pt'?"comunicação":"communication","blog" => $blog[0],'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db,));
    $db = null;
})->name('comunicacaoPost');

$app->get('/areas','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM areas_pratica');
    $sth->execute(array());
    $areas = $sth->fetchAll();

    $app->render('areas.php', array("section" => "areas","sectionTitle"=>$globalLang == 'pt'?"áreas de prática":"areas of expertise",'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db, 'areas' => $areas));
    $db = null;
})->name('areas');

$app->get('/recrutamento','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    if($globalLang == 'pt'){
        $sth = $db->prepare('SELECT valor as valor, razoes as razoes FROM recrutamento');
    }
    else {
        $sth = $db->prepare('SELECT valor_en as valor, razoes_en as razoes FROM recrutamento');
    }

    $sth->execute();
    $razoes = $sth->fetchAll();

    $app->render('recrutamento.php', array("section" => "recrutamento","sectionTitle"=>$globalLang == 'pt'?"procuramos valor":"we seek value",'razoes'=>$razoes[0],'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db));
    $db = null;
})->name('recrutamento');

$app->get('/disclaimer','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM disclaimers');
    $sth->execute(array());
    $disclaimer = $sth->fetchAll();

    $app->render('disclaimer.php', array("section" => "disclaimer","sectionTitle"=>"disclaimer",'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db, 'disclaimer' => $disclaimer[0]));
    $db = null;
})->name('disclaimer');

$app->get('/testemunhos','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    $app->redirect($app->urlFor('recrutamento'));
});

$app->get('/testemunhos/:id','handleLang', function ($id) use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM testemunhos where id = ?');
    $sth->execute(array($id));
    $testemunho = $sth->fetchAll();

    $app->render('testemunho.php', array("section" => "recrutamento","sectionTitle"=>$globalLang == 'pt'?"testemunhos":"testimonials",'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db, 'testemunho' => $testemunho[0]));
    $db = null;
});

$app->get('/equipa','handleLang', function () use ($app, $menu, $social, $db) {
    global $globalLang;
    $sth = $db->prepare('SELECT * FROM team');
    $sth->execute();
    $team = $sth->fetchAll();

    $sth = $db->prepare('SELECT * FROM positions order by sort');
    $sth->execute();
    $positions = $sth->fetchAll();

    $app->render('team.php', array("section" => "equipa","sectionTitle"=>$globalLang == 'pt'?"equipa":"team",'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db, 'positions' => $positions, 'team' => $team));
    $db = null;
});

$app->get('/equipa/:id','handleLang', function ($id) use ($app, $menu, $social, $db) {
    global $globalLang;
    if($globalLang == 'pt') {
        $sth = $db->prepare('SELECT t.id, t.name,t.photo, p.name as position, t.description as description FROM team t inner join positions p on p.id = t.position where t.id = ?');
    }
    else {
        $sth = $db->prepare('SELECT t.id, t.name,t.photo, p.name_en as position, t.description_en as description FROM team t inner join positions p on p.id = t.position where t.id = ?');
    }
    $sth->execute(array($id));
    $team = $sth->fetchAll();

    $app->render('teammember.php', array("section" => "equipa","sectionTitle"=>$globalLang == 'pt'?"equipa":"team",'lang'=>$globalLang,'menu' => $menu, 'social' => $social, 'db' => $db, 'member' => $team[0]));
    $db = null;
});

// GET route
$app->get('/image/:type/:image', function ($type, $image) use ($app, $db) {


    $sth = $db->prepare('SELECT photo_type,photo FROM ' . $type . ' where id = ?');
    $sth->execute(array($image));
    $picture = $sth->fetchAll();

    $app->response->setStatus(200);
    $app->response->headers->set('Content-Type', $picture[0]['photo_type']);
    $app->response->setBody($picture[0]['photo']);

    $sth = null;
    $db = null;

});

// ADMIN routes
$app->group('/admin', function () use ($app, $db) {

    $app->get('/', function () use ($app) {
        if (isset($_SESSION["hasSession"]) && $_SESSION["hasSession"]) {
            $app->redirect($app->urlFor('dashboard'));
        } else {
            $app->render('admin\\admin.php', array());
        }
        $db = null;
    })->name('admin');

    $app->post('/login', function () use ($app, $db) {

        $user = $app->request->post('user');
        $pass = utf8_encode($app->request->post('pwd'));

        $sth = $db->prepare('SELECT id FROM admins where email = ? and password = ?');
        $sth->execute(array($user, md5($pass)));
        $result = $sth->fetchAll();
        if (isset($result[0])) {
            $_SESSION["hasSession"] = true;
            $_SESSION["currentUser"] = $result[0]["id"];
            $app->redirect('/admin/dashboard');
        } else {
            flash('red', "Login ou password incorrectos");
            $_SESSION["hasSession"] = false;
            $app->redirect("/admin");
        }

    })->name('login');

    $app->get('/dashboard', 'handleSession', function () use ($app, $db) {

        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        if (isset($_SESSION["currentUser"])) {
            $sth->execute(array($_SESSION["currentUser"]));
            $user = $sth->fetchAll();

            $sth = $db->prepare("select count(*) from admins union all select count(*) from team union all select count(*) from testemunhos union all select count(*) from blog union all select count(*) from mensagens where mensagens.read = 0");
            $sth->execute(array());
            $amounts = $sth->fetchAll();

            $app->render('admin\\dashboard.php', array("user" => $user[0], "amounts" => array(
                'admins' => $amounts[0][0],
                'team' => $amounts[1][0],
                'testemunhos' => $amounts[2][0],
                'blog' => $amounts[3][0],
                'mensagens' => $amounts[4][0],
            )));
            $db = null;
        }
    })->name('dashboard');

    $app->get('/homepage', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM homepage');
        $sth->execute(array());
        $hp = $sth->fetchAll();

        $app->render('admin\\homepage.php', array("user" => $user[0], "hp" => $hp[0]));
        $db = null;
    })->name('homepage');

    $app->post('/homepage', 'handleSession', function () use ($app, $db) {

        try {
            $sociedade = utf8_encode($app->request->post('sociedade'));
            $sociedade_en = utf8_encode($app->request->post('sociedade_en'));
            $filosofia = utf8_encode($app->request->post('filosofia'));
            $filosofia_en = utf8_encode($app->request->post('filosofia_en'));
            //$beliefs = utf8_encode($app->request->post('beliefs'));
            //$beliefs_en = utf8_encode($app->request->post('beliefs_en'));
            $areas = utf8_encode($app->request->post('areas'));
            $areas_en = utf8_encode($app->request->post('areas_en'));
            $pictureList = $app->request->post('pictureList');

            $sth = $db->prepare('UPDATE homepage SET pictureList = ?, sociedade = ?,sociedade_en = ?,filosofia = ?,filosofia_en = ?,areas = ?,areas_en = ?');
            $sth->execute(array($pictureList, $sociedade, $sociedade_en,$filosofia,$filosofia_en,$areas,$areas_en));

            flash('green', "Homepage alterada com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/homepage');

    })->name('homepageSave');

    $app->get('/recrutamento', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM recrutamento');
        $sth->execute(array());
        $data = $sth->fetchAll();

        $app->render('admin\\recrutamento.php', array("user" => $user[0], "data" => $data[0]));
        $db = null;
    })->name('recrutamento');

    $app->post('/recrutamento', 'handleSession', function () use ($app, $db) {

        try {
            $valor = utf8_encode($app->request->post('valor'));
            $valor_en = utf8_encode($app->request->post('valor_en'));
            $razoes = utf8_encode($app->request->post('razoes'));
            $razoes_en = utf8_encode($app->request->post('razoes_en'));

            $sth = $db->prepare('UPDATE recrutamento SET valor = ?, valor_en = ?,razoes = ?,razoes_en = ?');
            $sth->execute(array($valor, $valor_en, $razoes,$razoes_en));

            flash('green', "Recrutamento alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/recrutamento');

    })->name('recrutamentoSave');

    $app->get('/disclaimer', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM disclaimers');
        $sth->execute(array());
        $disclaimer = $sth->fetchAll();

        $app->render('admin\\disclaimer.php', array("user" => $user[0], "disclaimer" => $disclaimer[0]));
        $db = null;
    })->name('disclaimer');

    $app->post('/disclaimer', 'handleSession', function () use ($app, $db) {

        utf8_encode($app->request->post('fileToUpload'));
        try {
            $text = utf8_encode($app->request->post('text'));
            $text_en = utf8_encode($app->request->post('text_en'));

            $sth = $db->prepare('UPDATE disclaimers set text = ? ,text_en = ?');
            $sth->execute(array($text, $text_en));

            flash('green', "Disclaimer alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/disclaimer');

    })->name('disclaimerSave');

    $app->get('/team', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM team');
        $sth->execute(array());
        $team = $sth->fetchAll();


        $sth = $db->prepare('SELECT * FROM positions order by sort asc');
        $sth->execute(array());
        $positions = $sth->fetchAll();

        $app->render('admin\\team.php', array("user" => $user[0], "team" => $team, 'positions' => $positions));
        $db = null;
    })->name('team');

    $app->get('/team/edit/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM team where id = ?');
        $sth->execute(array($id));
        $member = $sth->fetchAll();

        $sth = $db->prepare('SELECT * from positions order by sort asc');
        $sth->execute(array());
        $positions = $sth->fetchAll();

        $app->render('admin\teamEdit.php', array("user" => $user[0], 'positions' => $positions, 'member' => $member[0]));
        $db = null;
    })->name('teamEdit');

    $app->post('/team/edit/:id', 'handleSession', function ($id) use ($app, $db) {

        utf8_encode($app->request->post('fileToUpload'));
        try {
            $name = utf8_encode($app->request->post('name'));
            $position = utf8_encode($app->request->post('position'));
            $description = utf8_encode($app->request->post('description'));
            $description_en = utf8_encode($app->request->post('description_en'));

            if (strlen($_FILES["fileToUpload"]["name"]) > 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "\\uploads\\";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $img_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
                $type = $_FILES["fileToUpload"]["type"];//pathinfo($_FILES["fileToUpload"]["type"], PATHINFO_EXTENSION);

                $sth = $db->prepare('UPDATE team set name = ? ,position = ? ,photo = ? ,photo_type = ? ,description = ? ,description_en = ? where id = ? ');
                $sth->execute(array($name, $position, $img_data, $type, $description, $description_en, $id));

            } else {
                $sth = $db->prepare('UPDATE team set name = ? ,position = ? ,description = ? ,description_en = ? where id = ? ');
                $sth->execute(array($name, $position, $description, $description_en, $id));
            }
            flash('green', "Membro de equipa alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/team');

    })->name('teamEditSave');

    $app->get('/team/add', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * from positions order by sort asc');
        $sth->execute(array());
        $positions = $sth->fetchAll();

        $app->render('admin\\teamAdd.php', array("user" => $user[0], 'positions' => $positions));
        $db = null;
    })->name('teamAdd');

    $app->post('/team/add', 'handleSession', function () use ($app, $db) {

        try {
            $name = utf8_encode($app->request->post('name'));
            $position = utf8_encode($app->request->post('position'));
            $description = utf8_encode($app->request->post('description'));
            $description_en = utf8_encode($app->request->post('description_en'));
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "\\uploads\\";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $tableName = 'team';

            $img_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
            $type = $_FILES["fileToUpload"]["type"];//pathinfo($_FILES["fileToUpload"]["type"], PATHINFO_EXTENSION);

            $sth = $db->prepare('INSERT INTO ' . $tableName . ' (name,position,photo,photo_type,description,description_en) VALUES (?,?,?,?,?,?)');
            $sth->execute(array($name, $position, $img_data, $type, $description,$description_en));
            flash('green', "Membro de equipa adicionado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/team');

    })->name('teamAddSave');

    $app->post('/team/delete', 'handleSession', function () use ($app, $db) {

        try {
            $member = utf8_encode($app->request->post('memberId'));

            $sth = $db->prepare('delete from team where id = ?');
            $sth->execute(array($member));

            flash('green', "Membro de equipa removido com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/team');

    })->name('teamDelete');

    $app->get('/testimonials', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM testemunhos');
        $sth->execute(array());
        $testimonials = $sth->fetchAll();

        $app->render('admin\\testemunhos.php', array("user" => $user[0], "testimonials" => $testimonials));
        $db = null;
    })->name('testimonials');

    $app->get('/testimonials/edit/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM testemunhos where id = ?');
        $sth->execute(array($id));
        $member = $sth->fetchAll();

        $sth = $db->prepare('SELECT * from positions order by sort asc');
        $sth->execute(array());
        $positions = $sth->fetchAll();

        $app->render('admin\testemunhosEdit.php', array("user" => $user[0], 'positions' => $positions, 'member' => $member[0]));
        $db = null;
    })->name('testimonialEdit');

    $app->post('/testimonials/edit/:id', 'handleSession', function ($id) use ($app, $db) {

        utf8_encode($app->request->post('fileToUpload'));
        try {
            $name = utf8_encode($app->request->post('name'));
            $position = utf8_encode($app->request->post('position'));
            $description = utf8_encode($app->request->post('description'));
            $caption = utf8_encode($app->request->post('caption'));

            if (strlen($_FILES["fileToUpload"]["name"]) > 0) {
                $target_dir = $_SERVER['DOCUMENT_ROOT'] . "\\uploads\\";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $img_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
                $type = $_FILES["fileToUpload"]["type"];//pathinfo($_FILES["fileToUpload"]["type"], PATHINFO_EXTENSION);

                $sth = $db->prepare('UPDATE testemunhos set caption = ? ,name = ? ,photo = ? ,photo_type = ? ,description = ? where id = ? ');
                $sth->execute(array($caption, $name, $img_data, $type, $description, $id));

            } else {
                $sth = $db->prepare('UPDATE testemunhos set caption = ? ,name = ? ,description = ? where id = ? ');
                $sth->execute(array($caption, $name, $description, $id));
            }
            flash('green', "Testemunho alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/testimonials');

    })->name('testimonialEditSave');

    $app->get('/testimonials/add', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * from positions order by sort asc');
        $sth->execute(array());
        $positions = $sth->fetchAll();

        $app->render('admin\\testemunhosAdd.php', array("user" => $user[0], 'positions' => $positions));
        $db = null;
    })->name('testimonialAdd');

    $app->post('/testimonials/add', 'handleSession', function () use ($app, $db) {

        try {
            $name = utf8_encode($app->request->post('name'));
            $position = utf8_encode($app->request->post('position'));
            $caption = utf8_encode($app->request->post('caption'));
            $description = utf8_encode($app->request->post('description'));
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "\\uploads\\";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $tableName = 'testemunhos';

            $img_data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
            $type = $_FILES["fileToUpload"]["type"];//pathinfo($_FILES["fileToUpload"]["type"], PATHINFO_EXTENSION);

            $sth = $db->prepare('INSERT INTO ' . $tableName . ' (name,photo,photo_type,description,caption) VALUES (?,?,?,?,?)');
            $sth->execute(array($name, $img_data, $type, $description, $caption));
            flash('green', "Testemunho adicionado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/testimonials');

    })->name('testimonialAddSave');

    $app->post('/testimonials/delete', 'handleSession', function () use ($app, $db) {

        try {
            $member = utf8_encode($app->request->post('testimonialId'));

            $sth = $db->prepare('delete from testemunhos where id = ?');
            $sth->execute(array($member));

            flash('green', "Testemunho removido com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/testimonials');

    })->name('testimonialDelete');

    $app->get('/admins', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM admins where email <> "behive@me.com"');
        $sth->execute(array());
        $administrators = $sth->fetchAll();

        $app->render('admin\admins.php', array("user" => $user[0], 'team' => $administrators));
        $db = null;
    })->name('admins');

    $app->get('/admins/edit/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($id));
        $administrators = $sth->fetchAll();

        $app->render('admin\adminsEdit.php', array("user" => $user[0], 'member' => $administrators[0]));
        $db = null;
    })->name('adminsEdit');

    $app->post('/admins/edit/:id', 'handleSession', function ($id) use ($app, $db) {

        try {
            $name = utf8_encode($app->request->post('name'));
            $email = utf8_encode($app->request->post('email'));
            $password = md5(utf8_encode($app->request->post('password')));

            if (strlen($password) > 0) {
                $sth = $db->prepare('UPDATE admins set name = ? ,email = ? ,password = ? where id = ? ');
                $sth->execute(array($name, $email, $password, $id));

            } else {
                $sth = $db->prepare('UPDATE admins set name = ? ,email = ? where id = ? ');
                $sth->execute(array($name, $email, $id));
            }
            flash('green', "Administrador alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/admins');

    })->name('adminsEditSave');

    $app->get('/admins/add', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $app->render('admin\adminsAdd.php', array("user" => $user[0]));
        $db = null;
    })->name('adminsAdd');

    $app->post('/admins/add', 'handleSession', function () use ($app, $db) {

        try {
            $name = utf8_encode($app->request->post('name'));
            $email = utf8_encode($app->request->post('email'));
            $password = md5(utf8_encode($app->request->post('password')));

            $sth = $db->prepare('INSERT INTO admins (name,email,password) VALUES (?,?,?)');
            $sth->execute(array($name, $email, $password));
            flash('green', "Administrador adicionado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/admins');

    })->name('adminsAddSave');

    $app->post('/admins/delete', 'handleSession', function () use ($app, $db) {

        try {
            $member = utf8_encode($app->request->post('memberId'));

            $sth = $db->prepare('delete from admins where id = ?');
            $sth->execute(array($member));

            flash('green', "Administrador removido com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/admins');

    })->name('adminsDelete');

    $app->get('/messages', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM mensagens order by date desc');
        $sth->execute(array());
        $messages = $sth->fetchAll();

        $app->render('admin\messages.php', array("user" => $user[0], 'messages' => $messages));
        $db = null;
    })->name('messages');

    $app->get('/messages/view/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('update mensagens set mensagens.read = 1 where id = ?');
        $sth->execute(array($id));

        $sth = $db->prepare('SELECT * FROM mensagens where id = ?');
        $sth->execute(array($id));
        $message = $sth->fetchAll();

        $app->render('admin\messagesView.php', array("user" => $user[0], 'message' => $message[0]));
        $db = null;
    })->name('messagesview');

    $app->get('/areas', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM areas_pratica');
        $sth->execute(array());
        $areas = $sth->fetchAll();

        $app->render('admin\\areas.php', array("user" => $user[0], "areas" => $areas));
        $db = null;
    })->name('areas');

    $app->get('/areas/edit/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM areas_pratica where id = ?');
        $sth->execute(array($id));
        $area = $sth->fetchAll();

        $app->render('admin\areasEdit.php', array("user" => $user[0], "area" => $area[0]));
        $db = null;
    })->name('areasEdit');

    $app->post('/areas/edit/:id', 'handleSession', function ($id) use ($app, $db) {

        try {
            $title = utf8_encode($app->request->post('title'));
            $title_en = utf8_encode($app->request->post('title_en'));

            $short_desc = utf8_encode($app->request->post('short_desc'));
            $short_desc_en = utf8_encode($app->request->post('short_desc_en'));
            $description = utf8_encode($app->request->post('description'));
            $description_en = utf8_encode($app->request->post('description_en'));


            $sth = $db->prepare('UPDATE areas_pratica set titulo = ? ,titulo_en = ? ,short_desc = ? ,short_desc_en = ? ,description = ? ,description_en = ? where id = ? ');
            $sth->execute(array($title, $title_en, $short_desc, $short_desc_en, $description, $description_en, $id));

            flash('green', "Área de Prática alterada com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/areas');

    })->name('areasEditSave');

    $app->get('/areas/add', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $app->render('admin\\areasAdd.php', array("user" => $user[0]));
        $db = null;
    })->name('areasAdd');

    $app->post('/areas/add', 'handleSession', function () use ($app, $db) {
        try {
            $title = utf8_encode($app->request->post('title'));
            $title_en = utf8_encode($app->request->post('title_en'));

            $short_desc = utf8_encode($app->request->post('short_desc'));
            $short_desc_en = utf8_encode($app->request->post('short_desc_en'));
            $description = utf8_encode($app->request->post('description'));
            $description_en = utf8_encode($app->request->post('description_en'));

            $sth = $db->prepare('insert into areas_pratica (titulo,titulo_en,short_desc,short_desc_en,description,description_en) VALUES (?,?,?,?,?,?)');
            $sth->execute(array($title, $title_en, $short_desc, $short_desc_en, $description, $description_en));

            flash('green', "Área de Prática adicionada com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/areas');

    })->name('areasAddSave');

    $app->post('/areas/delete', 'handleSession', function () use ($app, $db) {

        try {
            $area = utf8_encode($app->request->post('areaId'));

            $sth = $db->prepare('delete from areas_pratica where id = ?');
            $sth->execute(array($area));

            flash('green', "Área de Prática removida com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/areas');

    })->name('areasDelete');

    $app->get('/blog', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $sth = $db->prepare('SELECT * FROM blog order by date desc');
        $sth->execute(array());
        $blog = $sth->fetchAll();

        $app->render('admin\\blog.php', array("user" => $user[0], "blog" => $blog));
        $db = null;
    })->name('blog');

    $app->get('/blog/edit/:id', 'handleSession', function ($id) use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();


        $sth = $db->prepare('SELECT * FROM blog where id = ?');
        $sth->execute(array($id));
        $blog = $sth->fetchAll();

        $app->render('admin\blogEdit.php', array("user" => $user[0], 'blog' => $blog[0]));
        $db = null;
    })->name('blogEdit');

    $app->post('/blog/edit/:id', 'handleSession', function ($id) use ($app, $db) {

        try {
            $author = utf8_encode($app->request->post('author'));
            $title = utf8_encode($app->request->post('title'));
            $text = utf8_encode($app->request->post('text'));

            $sth = $db->prepare('UPDATE blog set author = ? ,title = ? ,text = ? where id = ? ');
            $sth->execute(array($author, $title, $text, $id));

            flash('green', "Blog post alterado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/blog');

    })->name('blogEditSave');

    $app->get('/blog/add', 'handleSession', function () use ($app, $db) {
        $sth = $db->prepare('SELECT * FROM admins where id = ?');
        $sth->execute(array($_SESSION["currentUser"]));
        $user = $sth->fetchAll();

        $app->render('admin\\blogAdd.php', array("user" => $user[0]));
        $db = null;
    })->name('blogAdd');

    $app->post('/blog/add', 'handleSession', function () use ($app, $db) {

        try {
            $author = utf8_encode($app->request->post('author'));
            $title = utf8_encode($app->request->post('title'));
            $text = utf8_encode($app->request->post('text'));

            $sth = $db->prepare('INSERT INTO blog (author,title,text,date) VALUES (?,?,?,now())');
            $sth->execute(array($author, $title, $text));
            flash('green', "Blog post adicionado com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/blog');

    })->name('blogAddSave');

    $app->post('/blog/delete', 'handleSession', function () use ($app, $db) {

        try {
            $blog = utf8_encode($app->request->post('blogId'));

            $sth = $db->prepare('delete from blog where id = ?');
            $sth->execute(array($blog));

            flash('green', "Blog post removido com sucesso");
        } catch (Exception $e) {
            flash('red', "Ocorreu um erro. Por favor tente novamente");
        }

        $app->redirect('/admin/blog');

    })->name('blogDelete');


    $app->get('/logout', function () use ($app) {
        session_unset();
        session_destroy();
        $app->redirect($app->urlFor('admin'));
    })->name('logout');

});

$app->run();
