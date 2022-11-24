<?php

namespace EvolutionCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void build()
 * @method static array getAliases()
 * @method static array getIsFolders()
 * @method static string makeFriendlyURL($pre, $suff, $alias, bool $isfolder = false, int $id = 0)
 * @method static string rewriteUrls($input)
 * @method static string replaceUrl($input, array $aliases, array $isFolder)
 * @method static void generateAliasListingFolder(array $ids, &$aliases, &$isFolder)
 * @method static void generateAliasListingAll(array $ids, &$aliases, &$isFolder)
 * @method static string rewriteToNativeUrl(string $content)
 * @method static string toAlias(string $text)
 * @method static int getNotFoundPageId()
 * @method static int getUnAuthorizedPageId()
 * @method static string cleanDocumentIdentifier($qOrig, &$documentMethod)
 * @method static string cleanQueryString($query)
 * @method static array|null getAliasListing($id)
 * @method static int|null getIdFromAlias($alias)
 * @method static int|null getHiddenIdFromAlias(int $parentid, string $alias)
 * @method static string makeUrl(int $id, string $alias = '', string $args = '', string $scheme = '')
 * @method static string|null strictURI(string $query, int $id)
 * @method static makeUrlWithString($id)
 *
 * @see \EvolutionCMS\UrlProcessor
 */
class UrlProcessor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'UrlProcessor';
    }
}
