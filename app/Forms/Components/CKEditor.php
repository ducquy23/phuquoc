<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class CKEditor extends Field
{
    protected string $view = 'forms.components.ckeditor';

    public static function make(string $name): static
    {
        return parent::make($name);
    }

    public function getView(): string
    {
        return $this->view;
    }
}
