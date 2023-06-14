<?php

declare(strict_types=1);

namespace App\Infrastructure\Type;

use App\Domain\Model\UUID;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\GuidType;
use Throwable;

final class UuidType extends GuidType
{
    public const NAME = 'uuid';

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {

        if ($value === null || $value === '') {
            return null;
        }

        if ($value instanceof UUID) {
            return $value->getUuid();
        }

        throw ConversionException::conversionFailed($value, self::NAME);
    }

    /**
     * {@inheritdoc}
     *
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?UUID
    {
        if ($value instanceof UUID) {
            return $value;
        }

        if (!is_string($value) || $value === '') {
            return null;
        }

        try {
            $uuid = new UUID($value);
        } catch (Throwable $e) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return $uuid;
    }

    /**
     * @return string[]
     */
    public function getMappedDatabaseTypes(AbstractPlatform $platform): array
    {
        return [self::NAME];
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
