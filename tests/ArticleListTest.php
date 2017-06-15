<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Article;

/**
 * 記事リストAPIのテスト
 *
 * @return void
 */
class ArticleListTest extends TestCase
{
    /**
     * パラメータでpageを指定しない場合1~15件目までが返ること
     *
     * @return void
     */
    public function testArticleListApiPage1()
    {
        // 最初の15件の記事を取得
        $expect = Article::paginate(15)->toArray();
        
        $res = $this->get('/news-list')->response->getContent();
        $resArray = json_decode($res, true);

        // 記事データが期待通りであること
        $this->assertEquals($expect["data"], $resArray["data"]);
        // 現在1ページ目であること
        $this->assertEquals(1, $resArray["current_page"]);
        // 1ページあたり15件であること
        $this->assertEquals(15, count($resArray["data"]));
    }
    
    /**
     * パラメータでpageに2を指定した場合16~30件目までが返ること
     *
     * @return void
     */
    public function testArticleListApiPage2()
    {
        // 16件目から30件目の記事を取得
        $expect = Article::paginate(15, ['*'], 'page', 2)->toArray();

        $res = $this->get('/news-list?page=2')->response->getContent();
        $resArray = json_decode($res, true);

        // 記事データが期待通りであること
        $this->assertEquals($expect["data"], $resArray["data"]);
        // 現在2ページ目であること
        $this->assertEquals(2, $resArray["current_page"]);
        // 1ページあたり15件であること
        $this->assertEquals(15, count($resArray["data"]));
    }
}
