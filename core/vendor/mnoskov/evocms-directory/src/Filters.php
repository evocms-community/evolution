<?php namespace EvolutionCMS\Directory;

use EvolutionCMS\Models\SiteTmplvar;

class Filters
{
    public function injectFilters($query, $columns = [])
    {
        $tvs = $this->getTvNames($columns);
        $content = array_diff($columns, $tvs);
        $query = $this->injectContentFilters($query, $content);
        $query = $this->injectTvFilters($query, $tvs);
        return $query;
    }

    protected function injectContentFilters($query, $fields = [])
    {
        if(!empty($fields)) {
            $filterRequest = $this->getFilterRequest();
            foreach($fields as $field) {
                if(!empty($filterRequest[$field]) && is_scalar($filterRequest[$field])) {
                    $value = trim($filterRequest[$field]);
                    if(strpos($value, '=') === 0) {
                        //точное совпадение
                        $query = $query->where('site_content.' . $field, ltrim($value, '='));
                    } else {
                        $query = $query->where('site_content.' . $field, 'like', '%' . $value . '%');
                    }
                }
            }
        }
        return $query;
    }

    protected function injectTvFilters($query, $fields = [])
    {
        $filters = [];
        if(!empty($fields)) {
            $filterRequest = $this->getFilterRequest();
            foreach($fields as $field) {
                if(!empty($filterRequest[$field]) && is_scalar($filterRequest[$field])) {
                    $op = 'like';
                    $value = trim($filterRequest[$field]);
                    $cast = '';
                    switch(true) {
                        case strpos($value, '>=') === 0:
                            $op = '>=';
                            $value = ltrim($value, '>=');
                            $cast == ':UNSIGNED';
                            break;
                        case strpos($value, '<=') === 0:
                            $op = '<=';
                            $value = ltrim($value, '<=');
                            $cast == ':UNSIGNED';
                            break;
                        case strpos($value, '!=') === 0:
                            $op = '!=';
                            $value = ltrim($value, '!=');
                            break;
                        case strpos($value, '=') === 0:
                            $op = '=';
                            $value = ltrim($value, '=');
                            break;
                        case strpos($value, '>') === 0:
                            $op = '>';
                            $value = ltrim($value, '>');
                            $cast == ':UNSIGNED';
                            break;
                        case strpos($value, '<') === 0:
                            $op = '<';
                            $value = ltrim($value, '<');
                            $cast == ':UNSIGNED';
                            break;
                        default:
                            break;
                    }
                    $filters[] = 'tv:' . $field . ':' . $op . ':' . htmlspecialchars($value) . $cast;
                }
            }
        }
        if(!empty($filters)) {
            $query = $query->tvFilter(implode(';', $filters));
        }
        return $query;
    }

    protected function getFilterRequest()
    {
        return request()->input('filter', []);
    }

    protected function getTvNames($tvs)
    {
        $arr = [];
        if(!empty($tvs)) {
            $arr = SiteTmplvar::whereIn('name', $tvs)->get()->toArray();
            if(!empty($arr)) {
                $arr = array_column($arr, 'name');
            }
        }
        return $arr;
    }
}
