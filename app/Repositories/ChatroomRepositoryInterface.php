<?php

namespace App\Repositories;

use App\Models\Chatroom;
use Illuminate\Database\Eloquent\Collection;

interface ChatroomRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Chatroom;

    public function update(int $id, array $data): Chatroom;

    public function delete(int $id): bool;

    public function find(int $id): Chatroom;
}
