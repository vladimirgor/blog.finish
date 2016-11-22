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
    foreach ( $comments as $comment):?>

        <li class="comment">
        	<u><?=$comment['login']?> .  <?=$comment['date']?></u>
        	<br>
            <blockquote>
        	   <b><i><?=$comment['comment']?></i></b> 
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
<a href="/article/Comment/<?=$id?>/<?=$start?>" 
    class="btn btn-primary btn-xs" role="button">Leave your comment</a>
<br>
<a href="/article/Show_all/<?=$start?>" 
    class="btn btn-success btn-xs" role="button">Back to articles list</a>