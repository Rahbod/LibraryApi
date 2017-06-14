# LibraryApi

## A Simple Example
create new object from api class

```php
<?php

include_once 'LibraryApi.php';
$api = new LibraryApi();
?>
```

get list of books with optional parameters	
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
 *      "subject" => "TEST SUBJECT", // Search the term in the book subjects.
 *      "tags" => "TEST TAG", // Search the term in the book tags.
 * ];
```

```php
<?php

// get list
$options = [
//    'lastId' => 10341,
//    'page' => 3,
//    'limit' => 50,
    'title' => 'ÞáæÈ'
];
$list = $api->getBookList($options);
?>
```
$exampleBookId=108;
$bookDetails = $api->getBookDetails($exampleBookId);
?>
```
