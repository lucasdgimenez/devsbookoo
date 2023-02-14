<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'config';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">
    <h1>Configurações</h1>

    <?php if(!empty($_SESSION['flash'])): ?>
        <?= $_SESSION['flash']; ?>
        <?php $_SESSION['flash'] = ''; ?>
    <?php endif; ?>

    <form action="configuracoes_action.php" enctype="multipart/form-data" class="config-form" method="post">
        <label>
            Novo Avatar: <br/>
            <input type="file" name="avatar" id=""/>

            <img class="mini" src="<?=$base?>/media/avatars/<?=$userInfo->avatar;?>" alt="">
        </label>

        <label>
            Nova Capa: <br/>
            <input type="file" name="cover" id=""/>

            <img class="mini" src="<?=$base?>/media/covers/<?=$userInfo->cover;?>" alt="">
        </label>

        <hr/>

        <label>
            Nome completo: <br/>
            <input type="text" name="name" value="<?=$userInfo->name;?>">
        </label>

        <label>
            E-mail: <br/>
            <input type="text" name="email" value="<?=$userInfo->email;?>">
        </label>

        <label>
            Data de nascimento: <br/>
            <input type="text" name="birthdate" id="birthdate" value="<?=date('d/m/Y', strtotime($userInfo->birthdate));?>">
        </label>

        <label>
            Cidade: <br/>
            <input type="text" name="city" value="<?=$userInfo->city;?>">
        </label>

        <label>
            Trabalho: <br/>
            <input type="text" name="work" value="<?=$userInfo->work;?>">
        </label>

        <label>
            Nova senha: <br/>
            <input type="password" name="password" id="">
        </label>

        <label>
            Confirmar Nova senha: <br/>
            <input type="password" name="password_confirmation" id="">
        </label>

        <button class="button">
            Salvar
        </button>

    </form>
</section>

<script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById("birthdate"),
            {mask: '00/00/0000'}
        );
</script>

<?php 
require 'partials/footer.php';
?>