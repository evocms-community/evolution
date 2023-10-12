<?php
//Helper functions for categories
//Kyle Jaebker - 08/07/06
use EvolutionCMS\Models\Category;
use EvolutionCMS\Models\SiteHtmlsnippet;
use EvolutionCMS\Models\SiteModule;
use EvolutionCMS\Models\SitePlugin;
use EvolutionCMS\Models\SiteSnippet;
use EvolutionCMS\Models\SiteTemplate;
use EvolutionCMS\Models\SiteTmplvar;

/**
 * Create a new category
 *
 * @param string $newCat
 *
 * @return int
 */
function newCategory($newCat): int
{
    return Category::query()->insertGetId(['category' => $newCat]) ?: 0;
}

/**
 * check if new category already exists
 *
 * @param string $newCat
 *
 * @return int
 */
function checkCategory($newCat = ''): int
{
    $newCatCheck = Category::query()->firstWhere('category', $newCat);

    if (!is_null($newCatCheck)) {
        return (int) $newCatCheck->id;
    }

    return 0;
}

/**
 * Check for category, create new if not exists
 *
 * @param string $category
 *
 * @return int
 */
function getCategory($category = ''): int
{
    return checkCategory($category) ?: newCategory($category);
}

/**
 * Get all categories
 *
 * @return array
 */
function getCategories(): array
{
    return Category::query()
        ->orderBy('category', 'ASC')
        ->get()
        ->map(fn(Category $category) => $category->setAttribute('category', stripslashes($category->category)))
        ->toArray();
}

/**
 * Delete category & associations
 *
 * @param int $catId
 */
function deleteCategory($catId = 0)
{
    if ($catId) {
        SiteTemplate::query()->where('category', $catId)->update(['category' => 0]);

        SiteTmplvar::query()->where('category', $catId)->update(['category' => 0]);

        SiteHtmlsnippet::query()->where('category', $catId)->update(['category' => 0]);

        SiteSnippet::query()->where('category', $catId)->update(['category' => 0]);

        SitePlugin::query()->where('category', $catId)->update(['category' => 0]);

        SiteModule::query()->where('category', $catId)->update(['category' => 0]);

        Category::query()->where('id', $catId)->delete();
    }
}
