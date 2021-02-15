<?php

namespace Source\Core;


use CoffeeCode\Uploader\Image;
use Source\Core\Thumb;

/**
 * FSPHP | Class Upload
 *
 * @author Robson V. Leite <cursos@upinside.com.br>
 * @package Source\Support
 */
class Upload
{


    /**
     * @param array $image
     * @param string $name
     * @param int $width
     * @return null|string
     * @throws \Exception
     */
    public function image(array $image, int $width = CONF_IMAGE_SIZE): ?array
    {

        $imgsalva = [];
        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);
        $imagem = $image;
        $count = count($image['imagem']['name']);

        foreach ($image as $image => $value) {

            for ($i = 0; $i < $count; $i++) {

                $name = $value['name'][$i] . time();
                if (empty($value['type']) && !in_array($value['type'], $upload::isAllowed())) {
                    echo "arquivo nao suportad";
                } else {
                    $imagem = $value;
                    $criarimg = ["imagem$i" => ["name" => $imagem['name'][$i], "type" => $imagem['type'][$i], "tmp_name" => $imagem['tmp_name'][$i], "error" => $imagem['error'][$i], "size" => $imagem['size'][$i]]];
                    $imgsalva[] = str_replace(CONF_UPLOAD_DIR . "/", "", $upload->upload($criarimg['imagem' . $i], $name, $width, CONF_IMAGE_QUALITY));
                    $posicao = $i + 1;
                    $imge["imagem$posicao"] = $imgsalva[$i];
                }
            }
        }
        return $imge;
    }
    public function update(array $image, int $width = CONF_IMAGE_SIZE)
    {

        $imgsalva = [];
        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);
        foreach ($image as $image){
            $name = $image['name'] . time();   
        if (empty($image['type']) && !in_array($image['type'], $upload::isAllowed())) {
            echo "arquivo nao suportad";
        } else {
            $imgsalva[] = str_replace(CONF_UPLOAD_DIR . "/", "", $upload->upload($image, $name, $width, CONF_IMAGE_QUALITY));
            return $imgsalva;
        }
    }
    }



    public function deleteImagem(array $name): bool
    {   
        
        $cach = new Thumb();
        $name = (array)$name[0];
        $image = implode(",", $name);
        $image = explode(",", $image);
        $image = array_filter($image);
        foreach ($image as $image => $value) {
            $arquivo = __DIR__ . "/../../storage/" . $value;
            $cach->flush($value);
            if (file_exists($arquivo)) {
                chmod("$arquivo", 0755);
                unlink($arquivo);
            }
        }

        return true;
    }
}
