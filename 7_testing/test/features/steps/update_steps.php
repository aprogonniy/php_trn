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

$steps->When('/^I have entered update command$/', function ($world) {
    $beforeEditVal = Article::getById($world->article->id);

    $world->article->title = "Another title";
    $world->article->update();

    $afterEditVal = Article::getById($world->article->id);

    assertNotEquals($beforeEditVal->title, $afterEditVal->title);
});

$steps->And('/^I have changed some data in article$/', function($world) {
    $beforeEditVal = Article::getById($world->article->id);

    if($beforeEditVal->title === $world->article->title && $beforeEditVal->publicationDate === $world->article->publicationDate &&
        $beforeEditVal->summary === $world->article->summary && $beforeEditVal->content === $world->article->content) {
        throw new \Behat\Gherkin\Exception("Article is not changed");
    }
});

$steps->Then('/^The article should be updated in database$/', function ($world, $res) {
    $articleFromDB = Article::getById($world->article->id);

    assertNotNull($articleFromDB->id);
});

?>