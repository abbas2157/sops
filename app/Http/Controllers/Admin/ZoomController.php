<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
class ZoomController extends Controller
{

    public function createMetting(Request $request): array
    {
        
        try {
            $postedData = $request->input();
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' .self::generateToken(),
                'Content-Type' => 'application/json',
            ])->post("https://api.zoom.us/v2/users/me/meetings", [
                'topic' => $postedData['title'],
                'type' => 2, // 2 for scheduled meeting
                'start_time' => Carbon::parse($postedData['start_time'])->toIso8601String(),
                'duration' => $postedData['meeting_duration'],
            ]);

            return $response->json();

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    protected function generateToken(): string
    {
        try {
            $base64String = base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET'));
            $accountId = env('ZOOM_ACCOUNT_ID');

            $responseToken = Http::withHeaders([
                "Content-Type"=> "application/x-www-form-urlencoded",
                "Authorization"=> "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");

            return $responseToken->json()['access_token'];

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
