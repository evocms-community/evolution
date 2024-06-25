<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\ControllerInterface;
use EvolutionCMS\Interfaces\ManagerThemeInterface;
use Illuminate\Support\Facades\View;

abstract class AbstractController implements ControllerInterface
{
    /**
     * @var string
     */
    protected string $view;

    /**
     * @var ManagerThemeInterface|null
     */
    protected ?ManagerThemeInterface $managerTheme;

    /** @var int */
    protected int $index;

    protected $parameters = [];

    protected $data = [];

    /**
     * {@inheritdoc}
     */
    public function __construct(ManagerThemeInterface $managerTheme = null, array $data = [])
    {
        $this->managerTheme = $managerTheme;
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getView(): ?string
    {
        return $this->view;
    }

    /**
     * {@inheritdoc}
     */
    public function setView($view) : bool
    {
        if (View::exists(ManagerTheme::getViewName($view))) {
            $this->view = $view;
        }
        return $view === $this->getView();
    }

    /**
     * {@inheritdoc}
     */
    abstract public function canView(): bool;

    /**
     * {@inheritdoc}
     */
    public function checkLocked(): bool
    {
        return isset($this->elementType) && !empty(evo()->elementIsLocked($this->elementType, $this->getElementId()));
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(array $params = []): array
    {
        return array_merge($this->parameters, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function process() : bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function render(array $params = []): string
    {
        return ManagerTheme::view(
            $this->getView(),
            $this->getParameters($params)
        )->with([
            'controller' => $this
        ])->render();
    }

    /**
     * {@inheritdoc}
     */
    public function setIndex($index): void
    {
        $this->index = $index;
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex()
    {
        return $this->index;
    }

    public function getElementType()
    {
        return $this->elementType ?? 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getElementId(): int
    {
        return (int)get_by_key($_REQUEST, 'id', 0, 'is_scalar');
    }
}
