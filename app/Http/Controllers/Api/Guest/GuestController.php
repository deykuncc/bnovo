<?php

namespace App\Http\Controllers\Api\Guest;

use App\Exceptions\Api\Guest\InvalidGuestId;
use App\Exceptions\Api\Guest\InvalidPhoneNumberException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Interfaces\Api\Guest\Services\GuestServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    private $guestService;

    public function __construct(GuestServiceInterface $guestService)
    {
        $this->guestService = $guestService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function index(Request $request)
    {
        try {
            $limit = (int)$request->input('limit', 20);
            return response()->json($this->guestService->list($limit), 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => "Не удалось получить гостей"], 500);
        }
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            return response()->json($this->guestService->store($data), 200);
        } catch (InvalidPhoneNumberException $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => "Не удалось зарегистрировать гостя"], 500);
        }
    }

    /**
     * @param UpdateRequest $request
     * @param int $guestId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, int $guestId)
    {
        try {
            $data = $request->validated();
            return response()->json($this->guestService->update($guestId, $data), 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * @param int $guestId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $guestId)
    {
        try {
            return response()->json($this->guestService->destroy($guestId), 200);
        } catch (InvalidGuestId $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => "Не удалось удалить гостя"], 500);
        }
    }

    /**
     * @param int $guestId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $guestId)
    {
        try {
            return response()->json($this->guestService->show($guestId), 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => "Не удалось получить гостя"], 500);
        }
    }
}
