<?php


namespace App;
use Elasticquent\ElasticquentTrait;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ElasticquentTrait;

    protected $fillable = ['title', 'body', 'tags'];

    protected $mappingProperties = array(
    	'index' => 'articles',
        'type' => 'article',
        'title' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'body' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'tags' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
      );
}