# LibraryApi

## A Simple Example
create new object from api class

```php
<?php
include_once 'LibraryApi.php';

$token = "xxxxxxxxxxxxxxxxxxxxxx"; // get your token from api provider
$api = new LibraryApi($token);

// For EbookShia website api should use following code
$api = new LibraryApi($token, true);
?>
```
### Get List
Get list of books with optional parameters:

```sh
 * $OPTIONS = [
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
 *      "publisher" => "TEST PUBLISHER", // Search the term in the book publishers. ## ONLY Valid on historylib.com and literaturelib.com domians
 *      "subject" => "TEST SUBJECT", // Search the term in the book subjects. ## NOT Valid on historylib.com and literaturelib.com domians
 *      "tags" => "TEST TAG", // Search the term in the book tags.
 * ];
```

Send Request:

```php
<?php
$options = [
    'page' => 3,
    'limit' => 10,
    'title' => 'قلوب'
];
$list = $api->getBookList($options);
?>
```

Get response:
```sh
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
```
### Get Specific Book Details
Send request to api with book id parameter.
```php
<?php
$bookDetails = $api->getBookDetails($bookId);
?>
```

Get Response:

```sh
 * Request Response:
 *      - Status is True:
 *      [
 *          "status" => true, // Returns the request status.
 *          "details" => // Returns the total number of results that you have searched for.
 *           [
 *              "id" => xxxx, //  Returns the book id.
 *              "title" => "BOOK TITLE", //  Returns the book title.
 *              "summary" => "BOOK SUMMARY", //  Returns the book summary.
 *              "bookLink" => "http://www.xxxx.com/books/view/10341", //  Returns the view book link in destination website.
 *              "small_image" => "http://www.xxxx.com/books/upload/books/thumbnails_162x244/5945dd891ba7b.jpg", //  Returns book's small image url.
 *              "image" => "http://www.xxxx.com/upload/books/thumbnails_266x400/5945dd891ba7b.jpg", //  Returns book's image url.
 *              "files" => [ //  Returns the book files url array.
 *                  "pdf" => "http://www.xxxx.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSI6InBkZiJ9" // Returns pdf file url if exists.
 *                  "docx" => "http://www.xxxx.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSAFAW@#e2r" // Returns word docx format file url if exists.
 *                  "doc" => "http://www.xxxx.com/books/download/?hash=eyJpZCI6IjEwMzQxIiwidHlwZSAFAW@#e2r" // Returns word doc format file url if exists.
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
```
