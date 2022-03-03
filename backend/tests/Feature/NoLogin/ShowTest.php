<?php

namespace Tests\Feature\NoLogin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowTest extends TestCase
{

    /** @test */
    public function トップページの表示()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    /** @test */
    public function プライバシーポリシーの表示()
    {
        $response = $this->get('/privacyPolicy');
        $response->assertStatus(200);
    }
    /** @test */
    public function クレジットの表示()
    {
        $response = $this->get('/credit');
        $response->assertStatus(200);
    }
    /** @test */
    public function リリースノートの表示()
    {
        $response = $this->get('/releaseNote');
        $response->assertStatus(200);
    }
    /** @test */
    public function 利用規約の表示()
    {
        $response = $this->get('/terms');
        $response->assertStatus(200);
    }
    /** @test */
    public function このサイトについて表示()
    {
        $response = $this->get('/aboutThisSite');
        $response->assertStatus(200);
    }
    /** @test */
    public function ティーポットエラーの表示()
    {
        $response = $this->get('/teapot');
        $response->assertStatus(418);
    }
    /** @test */
    public function 無いページ404になる()
    {
        $response = $this->get('/hoge');
        $response->assertStatus(404);
    }
    /** @test */
    public function ログインしないと見れないページならログインを要求()
    {
        $response = $this->get('/calender');
        $response->assertRedirect(route('login'));
    }
}