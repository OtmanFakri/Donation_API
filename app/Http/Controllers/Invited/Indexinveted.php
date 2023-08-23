<?php

namespace App\Http\Controllers\Invited;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Invitationcode\Repositories\Repository;
use Src\Invitationcode\Resources\InvetedRousource;

class Indexinveted extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request)
    {


        $user = $request->user();
        $query=Repository::showInveted($user->id);

        return response()->json(
             [
                'Code' => $user->invitation_code,
                 'data' => InvetedRousource::collection($query),
             ]
        );
    }
}
