<?php
echo '<meta charset="utf-8">';
include_once 'LibraryApi.php';
$token = 'xxxxxxxxxxx'; // get your api token from api provider
$api_url = 'http://eliteraturebook.com/api'; // Eliterature Book website
$api_url = 'http://etheosophybooks.com/api'; // Etheosophy Books Book website
$api_url = 'http://ebookshia.com/api'; // EBook Shia website
$api_url = 'http://historylib.com/api'; // History Lib website
$api_url = 'http://literaturelib.com/api'; // Literature Lib website
$api = new LibraryApi($token,$api_url);

/**
 * get list of books
 *
 *  options array for change result is Optional.
 *  options Example:
 *  $OPTIONS = [
 *
 *      // The following options are available to determine the number of results:
 *      "lastId" => 1000, // last id that get in last request.
 *      "limit" => 50, // limit of result counts
 *      "page" => 2, // number of page that requested. use this option when result count grater than limit
 *
 *
 *      // The following options are for search:
 *      "title" => "TEST TITLE", // Search the term in the title.
 *      "text" => "TEST TEXT", // Search the text in the book summary.
 *      "author" => "TEST AUTHOR", // Search the term in the book authors.
 *      "subject" => "TEST SUBJECT", // Search the term in the book subjects.
 *      "tags" => "TEST TAG", // Search the term in the book tags.
 * ];
 *
 *
 * Request Response:
 *      - Status is True:
 *      [
 *          "status" => true, // Returns the request status.
 *          "allRecordsCount" => 1000, // Returns the total number of results that you have searched for.
 *          "pagesCount" => 10, // Returns the total number of pages that you have searched for with this limit.
 *          "limit" => 20, // Returns the limit that you set is.
 *          "thisPageNumber" => 1, // Returns current page number.
 *          "thisPageRecordsCount" => 20, // Returns the total number of results that there are in this page.
 *          "list" => [], // Returns the full list of search results.
 *      ]
 *
 *      - Status is False:
 *      [
 *          "status" => false, // Returns the request status.
 *          "message" => "اطلاعاتی برای دریافت موجود نیست." // Returns the failed request message.
 *      ]
 */
$options = [
//    'lastId' => 10341,
//    'page' => 3,
//    'limit' => 50,
//    'title' => 'تشیع    '
];
$list = $api->getBookList($options);

/**
 * get specific book details with book id
 * @param $id int book id
 *
 * Request Response:
 *      - Status is True:
 *      [
 *          "status" => true, // Returns the request status.
 *          "details" => // Returns the total number of results that you have searched for.
 *           [
 *              "id" => xxxx, //  Returns the book id.
 *              "title" => "BOOK TITLE", //  Returns the book title.
 *              "summary" => "BOOK SUMMARY", //  Returns the book summary.
 *              "bookLink" => "http://www.eliteraturebook.com/books/view/10341", //  Returns the view book link in destination website.
 *              "image" => "http://www.eliteraturebook.com/books/view/10341", //  Returns book's image url.
 *              "files" => [ //  Returns the book files url array.
 *                  "pdf" => "http://www.eliteraturebook.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSI6InBkZiJ9" // Returns pdf file url if exists.
 *                  "docx" => "http://www.eliteraturebook.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSAFAW@#e2r" // Returns word docx format file url if exists.
 *                  "doc" => "http://www.eliteraturebook.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSAFAW@#e2r" // Returns word doc format file url if exists.
 *               ], //  Returns book's image url.
 *              "persons" => "xxxx, yyyy", // Returns the book persons name separated with comma.
 *              "publishers" => "zzzz", // Returns the book publishers name separated with comma.
 *              "subjects" => "xxxx, yyyy, zzzz", // Returns the book subjects separated with comma.
 *              "tags" => "xxxx, yyyy, zzzz", // Returns the book tags separated with comma.
 *           ]
 *      ]
 *
 *      - Status is False:
 *      [
 *          "status" => false, // Returns the request status.
 *          "message" => "اطلاعاتی برای دریافت موجود نیست." // Returns the failed request message.
 *      ]
 *
 */
$exampleBookId=27;
$bookDetails = $api->getBookDetails($exampleBookId);