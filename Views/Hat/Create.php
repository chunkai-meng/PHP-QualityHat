<br>
    <h5>Create New Hat</h5>
    <hr />
    <br>
    <form method="post" enctype="multipart/form-data" action="index.php?content_page=Hat">
    <input type="hidden" name="action" value="Create" />
    <label for="exampleFormControlSelect1">Upload Image</label>
    <div class="form-group">

        <label class="custom-file">
        <input type="file" id="file2" class="custom-file-input">
        <span class="custom-file-control"></span>
        </label>
    </div>
    <div class="form-group">

        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Hat Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" id="exampleFormControlSelect1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Supplier</label>
        <select class="form-control" id="exampleFormControlSelect1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>