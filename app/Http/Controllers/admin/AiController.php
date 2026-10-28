<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $apiKey = env('OPENAI_API_KEY') ?: env('OPEN_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'message' => 'API Key OpenAI belum dikonfigurasi di file .env'
            ], 422);
        }

        $prompt = "
        Buat artikel wisata profesional
        tentang destinasi berikut:

        {$request->description}

        Ketentuan:
        - Bahasa Indonesia
        - Minimal 4 paragraf
        - Gaya informatif
        - Menarik untuk wisatawan
        ";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ],
            'temperature' => 0.8
        ]);

        if ($response->failed()) {
            return response()->json([
                'message' => 'Gagal menghubungi OpenAI: ' . ($response->json('error.message') ?? 'Terjadi kesalahan')
            ], 500);
        }

        $result = $response['choices'][0]['message']['content'] ?? '';

        return response()->json([
            'result' => $result
        ]);
    }
}