<?php

declare(strict_types=1);

namespace AdrienBrault\Instructrice\LLM;

class Cost
{
    public function __construct(
        public readonly float $millionPromptTokensPrice,
        public readonly float $millionCompletionTokensPrice,
    ) {
    }

    public static function create(float $uniquePrice): self
    {
        return new self($uniquePrice, $uniquePrice);
    }

    public function calculate(int $promptTokens, int $completionTokens): float
    {
        return (
            $promptTokens * $this->millionPromptTokensPrice
            + $completionTokens * $this->millionCompletionTokensPrice
        ) / 1_000_000;
    }
}
