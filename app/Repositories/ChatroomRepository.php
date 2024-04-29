<?php

namespace App\Repositories;

use App\Models\Chatroom;
use Illuminate\Database\Eloquent\Collection;

class ChatroomRepository implements ChatroomRepositoryInterface {
    public function all(): Collection {
        return Chatroom::all();
    }

    public function create(array $data): Chatroom {
        $chatroom = Chatroom::create($data);
        return $chatroom;
    }

    public function update(int $id, array $data): Chatroom {
        $chatroom = Chatroom::findOrFail($id);
        $chatroom->fill($data);
        $chatroom->save();

        return $chatroom;
    }

    public function delete(int $id): bool {
        $chatroom = Chatroom::find($id);
        if ($chatroom) {
            $chatroom->delete();
        }
        return false;
    }

    public function find(int $id): Chatroom {
        $chatroom = Chatroom::findOrFail($id);
        return $chatroom;
    }
}
