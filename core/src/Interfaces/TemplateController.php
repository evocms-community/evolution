<?php

namespace EvolutionCMS\Interfaces;

interface TemplateController
{
    public function getView(): string;

    public function setView(string $view);

    public function addViewData(array $data);

    public function getViewData(): array;
}
