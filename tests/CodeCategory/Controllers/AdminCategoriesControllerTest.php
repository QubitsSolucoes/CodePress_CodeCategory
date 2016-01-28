<?php

namespace CodePress\CodeCategory\Tests\Controllers;

use CodePress\CodeCategory\Controllers\AdminCategoriesController;
use CodePress\CodeCategory\Controllers\Controller;
use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Repository\CategoryRepository;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

class AdminCategoriesControllerTest extends AbstractTestCase
{

    public function test_should_extend_from_controller()
    {
        $repository = m::mock(CategoryRepository::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $repository);

        $this->assertInstanceOf(Controller::class, $controller);
    }

    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $repository = m::mock(CategoryRepository::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $repository);
        $html = m::mock();

        $categoriesResult = ['cat1', 'cat2'];
        $repository->shouldReceive('all')->andReturn($categoriesResult);

        $responseFactory->shouldReceive('view')
            ->with('codecategory::index', ['categories' => $categoriesResult])
            ->andReturn($html);

        $this->assertEquals($controller->index(), $html);

    }

}