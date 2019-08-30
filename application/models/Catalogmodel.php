<?php
class Catalogmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function getBookList() {
        $qGetAll = "SELECT id, title, author, pages, genre FROM books";
        $res = $this->db->query($qGetAll);
        $booksData = $res->result_array();
        if (count($booksData) == 0) {
            return false;
        }
        return $booksData;
    }
    function getBookDetails($bookId) {
        $qGetBook = "SELECT * FROM books WHERE id=?";
        $res = $this->db->query($qGetBook, array($bookId));
        $bookData = $res->result_array();
        if (count($bookData) == 0) {
            return false;
        }
        return $bookData[0];
    }
    function getBookText($bookId) {
        if (!file_exists('resources/books/texts/'.$bookId.'.txt'))
            return NULL;
        $i = 1;
        $fileHandler = fopen('resources/books/texts/'.$bookId.'.txt', 'r');
        while (!feof($fileHandler)){
            $text[$i] = fgets($fileHandler);
            $i++;
        }
        fclose($fileHandler);
        return $text;
    }
    function setBookText($text, $bookId) {
        if (file_exists('resources/books/texts/'.$bookId.'.txt'))
            $fileHandler = fopen('resources/books/texts/'.$bookId.'.txt', 'a');
        else 
            $fileHandler = fopen('resources/books/texts/'.$bookId.'.txt', 'w');
        $result = fwrite($fileHandler, $text);
        return $result;
    }
}
?>
