<?php

namespace Scientometrics\Models;

use Scientometrics\Models as Models;

class Articles extends Models\BaseModel
{
    public function articlesList()
    {

    }

    public function getArticlesByUser($userid)
    {
        $articles = $this->fluent->from('articles')->select('id', 'title', 'magazine', 'country', 'year')->where('id', $userid);
    }

    public function getArticle($id)
    {

    }

    public function addArticle()
    {

    }
}