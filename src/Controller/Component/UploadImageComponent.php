<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class UploadImageComponent extends Component {
    
    protected $_defaultConfig = [];

    public function save($data, $config) {

        $images = $data['images'];
        unset($data['images']);

        $j = 0;

        foreach($images as $image) {

            if($image['image']['error'] == 0) {

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

                $extension = pathinfo($image['image']['name'], PATHINFO_EXTENSION);

                if(in_array($extension, $extensions) && $image['image']['size'] < $sizeMax) {

                    $name     = md5(uniqid(time())) . ".{$extension}";
                    $dir      = WWW_ROOT . "img" . DS . "{$config['dir']}" . DS . "{$config['type']}";
                    $dirImage = $dir . DS . $name;

                    // Cria o diretório caso não exista
                    $pathImages = new Folder($dir, true, 0777);

                    // Imagem salva
                    move_uploaded_file($image['image']['tmp_name'], $dirImage);

                    // Monta o array com informações para serem gravadas
                    if(isset($image['id'])) {
                        
                        $data['images'][$j]['id'] = $image['id'];
                    }

                    $data['images'][$j]['image']  = $config['dir'] . DS . $config['type'] . DS . $name;
                    $data['images'][$j]['type']   = $config['type'];
                    $data['images'][$j]['status'] = 1;

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
}
