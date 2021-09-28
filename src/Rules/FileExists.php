<?php

declare(strict_types=1);

namespace Lawyer\Rules;

use Lawyer\Types\Rule;
use Illuminate\Support\Facades\Storage;

class FileExists extends Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * The rule has two parameters:
     * 1. The disk defined in your config file.
     * 2. The directory to search within.
     *
     **/
    public function passes($attribute, $value): bool
    {
        return Storage::disk(config("filesystems.default"))->exists($value);;
    }



    /**
     * Get the validation error message.
     *
     **/
    public function message(): string
    {
        return $this->getLocalizedErrorMessage(
            'file_exists',
            'The file specified for :attribute does not exist'
        );
    }
}
