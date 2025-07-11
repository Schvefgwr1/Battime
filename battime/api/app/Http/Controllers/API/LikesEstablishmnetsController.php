<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use Illuminate\Http\Request;

class LikesEstablishmnetsController extends Controller
{
    public function toggleLike(Request $request, $establishmentId)
    {
        $user = $request->user();
        $establishment = Establishment::find($establishmentId);

        if ($user && $establishment) {
            if ($user->likedEstablishments->contains($establishment)) {
                $user->likedEstablishments()->detach($establishment);

                return response()->json([
                    'message' => 'Disliked',
                    "count" => $establishment['likes']
                ]);
            } else {
                $user->likedEstablishments()->attach($establishment);
                return response()->json([
                    'message' => 'Liked',
                    "count" => $establishment['likes']
                ]);
            }
        }

        return response()->json(['error' => 'User or establishment not found'], 404);
    }

    public function getLikedEsatblishment(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $estabs = $user->likedEstablishments->map(function ($estab) {
                return [
                    'id' => $estab->id,
                    'name' => $estab->name
                ];
            });

            if ($estabs->isNotEmpty()) {
                return response()->json($estabs);
            }
            return response()->json([
                'message' => 'establishments not found'
            ], 203);
        }
        return response()->json([
            "error" => "user not found"
        ], 404);
    }

}
