<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('catalogmodel');
    }

    public function main() {
        $pageData['books'] = $this->catalogmodel->getBookList();
        if ($pageData['books'] == false) {
            $this->notFound('Похоже, все книги куда-то пропали.');
            return;
        }

        $pageData['tabTitle'] = 'Каталог книг - главная'; // Capitalize the first letter
        $this->render('main', $pageData);
    }
    
    public function edit($bookid) {
        $pageData['bookdetails'] = $this->catalogmodel->getBookDetails($bookid);
        if ($pageData['bookdetails'] == false) {
            $this->notFound('К сожалению, мы не нашли такой книги.');
            return;
        }
        $pageData['tabTitle'] = $pageData['bookdetails']['title'].' - '.$pageData['bookdetails']['author'];
        $this->render('edit', $pageData);
    }
    
    public function read($bookid) {
        $pageData['bookdetails'] = $this->catalogmodel->getBookDetails($bookid);
        if ($pageData['bookdetails'] == false) {
            $this->notFound('К сожалению, мы не нашли такой книги.');
            return;
        }
        $pageData['text'] = $this->catalogmodel->getBookText($bookid);
        if ($pageData['text'] == NULL) {
            $this->notFound('К сожалению, текст книги пропал.');
            return;
        }
        $pageData['tabTitle'] = $pageData['bookdetails']['title'].' - '.$pageData['bookdetails']['author'];
        $this->render('read', $pageData);
    }

    public function overview($bookid) {
        $pageData['bookdetails'] = $this->catalogmodel->getBookDetails($bookid);
        if ($pageData['bookdetails'] == false) {
            $this->notFound('К сожалению, мы не нашли такой книги.');
            return;
        }
        $pageData['tabTitle'] = $pageData['bookdetails']['title'].' - '.$pageData['bookdetails']['author'];
        $this->render('overview', $pageData);
    }

    public function notFound($errDesc = '404') {
        $pageData['tabTitle'] = 'Что-то не так';
        if ($errDesc == '404') $errDesc = 'К сожалению, такой страницы не существует.';
        $pageData['title'] = $errDesc;
        $this->render('notfound', $pageData);
    }

    public function publishText($bookId) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newchapter = $_POST['newchapter'];
            $result = $this->catalogmodel->setBookText($newchapter, $bookId);
            if ($result == false) $this->notFound('Ошибка записи.');
            $this->overview($bookId);
        }
    }

    public function render($page, $pageData) {
        $this->load->view('header', $pageData);
        $this->load->view('pages/'.$page, $pageData);
        $this->load->view('footer');
    }
}