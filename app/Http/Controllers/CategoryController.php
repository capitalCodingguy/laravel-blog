<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Requests;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        
    }

    public function getAll()
    {
        $categories = $this->categoryRepository->getAll();
        return $categories;
    }
    public function getCategoryDetail($name)
    {
        $category = $this->categoryRepository->get($name);
        $categoryBlogList = $this->categoryRepository->getDetail($category);
        return $categoryBlogList;
    }
}