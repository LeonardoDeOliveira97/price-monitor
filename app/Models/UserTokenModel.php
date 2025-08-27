<?php

namespace App\Models;

use CodeIgniter\Model;

class UserTokenModel extends Model
{
    protected $table = 'user_token';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'platform', 'token', 'created_at'];

    public function storeToken(array $data): bool
    {
        return $this->insert($data, false);
    }

    public function updateToken(array $data): bool
    {
        return $this->update($data['id'], $data);
    }

    public function deleteToken(string $id): bool
    {
        return $this->delete($id);
    }

    public function findTokenByUserId(string $userId): ?array
    {
        return $this->where('user_id', $userId)->first();
    }

    public function findTokenById(string $id): ?array
    {
        return $this->where('id', $id)->first();
    }
}
