<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BoostController extends AbstractController
{
    public function __construct(private HttpClientInterface $client) {}

    #[Route('/api/boost', name: 'api_boost', methods: ['POST'])]
    public function generate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $task = $data['task'] ?? null;

        if (!$task) {
            return new JsonResponse(['error' => 'Aucune tâche fournie.'], 400);
        }

        $prompt = <<<PROMPT
Tu es un générateur de motivation cosmique. Pour la tâche suivante : "{$task}", génère trois éléments absurdes et inspirants :
1. Une mini-quête épique (titre + petite narration héroïque)
2. Un compliment extraterrestre
3. Une excuse cosmique au cas où la tâche échoue

Réponds UNIQUEMENT avec un objet JSON valide, sans texte supplémentaire, sans blocs de code markdown, juste le JSON brut avec les clés suivantes :
{
  "quest": "...",
  "compliment": "...",
  "excuse": "..."
}
PROMPT;

        try {
            $apiKey = $_ENV['GEMINI_API_KEY'];

            $response = $this->client->request('POST', 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key=' . $apiKey, [
                'json' => [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.9,
                        'topK' => 1,
                        'topP' => 1,
                        'maxOutputTokens' => 2048,
                        'responseMimeType' => 'application/json'
                    ]
                ]
            ]);

            $data = $response->toArray(false);

            if (isset($data['error'])) {
                return new JsonResponse([
                    'error' => 'Erreur API: ' . ($data['error']['message'] ?? 'Inconnue')
                ], 500);
            }

            $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            if (empty($text)) {
                return new JsonResponse(['error' => 'Réponse vide de l\'API'], 500);
            }

            $text = preg_replace('/```json?\s*/', '', $text);
            $text = preg_replace('/```\s*/', '', $text);
            $text = trim($text);

            $json = json_decode($text, true);

            if (json_last_error() === JSON_ERROR_NONE && $json) {

                if (isset($json['quest']) && isset($json['compliment']) && isset($json['excuse'])) {
                    return new JsonResponse($json);
                }
            }

            if (preg_match('/\{[^}]*"quest"[^}]*"compliment"[^}]*"excuse"[^}]*\}/s', $text, $matches)) {
                $jsonString = $matches[0];
                $json = json_decode($jsonString, true);

                if (json_last_error() === JSON_ERROR_NONE && $json) {
                    return new JsonResponse($json);
                }
            }

            return new JsonResponse([
                'error' => 'Format inattendu de la réponse',
                'debug' => substr($text, 0, 500)
            ], 500);

        } catch (\Exception $e) {
            return new JsonResponse([
                'error' => 'Erreur serveur: ' . $e->getMessage()
            ], 500);
        }
    }
}
