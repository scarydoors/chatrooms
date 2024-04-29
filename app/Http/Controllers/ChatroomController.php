<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChatroomResource;
use App\Repositories\ChatroomRepositoryInterface;
use Illuminate\Http\Request;

class ChatroomController extends Controller
{
    public function __construct(
        protected ChatroomRepositoryInterface $chatroomRepository
    ) {}

    public function index()
    {
        return ChatroomResource::collection($this->chatroomRepository->all());
    }

    public function store(Request $request)
    {
        return new ChatroomResource($this->chatroomRepository->create($request->toArray()));
    }
}
