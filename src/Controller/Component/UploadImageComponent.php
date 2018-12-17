<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class UploadImageComponent extends Component {
    
    protected $_defaultConfig = [];

    public function Images($data, $config) {

        $images = $data['image'];
        unset($data['image']);

        $j = 0;

        foreach($images as $image) {

            if($image['error'] == 0) {

                // Extensões permitidas
                $extensions = [
                    'pjpeg',
                    'jpeg',
                    'jpg',
                    'png',
                    'gif',
                    'bmp'
                ];

                // Tamanho máximo de 3MB por imagem
                $sizeMax = 3000000;

                $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

                if(in_array($extension, $extensions) && $image['size'] < $sizeMax) {

                    $name     = md5(uniqid(time())) . ".{$extension}";
                    $dir      = WWW_ROOT . "img" . DS . "{$config['dir']}" . DS . "{$config['type']}";
                    $dirImage = $dir . DS . $name;

                    // Cria o diretório caso não exista
                    $pathImages = new Folder($dir, true, 0777);

                    // Imagem salva
                    move_uploaded_file($image['tmp_name'], $dirImage);

                    // Monta o array com informações para serem gravadas
                    if(isset($image['id'])) {
                        
                        $data['image']['id'] = $image['id'];
                    }

                    $data['image']['image']  = $config['dir'] . DS . $config['type'] . DS . $name;
                    $data['image']['type']   = $config['type'];
                    $data['image']['status'] = 1;

                    $j ++;
                }
                else {
                    
                    // Caso imagem esteja fora do formato ou tamanho permitido
                    return false;
                }
            }
        }

        return $data;
    }

    public function Banners($data, $config) {

        $image = $data['image'];
        unset($data['image']);

        if($image['error'] == 0) {

            // Extensões permitidas
            $extensions = [
                'pjpeg',
                'jpeg',
                'jpg',
                'png',
                'gif',
                'bmp'
            ];

            // Tamanho máximo de 3MB por imagem
            $sizeMax = 3000000;

            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

            if(in_array($extension, $extensions) && $image['size'] < $sizeMax) {

                $name     = md5(uniqid(time())) . ".{$extension}";
                $dir      = WWW_ROOT . "img" . DS . "{$config['dir']}" . DS . "{$config['type']}";
                $dirImage = $dir . DS . $name;

                // Cria o diretório caso não exista
                $pathImages = new Folder($dir, true, 0777);

                // Imagem salva
                move_uploaded_file($image['tmp_name'], $dirImage);

                // Monta o array com informações para serem gravadas
                if(isset($image['id'])) {
                    
                    $data['id'] = $image['id'];
                }

                $data['image']  = $config['dir'] . DS . $config['type'] . DS . $name;
                $data['type']   = $config['type'];
                $data['status'] = 1;
            }
            else {
                
                // Caso imagem esteja fora do formato ou tamanho permitido
                return false;
            }
        }
        
        return $data;
    }
}
