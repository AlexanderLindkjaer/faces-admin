<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

trait FilesTrait
{
    /**
     * Defines a relationships for files
     *
     * @return mixed
     */
    public function files() {
        return $this->morphMany(File::class, 'fileable');
    }

    /**
     * Adds an upload function
     *
     * @param $files
     * @param null $additional_path
     * @return array|void
     */
    public function upload($files, $additional_path = null) {

        //directory_name is set as a var on the different models
        $storage_folder_name = $this->directory_name;

        if ($additional_path !== null) {
            $storage_folder_name = "$storage_folder_name/{$additional_path}";
        }

        $stored_files = [];

        if (is_array($files) || is_object($files)) {

            foreach ($files as $file) {
                $mime = $file->getMimeType();
                $original_filename = $file->getClientOriginalName();

                $path = Storage::putFile("assets/{$storage_folder_name}", $file);

                $db_file = $this->files()->create(compact(
                    'path',
                    'mime',
                    'original_filename'
                ));

                $stored_files[] = $db_file;
            }

            throw new \Exception("Error Processing Files", 1);

            return $stored_files;
        }else{
          throw new \Exception("Error Processing Files", 1);

        }
    }

    public function uploadSingle($file, $additional_path = null) {

        //directory_name is set as a var on the different models
        $storage_folder_name = $this->directory_name;

        if ($additional_path !== null) {
            $storage_folder_name = "$storage_folder_name/{$additional_path}";
        }

        $mime = $file->getMimeType();

        $path = Storage::putFile("assets/{$storage_folder_name}", $file);

        $original_filename = $file->getClientOriginalName();

        $db_file = $this->files()->create(compact(
            'path',
            'mime',
            'original_filename'
        ));

        return $db_file;

    }


}
