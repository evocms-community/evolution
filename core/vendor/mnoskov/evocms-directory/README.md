### Directory - показ ресурсов в табличном виде вместо дерева

<img src="https://img.shields.io/badge/PHP-%3E=7.3-green.svg?php=7.3"> <img src="https://img.shields.io/badge/EVO-%3E%3D3.1.4-green">

#### Установка:
```
php -d="memory_limit=-1" artisan package:installrequire mnoskov/evocms-directory "*"
php artisan vendor:publish --provider="EvolutionCMS\Directory\DirectoryServiceProvider"
```

После установки задать конфигурацию в каталоге `core/custom/directory`.

![2021-06-09_14-39-51](https://user-images.githubusercontent.com/8789957/121332218-181bfd00-c931-11eb-8144-f411ab5f2321.png)
