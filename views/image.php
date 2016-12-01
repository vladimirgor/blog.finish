<h1>Image</h1>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="image_path" class="col-sm-2 control-label">Image path</label>
        <div class="col-sm-10 div_f">
            <input type="file"  name="image" class="form-control"
                   id="image_path" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 div_f">
            <button type="submit" class="btn btn-primary">Load</button>
        </div>
    </div>
</form>