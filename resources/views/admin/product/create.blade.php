 <h3>Create product</h3>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="image" class="form-control-file" id="image" placeholder="Upload image">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="1">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>


@endsection
