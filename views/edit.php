<form method="POST">
    Article title:
    <br>
    <input type="text" required name="title" value="<?=$title?>"/>
    <br>
    Content:
    <br>
    <textarea name="content" required ><?=$content?></textarea>
    <br>
    <input type="submit" class="btn btn-primary" value="Save" >
</form>