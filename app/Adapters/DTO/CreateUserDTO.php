<?php

namespace App\Adapters\DTO;

use Illuminate\Http\Request;

/**
 * Data Transfer Object for creating a user
 */
class CreateUserDTO
{
    /**
     * @param int $user_id The ID of the user
     * @param string $name The name of the user
     */
    public function __construct(
        public int $user_id,
        public string $name,
    ) {
        $this->validate();
    }

    /**
     * Create a DTO from a request
     *
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            (int) $request->input('id'),
            (string) $request->input('nome')
        );
    }

    /**
     * Validate the DTO data
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    private function validate(): void
    {
        if ($this->user_id <= 0) {
            throw new \InvalidArgumentException('User ID must be a positive integer');
        }

        if (empty($this->name)) {
            throw new \InvalidArgumentException('Name cannot be empty');
        }
    }

    /**
     * Get the user ID
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Get the user name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
        ];
    }
}
