<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use PDF;

class ReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $today = Carbon::now()->format('Ymd');
        $filename = Str::slug($this->data['nombre'].' '.$this->data['apellido1'].' '.$this->data['apellido2']).'.pdf';
        $pdfOutput = PDF::loadView('pdf', $this->data)->output();
        Storage::disk('public')->put($today.'/'.$filename, $pdfOutput);
    }
}
