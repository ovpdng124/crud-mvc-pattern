<?php
require_once 'model/Model.php';

class Controller
{

    public function invoke()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        if (!$action) $action = isset($_POST['action']) ? $_POST['action'] : 'index';
        switch ($action) {
            case 'index':
                $bookList = Model::showBookList();
                include "view/bookList.php";
                break;
            case 'createBook':
                include 'view/createBook.php';
                break;
            case 'addBook':
                $dataForm = Model::getDataForm();
                if (!empty($dataForm['id']) &&
                    !empty($dataForm['name']) &&
                    !empty($dataForm['author']) &&
                    !empty($dataForm['publishingYear']) &&
                    !empty($dataForm['production'])) {
                    if (Model::createBook()) {
                        $bookList = Model::showBookList();
                        include 'view/bookList.php';
                        echo "<script>alert(\"Successfully created!\")</script>";
                    }
                } else {
                    include 'view/createBook.php';
                    echo "<script>alert(\"Some fields are empty!\")</script>";
                }
                break;
            case 'editBook':
                $dataForm = Model::getDataForm();
                $bookList = Model::showBookList();
                include "view/editBook.php";
                break;
            case 'confirmModify':
                $dataForm = Model::getDataForm();
                $bookList = Model::showBookList();
                if (Model::editBook($dataForm)) {
                    include 'view/bookList.php';
                    echo "<script>alert(\"Your data has modified!\")</script>";
                } else {
                    include "view/editBook.php";
                    echo "<script>alert(\"Modification failed!\")</script>";
                }
                break;
            case 'search':
                $value = trim(preg_replace('/\s+/', ' ', filter_input(INPUT_POST, 'search')));
                $value = strtolower($value);
                $value = ucwords($value);
                $bookList = Model::searchBook($value);
                if (!empty($bookList)) {
                    include "view/bookList.php";
                } else {
                    $bookList = Model::showBookList();
                    include "view/bookList.php";
                    echo "<script>alert(\"Value '$value' does not exist!\")</script>";
                }
                break;
            case 'removeBook':
                $id = isset($_POST['id']) ? $_POST['id'] : false;
                $dataForm = Model::getDataForm();
                if ($id) {
                    Model::removeBook($dataForm['id']);
                    header("Location:index.php");
                } else {
                    echo "<script>alert(\"Couldn't find id!\")</script>";
                }
                break;
            case 'random':
                $id = Model::getRandomId();
                $dataForm = Model::getDataForm();
                include "view/createBook.php";
                break;
            case 'destroySession':
                Model::destroySession();
                $bookList = Model::showBookList();
                header("Location:index.php");
                break;
        }
    }
}