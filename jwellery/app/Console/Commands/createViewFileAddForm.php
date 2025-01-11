<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class createViewFileAddForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminAddFormView {view}';

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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Full Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Company</label>
                                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="text"
                                        id="basic-default-email"
                                        class="form-control"
                                        placeholder="john.doe"
                                        aria-label="john.doe"
                                        aria-describedby="basic-default-email2"
                                    />
                                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>
                                <div class="form-text">You can use letters, numbers & periods</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Phone No</label>
                                <input
                                    type="text"
                                    id="basic-default-phone"
                                    class="form-control phone-mask"
                                    placeholder="658 799 8941"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Message</label>
                                <textarea
                                    id="basic-default-message"
                                    class="form-control"
                                    placeholder="Hi, Do you have a moment to talk Joe?"
                                ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                            <a href="" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
';

        File::put($pathname , $content);

        $this->info("File {$pathname} is created");

    }
}
