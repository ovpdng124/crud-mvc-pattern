<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books list</title>
    <link rel="stylesheet" href="view/bootstrap4/css/bootstrap.min.css">
    <script src="view/bootstrap4/js/bootstrap.min.js"></script>
    <link href="view/bootstrap4/css/all.css" rel="stylesheet">
    <script src="view/bootstrap4/js/all.js"></script>
</head>
<script>
    function confirmDestroy() {
        var confirm = window.confirm('WARNING!!!\nThis action will erase all your data! Are you sure?');
        if (confirm){
            return window.location.href="?action=destroySession";
        }
    }
</script>
<body>
<div class="container">
    <form action="" method="post">
        <input type="text" class="float-left col-3 my-2 form-control" name="search" placeholder='Search'>
        <button class="btn btn-secondary mx-2 mx-md-1 mx-sm-0 my-2 float-left" type="submit" name="action" value="search"><i class="fas fa-search"></i></button>
        <button class="btn btn-primary mx-5 mx-md-3 mx-sm-0 my-2 col-2 container" type="submit" name="action" value="index"><strong>Show all list</strong></button>
        <button class="container col-2 btn btn-success mx-2 mx-md-1 mx-sm-0" type="submit" name="action" value="createBook"><strong>Create new book</strong></button>
        <button class="btn btn-danger mx-2 mx-md-1 mx-sm-0 my-2 float-right" type="button" onclick="confirmDestroy();"><strong>Destroy all</strong></button>
    </form>
</div>

<div class="container">
    <table class="table table-striped">
        <thead class="text-center thead-light">
        <tr>
            <th class="border">#</th>
            <th>ID</th>
            <th>IMAGE</th>
            <th>NAME</th>
            <th>AUTHOR</th>
            <th>YEAR</th>
            <th>PRODUCTION</th>
            <th>EDIT</th>
            <th>REMOVE</th>
        </tr>

        </thead>
        <tbody align="center">
        <?php $count = 1;
        foreach ($bookList as $item):?>
            <tr>
                <td class="border"><h4><?php echo $count++; ?></h4></td>
                <td ><h4><?php echo $item->getId(); ?></h4></td>
                <td><img src="<?php echo $item->getImage(); ?>" alt="" height="200" width="150"></td>
                <td><h4><?php echo $item->getName(); ?></h4></td>
                <td><h4><?php echo $item->getAuthor(); ?></h4></td>
                <td><h4><?php echo $item->getPublishingYear(); ?></h4></td>
                <td><h4><?php echo $item->getProduction(); ?></h4></td>
                <form action="" method="post">
                    <td><input type="hidden" name="id" value="<?php echo $item->getId(); ?>">
                        <button type="submit" class="btn btn-success" name="action" value="editBook"><i class="fas fa-pencil-alt"></i>
                        </button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger" name="action" value="removeBook"><i class="fas fa-trash"></i>
                        </button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method="post">
        <div class="row">
            <button class="container col-5 mb-5 btn btn-success" type="submit" name="action" value="createBook"><strong>Create new book</strong>
            </button>
        </div>
    </form>
</div>
</body>
</html>
