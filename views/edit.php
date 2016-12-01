
<h1>Article</h1>

<form class="form-horizontal" method="post">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Article title</label>
        <div class="col-sm-10 div_f">
            <input type="text" autofocus required name="title" class="form-control"
                   id="title" value ="<?=$title?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10 div_f">
            <textarea required name="content" class="form-control"rows="5"
                   id="content" ><?=$content?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="image_path" class="col-sm-2 control-label">Image path</label>
        <div class="col-sm-10 div_f">
            <input type="text"  name="image_path" class="form-control"
                   id="image_path" value ="<?=$image_path?>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
