<?php
// +----------------------------------------------------------------------
// | 用于请求接口的单元测试基类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpTestCase
 * @package Tests
 * @method ResponseInterface get(string | UriInterface $uri, array $options = [])
 * @method ResponseInterface head(string | UriInterface $uri, array $options = [])
 * @method ResponseInterface put(string | UriInterface $uri, array $options = [])
 * @method ResponseInterface post(string | UriInterface $uri, array $options = [])
 * @method ResponseInterface patch(string | UriInterface $uri, array $options = [])
 * @method ResponseInterface delete(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface getAsync(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface headAsync(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface putAsync(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface postAsync(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface patchAsync(string | UriInterface $uri, array $options = [])
 * @method Promise\PromiseInterface deleteAsync(string | UriInterface $uri, array $options = [])
 */
abstract class HttpTestCase extends UnitTestCase
{
    public $client;

    protected function setUp()
    {
        parent::setUp();
        $this->client = new Client([
            'base_uri' => env('PHPUNIT_URL')
        ]);
    }

    protected function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function __call($name, $arguments)
    {
        if (env('PHPUNIT_ENGINE') === 'php') {
            $arguments[0] = '?_url=' . $arguments[0];
        }
        $res = $this->client->$name(...$arguments);
        return $res;
    }
}
