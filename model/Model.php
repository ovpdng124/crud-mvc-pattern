<?php
require_once 'model/Book.php';

class Model
{
    public static function getBookDB()
    {
        return isset($_SESSION['books']) ? $_SESSION['books'] : array();
    }

    public static function getDataForm()
    {
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $author = filter_input(INPUT_POST, 'author');
        $publishingYear = filter_input(INPUT_POST, 'publishingYear');
        $production = filter_input(INPUT_POST, 'production');
        $image = filter_input(INPUT_POST, 'image');
        $name = trim(preg_replace('/\s+/', ' ', $name));
        $author = trim(preg_replace('/\s+/', ' ', $author));
        $production = trim(preg_replace('/\s+/', ' ', $production));
        $image = trim(preg_replace('/\s+/', ' ', $image));
        $name = strtolower($name);
        $author = strtolower($author);
        $production = strtolower($production);
        $name = ucwords($name);
        $author = ucwords($author);
        $production = ucwords($production);
        $dataForm = array(
            'id' => $id,
            'name' => $name,
            'author' => $author,
            'publishingYear' => $publishingYear,
            'production' => $production,
            'image' => $image
        );
        return $dataForm;
    }

    public static function getRandomId()
    {
        $bookDB = self::showBookList();
        do {
            $bool = false;
            $id = rand(100, 999);
            foreach ($bookDB as $item) {
                if ($item->getId() == $id) {
                    $bool = true;
                    break;
                }
            }
        } while ($bool);
        return $id;
    }

    public static function createBook()
    {
        $bookDB = self::getBookDB();
        $dataForm = self::getDataForm();
        $check = '';
        foreach ($bookDB as $item) {
            if ($item->getName() == $dataForm['name'] && $item->getAuthor() == $dataForm['author'] && $item->getPublishingYear() == $dataForm['publishingYear']) {
                $check = 'book existed';
            } elseif ($item->getId() == $dataForm['id']) {
                $check = 'id existed';
            }
        }
        if ($check == 'book existed') {
            include 'view/createBook.php';
            echo "<script>alert(\"This book is already on the list!\")</script>";
            return false;
        } elseif ($check == 'id existed') {
            include 'view/createBook.php';
            echo "<script>alert(\"This ID already exists!\")</script>";
            return false;
        } else {
            $new_Book = new Book($dataForm['id'], $dataForm['name'], $dataForm['author'], $dataForm['publishingYear'], $dataForm['production'], $dataForm['image']);
            $bookDB[] = $new_Book;
            $_SESSION['books'] = $bookDB;
            return true;
        }
    }

    public static function showBookList()
    {
        $bookDB = self::getBookDB();
        $bookList = array();
        foreach ($bookDB as $item) {
            $bookList[] = $item;
        }
        return $bookList;

    }

    public static function editBook($dataForm)
    {
        $bookDB = self::showBookList();
        foreach ($bookDB as $item) {
            if ($item->getId() == $dataForm['id']) {
                $item->setId($dataForm['id']);
                $item->setName($dataForm['name']);
                $item->setAuthor($dataForm['author']);
                $item->setPublishingYear($dataForm['publishingYear']);
                $item->setProduction($dataForm['production']);
                $item->setImage($dataForm['image']);
                return true;
            }
        }
        return false;
    }

    public static function searchBook($value)
    {
        $bookDB = self::showBookList();
        $resultSearch = array();
        foreach ($bookDB as $item) {
            if ($item->getId() == $value) {
                $resultSearch[] = $item;
            }
            if ($item->getName() == $value) {
                $resultSearch[] = $item;
            }
            if ($item->getAuthor() == $value) {
                $resultSearch[] = $item;
            }
            if ($item->getPublishingYear() == $value) {
                $resultSearch[] = $item;
            }
            if ($item->getProduction() == $value) {
                $resultSearch[] = $item;
            }
        }
        return $resultSearch;
    }

    public static function removeBook($id)
    {
        $bookDB = self::showBookList();
        foreach ($bookDB as $key => $item) {
            if ($item->getId() == $id) {
                unset($bookDB[$key]);
                break;
            }
        }
        $_SESSION['books'] = $bookDB;
    }

    public static function destroySession()
    {
        session_destroy();
    }


}