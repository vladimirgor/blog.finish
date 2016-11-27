<p><b><?=$title?></b></p>
<? if ( !$image == NULL ) :?>
<p>
   
    <img class = "art_img" src="<?=$image?>">
   
</p>
<? endif ?>
<p><?=$content?><? if ( !$date == NULL ) : ?>-<span class = "date_art"><?=$date?></span><? endif ?></p>

<p class="clear"><p>
 <? if ( $edit ) : ?>
                    <a href="/article/Edit/<?=$id?>/<?=$start?>"
                        class="btn btn-primary btn-xs" role="button">Edit</a> 
    <? endif ?>
<? if ( $add_image ) : ?>
                    <a href="/article/Image/<?=$id?>/<?=$start?>"
                        class="btn btn-primary btn-xs" role="button" >Add_image</a> 
    <? endif ?><br>                  
COMMENTS:
<ul>
    <?php
    if ( $comments != NULL )
        foreach ( $comments as $comment):?>

            <li>
                <span class = "comment_header"><?=$comment['login']?> .  <?=$comment['date']?></span>
                <br>
                <blockquote>
                   <b><i class="comment"><?=$comment['comment']?></i></b>
                </blockquote>
                <? if ( $delete_comment ) : ?>
                    <br>
                    <a href="/comment/Delete/<?=$id?>/<?=$comment['id_comment']?>/<?=$start?>"
                        class="btn btn-danger btn-xs" role="button">Delete</a>
                <? endif ?>
            </li>

        <?php endforeach?>
</ul>
<br>
<?php if ( $first_name_h === NULL ):?>
    <div class="alert alert-warning" role="alert"><b>To leave your comment login,please.</b></div>
<?php endif;?>
<a href="/article/Comment/<?=$id?>/<?=$start?>" 
    class="btn btn-primary btn-xs" role="button">Leave your comment</a>
<br>
<a href="/article/Show_all/<?=$start?>" 
    class="btn btn-success btn-xs" role="button">Back to articles list</a>