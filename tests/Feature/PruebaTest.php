<?php

namespace Tests\Feature;

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
namespace App;

use Illuminate\Database\Eloquent\Model;
// use PHPUnit\Framework\TestCase;
use App\Producto;
use App\Http\Controllers\ProductosController;
use Illuminate\database\factories;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TasksTest extends TestCase
{
    // use DatabaseMigrations;
    
    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        //Given we have task in the database
        $task = Producto::findOrFail('1');
    
        $response = $this->get('/productos');

        $response->assertSee($task->id);

    }
}

?>