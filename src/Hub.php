<?php
declare(strict_types=1);

final class Hub
{
    private $rows;
    private $hubRegexValidPattern = '/^w(?!.*(bbb|wbb|bbw))([(b {1}| {1}b)]+)w$/';

    private function __construct(string $rows)
    {
        $this->ensureIsValidHubStructure($rows);
        $this->rows = $rows;
    }

    public static function fromString(string $rows): self
    {
        return new self($rows);
    }

    public function __toString(): string
    {
        return $this->rows;
    }

    private function ensureIsValidHubStructure(string $rows): void
    {
        if (!is_string($rows)) {
            throw new InvalidArgumentException(sprintf('Rows structure must be a string', $rows));
        }
        if (!(bool)preg_match($this->hubRegexValidPattern, $rows)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid structure', $rows));
        }
    }
}

Hub::fromString('wb w');
