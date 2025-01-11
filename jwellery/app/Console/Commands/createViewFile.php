<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class createViewFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminTableview {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new view file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $viewname = $this->argument('view');

        $viewname = $viewname.'.blade.php';

        $pathname = "resources/views/{$viewname}";

        if(File::exists($pathname)){
            $this->error("file {$pathname} is already exist " );
            return;
        }
        $dir = dirname($pathname);
        if(!file_exists($dir))
        {
            mkdir($dir,0777,true);
        }

        $content = '@extends("admin.layout")
@section("content")
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
         <a href="" style="margin-bottom: 15px" class="btn btn-dark">Add new</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Users</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Albert Cook</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Lilian Fuller"
                                >
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Sophia Wilkerson"
                                >
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li
                                    data-bs-toggle="tooltip"
                                    data-popup="tooltip-custom"
                                    data-bs-placement="top"
                                    class="avatar avatar-xs pull-up"
                                    title="Christina Parker"
                                >
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a href="" class="btn btn-info">
                                <i class="bx bx-show me-1"></i>
                            </a>
                            <a href="" class="btn btn-warning">
                                <i class="bx bx-edit-alt me-1"></i>
                            </a>
                            <form  style="display:inline;">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bx bx-trash me-1"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <nav aria-label="Page navigation" style="margin-left: 12px">
                    <ul class="pagination">
                        <li class="page-item first">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="tf-icon bx bx-chevrons-left"></i
                                ></a>
                        </li>
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="tf-icon bx bx-chevron-left"></i
                                ></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="tf-icon bx bx-chevron-right"></i
                                ></a>
                        </li>
                        <li class="page-item last">
                            <a class="page-link" href="javascript:void(0);"
                            ><i class="tf-icon bx bx-chevrons-right"></i
                                ></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
@endsection
';

        File::put($pathname , $content);

        $this->info("File {$pathname} is created");

    }
}
