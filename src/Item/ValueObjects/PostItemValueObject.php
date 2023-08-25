<?php

namespace Src\Item\ValueObjects;

class PostItemValueObject
{

    public function __construct(
        public string $name,
        public string $user_id,
        public string $description,
        public string $address,
        public bool $availabilities,
        public bool $booked,
        public string $score_cost,
    )
    {
    }

    public function toarray(): array
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'address' => $this->address,
            'availabilities' => $this->availabilities,
            'booked' => $this->booked,
            'score_cost' => $this->score_cost,
        ];
    }
}
