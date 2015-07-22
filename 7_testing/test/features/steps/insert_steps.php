<?php

$steps->Given('/^I have an article$/', function ($world) {
    $actualData = array(
        "id" => null,
        "publicationDate" => 1437517160937,
        "title" => "Article title",
        "summary" => "Short article summary",
        "content" => "Full article content"
    );

    $world->article = new Article($actualData);
});

$steps->When('/^I have entered insert command$/', function ($world) {
    $world->article->id = $world->article->insert();
});

$steps->Then('/^The article should be added to database$/', function ($world, $res) {
    $articleFromDB = Article::getById($world->article->id);

    assertInstanceOf("Article", $articleFromDB);
});

?>