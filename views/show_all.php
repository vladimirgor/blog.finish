<div class="row empty">
    <div class="col-md-4 empty"></div>
    <div class="col-md-4 empty">
        <div id="carousel" class="carousel slide div_car" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"><p class = "slide_number"></p></li>
                <?php for ($i = 1; $i < COUNT; $i++ ) { ?>
                    <li data-target="#carousel" data-slide-to="<?=$i?>"><p class = "slide_number"></p></li>
                <?}?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img class="image_crs" src="<?=$articles[0]['image_path']?>"  alt="Image">
                    <div class="carousel-caption empty">
                        <p class = "title_crs"><?=$articles[0]['title']?></p>
                    </div>
                </div>

                <?php for ($i = 1; $i < COUNT; $i++ ) { ?>
                <div class="item">
                    <img class="image_crs" src="<?=$articles[$i]['image_path']?>"  alt="Image">
                    <div class="carousel-caption empty">
                        <p class = "title_crs"><?=$articles[$i]['title']?></p>
                    </div>
                </div>
                <?}?>

            </div>
        </div>
    </div>
    <div class="col-md-4 empty"></div>
</div>
<? if ( $add ) : ?>
    <a href="/article/Add" class="btn btn-primary btn-xs" role="button">Add new article</a>
<? endif ?>
<? if ( $user ) : ?>
    <a href="/user/Show_all" class="btn btn-warning btn-xs" role="button">See users</a>
<? endif ?>
<ul>
    <?php 
    foreach ( $articles as $article):?>

        <li><b><?=$article['title']?></b>
        	<br><b>Intro:</b> <?=M_Data::articles_intro($article,100)?>
          <? if ( !$article['date'] == NULL ) : ?>-<span class ="date_art"><?=$article['date']?></span><? endif ?>
          <a href="/article/Look/<?=$article['id_article']?>/<?=$start?>" 
                  class="btn btn-success btn-xs" role="button">Look  article</a>
          <? if ( $delete ) : ?>
              <a href="/article/Delete/<?=$article['id_article']?>"
                  class="btn btn-danger btn-xs" role="button" >Delete article</a> 
          <? endif ?>     
        	<br><b>Views:</b> <?=$article['views']?>
          <br><b>Comments:</b> <?=$article['comments']?>
        </li>  

    <?endforeach?>   
</ul>
<? if ( !$all == 0 ){ ?>
<ul class = "list-inline"><p class="pages">Pages</p>
    <!--Заимствовано с ресурса http://php-zametki.ru/php-prodvinutym/104-extends-pagination.html -->  
      <? if ( $start > 1 ) { ?>

        <li><a href="/article/Show_all" 
          class="btn btn-info btn-xs" role="button"><?=START_CHAR?></a></li>
        <li><a href="/article/Show_all/<?=($start - COUNT)?>"
          class="btn btn-info btn-xs"><?=PREV_CHAR?></a></li> 

      <? } else { ?>

        <li><span><?=START_CHAR?></span></li>
        <li><span><?=PREV_CHAR?></span></li> 

      <? }
      // Собсно выводим ссылки из нужного чанка
      foreach( $allPages[$needChunk] as $pageNum => $ofset ) :
        // Делаем текущую страницу не активной:
        if( $ofset == $start  ) { ?>

            <li><span><?=$pageNum ?></span></li>

            <?continue;
        }  ?>

        <li><a href="/article/Show_all/<?=$ofset?>"
          class="btn btn-info btn-xs"><?=$pageNum ?></a></li>

      <?endforeach;
         
      // Формируем ссылки "следующая", "в конец" ------------------------------------------------
         
      if ( ($all - COUNT) >  $start) { ?>

        <li><a href="/article/Show_all/<?=( $start + COUNT)?>"
          class="btn btn-info btn-xs"><?=NEXT_CHAR?></a></li>
        <li><a href="/article/Show_all/<?=array_pop( array_pop($allPages) ) ?>"
          class="btn btn-info btn-xs"><?=END_CHAR?></a></li>

      <? } else { ?>

        <li><span><?=NEXT_CHAR?></span></li>
        <li><span><?=END_CHAR?></span></li>

     <? } ?> 
</ul>
<?} else { ?>
    <h3>There are no articles at all!</h3>
<? } ?>