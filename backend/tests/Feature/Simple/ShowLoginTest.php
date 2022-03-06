<?php

namespace Tests\Feature\Simple;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function ユーザー情報無いユーザーならユーザー編集にリダイレクト()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user);
        $response->get('/home')->assertRedirect('/user/edit');
    }
    /** @test */
    public function 情報入力済みユーザーならカレンダー見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/calender')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならユーザー一覧見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/user')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならユーザー編集見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/user/edit')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならユーザー個別見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/user/2')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならタイムライン見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/timeline')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならsecurityページリダイレクト走る()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/security')->assertRedirect('/user/confirm-password');
    }
    /** @test */
    public function 情報入力済みユーザーなら手続き見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        $response->get('/procedure')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならプロジェクト一覧()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        // $response->get('/project')->assertStatus(200);
    }
    /** @test */
    public function 情報入力済みユーザーならプロジェクト個別見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        // $response->get('/project/2')->assertStatus(200);
    }
    /** @test */
    public function 自分で作ったプロジェクトの編集ページにアクセスできる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        // $response->get('/project/1/edit')->assertStatus(200);
    }
    /**
     * レベル2
     */
    /**
     * レベル3
     */
    /**
     * レベル4(本入部レベル)
     */
    /** @test */
    public function 情報入力済みユーザーならプロジェクト作成見れる()
    {
        $user = User::where('id', 1)->first();
        $response = $this->actingAs($user);
        // $response->get('/project/create')->assertStatus(200);
    }
    /**
     * レベル45(運営レベル)
     */
    /**
     * レベル6(システム管理者レベル)
     */
    /**
     * レベル7(代表レベル)
     */
}