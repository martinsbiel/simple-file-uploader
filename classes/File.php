<?php
    class File {
        public function getFileExtension($fileName){
            $fileNameExtension = explode('.', $fileName);

            return $extension = end($fileNameExtension);
        }

        public function changeFileName($extension){
            return $newFileName = uniqid() . '.' . $extension;
        }

        public function uploadFile($tempfile, $newFileName, $folder){
            if(move_uploaded_file($tempfile, $folder.$newFileName)){
                return true;
            } else {
                return false;
            }
        }

        public function checkSize($fileSize, $allowedSize){
            if($fileSize > $allowedSize){
                return true;
            } else {
                return false;
            }
        }

        public function checkExtension($extension, $allowedExtensions){
            if(in_array($extension, $allowedExtensions) == false){
                return true;
            } else {
                return false;
            }
        }

        public function formatBytes($bytes, $precision = 2){ 
            $units = array('B', 'KB', 'MB', 'GB', 'TB');

            $bytes = max($bytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);

            // Uncomment one of the following alternatives
            $bytes /= pow(1024, $pow);
            //$bytes /= (1 << (10 * $pow));

            return round($bytes, $precision) . '' . $units[$pow];
        }
    }