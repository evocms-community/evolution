# MODxAPI
Legacy libs for Evolution CMS 3.0.

## Installation
Add "pathologic/modxapi" to "require" section of your core/custom/composer.json, then run "composer update" in core folder:
```
{
  "require": {
    ...
    "pathologic/modxapi": "*"
    ...
  }
}
```
## Usage
Update FormLister to the latest version.

To use with FormLister set the model parameter in your snippet calls according to documentation:
```
[!FormLister?
&controller=`Login`
&model=`Pathologic\EvolutionCMS\MODxAPI\modUsers`
...
!]

[!FormLister
&controller=`Content`
&model=`Pathologic\EvolutionCMS\MODxAPI\modResource`
&userModel=`Pathologic\EvolutionCMS\MODxAPI\modUsers`
!]
```
The same should be done with "model" parameter of userHelper plugin.

To use somewhere else:
```
use Pathologic\EvolutionCMS\MODxAPI\modResource; 
...
$doc = new modResource($modx);
...
```



