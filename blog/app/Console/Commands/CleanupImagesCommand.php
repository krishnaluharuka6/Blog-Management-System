<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CleanupImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete blogs older than Two days and unused images from storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //delete blogs older than 2 days
        $oldBlogs=Blog::where('created_at','<',Carbon::now()->subDay(2))->get();

        if($oldBlogs->isEmpty()){
            $this->info('No blogs older than 2 days found');
        }else{
            foreach($oldBlogs as $blog){
                $path="uploads/".$blog->user_id."/".$blog->slug;
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->deleteDirectory($path);
                    $this->info("Deleted images of a blog");
                }

                $blog->delete();
                $this->info("Deleted blog:{$blog->title}");
            }
        }

        //cleanUp unused Images
        $unusedImages=Image::doesntHave('blog')->get();
        if($unusedImages->isEmpty()){
            $this->info('No unused images found');
            return;
        }

        foreach ($unusedImages as $image) {

             if (Storage::disk('public')->exists($image->file_path)) {
                        Storage::disk('public')->delete($image->file_path);
                    }

                    $image->delete();
            // Delete image from storage

            // $filePath = 'public/storage/' . $image->file_path; // Adjust path as necessary
            // Storage::disk('public')->delete($image->file_path);
            // if (Storage::exists($filePath)) {
            //     Storage::delete($filePath);
            //     $this->info("Deleted image: {$image->file_path}");
            // }

            $folderPath=dirname($image->file_path);
            $allFiles=Storage::disk('public')->files($folderPath);
            if (empty($allFiles)) {
                Storage::disk('public')->deleteDirectory($folderPath);
            }

            //delete data from database
            $image->delete();

        }

        $this->info('Cleanup complete.');
    }
}
