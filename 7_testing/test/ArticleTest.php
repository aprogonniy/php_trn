<?php

include_once("../src/config.php");
include_once("../src/classes/Article.php");

class ArticleTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorEmpty()
    {
        $actualData = array();

        // test that param array is empty
        $this->assertCount(0, $actualData);

        $article = new Article($actualData);

        // object type check
        $this->assertInstanceOf("Article", $article);

        // check that field values are empty
        $this->assertNull($article->id);

        return $article;
    }

    public function testConstructorParameters()
    {
        $actualData = array(
            "id" => 1,
            "publicationDate" => 1437517160937,
            "title" => "Article title",
            "summary" => "Short article summary",
            "content" => "Full article content"
        );

        $article = new Article($actualData);

        // object type check
        $this->assertInstanceOf("Article", $article);

        // check that field values are not empty
        $this->assertNotNull($article->id);

        $articleCopy = $article;
        // object fields check
        $this->assertSame($articleCopy, $article);

        // check that class has id attribute
        $this->assertClassHasAttribute("id", "Article");

        return $article;
    }

    /**
     * @depends testConstructorParameters
     */
    public function testClassAttributes(Article $article)
    {
        $this->assertObjectHasAttribute("id", $article);
        $this->assertObjectHasAttribute("publicationDate", $article);
        $this->assertObjectHasAttribute("title", $article);
        $this->assertObjectHasAttribute("summary", $article);
        $this->assertObjectHasAttribute("content", $article);
        $this->assertObjectNotHasAttribute("ololo", $article);
    }

    /**
     * @depends testConstructorParameters
     */
    public function testInsert(Article $article)
    {
        // insert article to db
        $article->id = null;
        $article->id = $article->insert();
        $returnedVal = Article::getById($article->id);

        // test inserting
        $this->assertEquals($article->title, $returnedVal->title);
    }

    /**
     * @depends testConstructorParameters
     */
    public function testUpdate(Article $article)
    {
        $beforeEditVal = Article::getById($article->id);

        // check that fields equal before update
        $this->assertSame($article->title, $beforeEditVal->title);

        // update article in db
        $article->title = "Another title";
        $article->update();
        $afterEditVal = Article::getById($article->id);

        // test updating
        $this->assertNotSame($article->title, $afterEditVal->title);
    }

    /**
     * @depends testConstructorParameters
     */
    public function testDelete(Article $article)
    {
        $returnedVal = Article::getById($article->id);

        // delete  from db
        if ($returnedVal !== false) {
            $article->delete();
        }

        $returnedVal = Article::getById($article->id);
        $this->assertFalse($returnedVal);
    }


    /**
     * @depends testConstructorParameters
     * @afterClass
     */
    public function cleanUp(Article $article)
    {
        $returnedVal = Article::getById($article->id);

        if ($returnedVal !== false) {
            $article->delete();
        }
    }
}
