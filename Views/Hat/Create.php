<br>
    <h5>Create New Hat</h5>
    <hr />
    <br>
    <form method="post" enctype="multipart/form-data" action="index.php?content_page=Hat">
    <input type="hidden" name="action" value="Create" />
    <label for="exampleFormControlSelect1">Upload Image</label>
    <div class="form-group">
        <label class="custom-file">
        <input type="file" accept="image/jpeg" name="file" class="custom-file-input">
        <span class="custom-file-control"></span>
        </label>
    </div>
    <div class="form-group">

        <input type="text" class="form-control" name="name" placeholder="Hat Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="desc" placeholder="Description">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="price" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" name="category">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Supplier</label>
        <select class="form-control" name="supplier">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
