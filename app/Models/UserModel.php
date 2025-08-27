<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'created_at', 'updated_at'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }
        return $data;
    }

    public function findAllUsers(): array
    {
        return $this->select('id, email, name, created_at, updated_at')->findAll();
    }

    public function storeUser(array $data): bool
    {
        return $this->insert($data, false);
    }

    public function updateUser(array $data): bool
    {
        return $this->update($data['id'], $data);
    }

    public function deleteUser(string $id): bool
    {
        return $this->delete($id);
    }

    public function findUserByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function findUserById(string $id): ?array
    {
        return $this->where('id', $id)->first();
    }
}
