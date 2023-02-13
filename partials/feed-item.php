<?php 
$actionPhrase = "'";
switch($item->type) {
    case 'text':
        $actionPhrase = 'fez um post';
    case 'photo':
        $actionPhrase = 'postou uma foto';
    break;
}
?>

<div class="box feed-item">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <a href="<?=$base;?>/perfil.php?id=<?=$item->user->id;?>"><img src="<?=$base;?>/media/avatars/<?=$item->user->id;?>" /></a>
            </div>
            <div class="feed-item-head-info">
                <a href=""><span class="fidi-name"><?=$item->user->name;?></span></a>
                <span class="fidi-action">
                    <?php $actionPhrase; ?>
                </span>
                <br/>
                <span class="fidi-date">
                    <?=date('d/m/Y', strtotime($item->created_at));?>
                </span>
            </div>
            <div class="feed-item-head-btn">
                <img src="<?=$base;?>/assets/images/more.png" />
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?=nl2br($item->body);?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?php $item->liked?'on':''?>"><?=$item->likeCount;?></div>
            <div class="msg-btn"><?= count($item->comments); ?></div>
        </div>
        <div class="feed-item-comments">
            
            <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="media/avatars/avatar.jpg" /></a>
                </div>
                <div class="fic-item-info">
                    <a href="">Bonieky Lacerda</a>
                    Comentando no meu próprio post
                </div>
            </div>

            <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href=""><img src="media/avatars/avatar.jpg" /></a>
                </div>
                <div class="fic-item-info">
                    <a href="">Bonieky Lacerda</a>
                    Muito legal, parabéns!
                </div>
            </div>

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?=$base;?>/perfil.php"><img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" /></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>

        </div>
    </div>
</div>