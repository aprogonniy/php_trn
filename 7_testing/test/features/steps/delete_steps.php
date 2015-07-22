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
    $world->article->id = $world->article->insert();
});

$steps->When('/^I have entered delete command$/', function ($world) {
    $world->article->delete();
});

$steps->Then('/^The article should be deleted from database$/', function ($world, $res) {
    $articleFromDB = Article::getById($world->article->id);

    assertFalse($articleFromDB);
});

?>