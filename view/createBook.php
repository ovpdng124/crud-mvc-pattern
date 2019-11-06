<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Book</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Create a new book information</h1>
    <form action="" method="post">
        <div class="row">
            <label class="font-weight-bold col-form-label col-2">ID: </label>
            <input type="number" class="col-7 form-control" name="id" value="<?php if (!empty($id)) echo $id; ?>"
                   placeholder="ID">
            <button type="submit" class="col-2 ml-5 btn-secondary container form-control" name="action" value="random"
                    placeholder="ID"><b>Random ID</b></button>
            <label class="font-weight-bold col-form-label col-2">Name: </label>
            <input type="text" class="my-1 col-10 form-control" name="name"
                   value="<?php if (!empty($dataForm)) echo $dataForm['name']; ?>" placeholder="Name">
            <label class="font-weight-bold col-form-label col-2">Author: </label>
            <input type="text" class="my-1 col-10 form-control" name="author"
                   value="<?php if (!empty($dataForm)) echo $dataForm['author']; ?>" placeholder="Author">
            <label class="font-weight-bold col-form-label col-2">Publishing Year: </label>
            <input type="number" class="my-1 col-10 form-control" name="publishingYear"
                   value="<?php if (!empty($dataForm)) echo $dataForm['publishingYear'];; ?>"
                   placeholder="Publishing Year">
            <label class="font-weight-bold col-form-label col-2">Production: </label>
            <input type="text" class="my-1 col-10 form-control" name="production"
                   value="<?php if (!empty($dataForm)) echo $dataForm['production'];; ?>" placeholder="Production">
            <label class="font-weight-bold col-form-label col-2">Image URL: </label>
            <input type="url" class="my-1 col-10 form-control" name="image"
                   value="<?php if (!empty($dataForm)) echo $dataForm['image'];; ?>" placeholder="Image URL">
            <button type="submit" class="col-2 mr-3 container my-1 btn btn-primary" name="action" value="addBook"><b>Add
                    new book</b></button>
            <button type="submit" class="col-2 ml-3 container my-1 btn btn-danger" name="action" value="index">
                <b>Back</b>

        </div>
    </form>
</div>
</body>
</html>