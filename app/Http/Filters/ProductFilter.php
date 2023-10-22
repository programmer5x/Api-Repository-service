<?php

namespace App\Http\Filters;

use App\Models\Product;

class ProductFilter
{
    private mixed $queryParams;
    private mixed $query;
    private ?int $page;
    private ?string $q;
    private int $per_page;
    private int $status;

    private $searchKey;
    private $name;
    private $minPrice;
    private $maxPrice;
    private $result;

    public function __construct($queryParams, $per_page)
    {
        $this->queryParams = $queryParams;
        $this->query = Product::query();
        $this->per_page = $per_page;
        $this->filter();
    }

    private function extractKeyByKeyName($key)
    {
        if (isset($this->queryParams[$key])) {
            $q = $this->queryParams[$key];
            unset($this->queryParams[$key]);
            return $q;
        }
    }

    private function extractSearchKey(): void
    {
        $this->q = $this->extractKeyByKeyName('q');
    }

    private function extractStatus()
    {
        $this->status = $this->extractKeyByKeyName('status');
    }

    private function extractPage()
    {
        $this->page = $this->extractKeyByKeyName('page');
    }

    private function extractName()
    {
        $this->name = $this->extractKeyByKeyName('name');
    }

    private function extractPrice()
    {
        $this->price = $this->extractKeyByKeyName('price');
    }

    private function extractResult()
    {

    }


    private function createQuery()
    {
        if ($this->q) {
            $this->query->where("name","LIKE","%$this->q%");
        }
        if($this->minPrice) {
            $this->query->where('price','>=', $this->minPrice);
        }
        if($this->maxPrice) {
            $this->query->where('price', '<=', $this->maxPrice);
        }
        if($this->status) {
            $this->query->where('status', $this->status);
        }
    }

    public function fetchData()
    {
        $this->result = $this->query->latest()->paginate($this->per_page);
    }

    public function filter()
    {
        $this->extractName();
        $this->extractPage();
        $this->extractPrice();
        $this->extractResult();
        $this->extractSearchKey();
        $this->extractPage();
        $this->createQuery();
        $this->fetchData();
    }
}
