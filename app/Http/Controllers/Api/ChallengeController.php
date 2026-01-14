<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use App\Models\Challenge;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    // GET /api/challenges
    public function index(Request $request): JsonResponse
    {
        // optional filters: difficulty, isActive
        $query = Challenge::query();

        if ($request->has('difficulty')) {
            $query->where('difficulty', $request->query('difficulty'));
        }

        if ($request->has('isActive')) {
            $isActive = filter_var($request->query('isActive'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if (!is_null($isActive)) {
                $query->where('is_active', $isActive);
            }
        }

        $challenges = $query->orderBy('start_date', 'desc')->get();

        return response()->json(array_map([$this, 'transform'], $challenges->toArray()));
    }

    // GET /api/challenges/{id}
    public function show(int $id): JsonResponse
    {
        $challenge = Challenge::findOrFail($id);

        return response()->json($this->transform($challenge->toArray()));
    }

    // POST /api/challenges
    public function store(StoreChallengeRequest $request): JsonResponse
    {
        $data = $this->mapRequestToDb($request->validated());

        $challenge = Challenge::create($data);

        return response()->json($this->transform($challenge->toArray()), 201);
    }

    // PATCH /api/challenges/{id}
    public function update(UpdateChallengeRequest $request, int $id): JsonResponse
    {
        $challenge = Challenge::findOrFail($id);

        $data = $this->mapRequestToDb($request->validated());

        $challenge->update($data);

        return response()->json($this->transform($challenge->refresh()->toArray()));
    }

    // DELETE /api/challenges/{id}
    public function destroy(int $id): JsonResponse
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->delete();

        return response()->json(null, 204);
    }

    // Helper: map DB snake_case <-> API camelCase fields
    private function mapRequestToDb(array $input): array
    {
        $map = [
            'rewardPoints' => 'reward_points',
            'startDate' => 'start_date',
            'endDate' => 'end_date',
            'isActive' => 'is_active',
        ];

        $out = [];
        foreach ($input as $k => $v) {
            $out[$map[$k] ?? $k] = $v;
        }

        return $out;
    }

    private function transform(array $dbRow): array
    {
        return [
            'id' => (int) $dbRow['id'],
            'title' => $dbRow['title'],
            'category' => $dbRow['category'],
            'difficulty' => $dbRow['difficulty'],
            'rewardPoints' => (int) $dbRow['reward_points'],
            'startDate' => $dbRow['start_date'],
            'endDate' => $dbRow['end_date'],
            'isActive' => (bool) $dbRow['is_active'],
            'description' => $dbRow['description'],
            'createdAt' => $dbRow['created_at'] ?? null,
            'updatedAt' => $dbRow['updated_at'] ?? null,
        ];
    }
}
