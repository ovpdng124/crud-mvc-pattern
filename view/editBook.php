<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify Infomation Book</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Modify or Update Information</h1>
    <form action="" method="post">
        <div class="row">
            <?php foreach ($bookList as $item): ?>
                <?php if ($item->getId() == $dataForm['id']) { ?>
                    <label class="font-weight-bold col-form-label col-3">ID:</label>
                    <input type="number" class="col-7 form-control" name="id"
                           value="<?php echo $item->getId(); ?>" placeholder="ID" disabled>
                    <input type="hidden" class="col-7 form-control" name="id"
                           value="<?php echo $item->getId(); ?>" placeholder="ID">
                    <label class="font-weight-bold col-form-label col-3">Name:</label>
                    <input type="text" class="my-1 col-7 form-control" name="name"
                           value="<?php echo $item->getName(); ?>" placeholder="Name">
                    <label class="font-weight-bold col-form-label col-3">Author:</label>
                    <input type="text" class="my-1 col-7 form-control" name="author"
                           value="<?php echo $item->getAuthor(); ?>" placeholder="Author">
                    <label class="font-weight-bold col-form-label col-3">Publishing Year:</label>
                    <input type="number" class="my-1 col-7 form-control" name="publishingYear"
                           value="<?php echo $item->getPublishingYear(); ?>"
                           placeholder="Publishing Year">
                    <label class="font-weight-bold col-form-label col-3">Production:</label>
                    <input type="text" class="my-1 col-7 form-control" name="production"
                           value="<?php echo $item->getProduction(); ?>"
                           placeholder="Production">
                    <label class="font-weight-bold col-form-label col-3">Image URL:</label>
                    <input type="url" class="my-1 col-7 form-control" name="image"
                           value="<?php echo $item->getImage(); ?>"
                           placeholder="Image URL">
                    <button type="submit" class="col-2 mr-3 container my-1 btn btn-success" name="action" value="confirmModify"><b>Confirm</b>
                    <button type="submit" class="col-2 ml-3 container my-1 btn btn-danger" name="action" value="index"><b>Back</b>
                    </button>
                <?php } endforeach; ?>
        </div>
    </form>
</div>
</body>
</html>