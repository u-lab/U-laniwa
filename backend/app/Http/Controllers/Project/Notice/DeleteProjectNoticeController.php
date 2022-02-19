<?php

declare(strict_types=1);

namespace App\Http\Controllers\Project\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class DeleteProjectNoticeController extends Controller
{
    /**
     * プロジェクト進捗を消すコントローラー
     *
     * @return Redirector|RedirectResponse
     */
    public function __invoke(): Redirector|RedirectResponse
    {

        return redirect('/project/' . '$project_id' . '/edit');
    }
}
