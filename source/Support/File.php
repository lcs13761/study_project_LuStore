<?php

namespace Source\Support;

use Aws\Credentials\Credentials;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

class File
{
    private $s3;

    public function __construct(){
        $credentials = new Credentials(AWS_KEY, AWS_SECRET);
        $this->s3 = new S3Client([
            'version' => 'latest',
            'region' => AWS_REGION,
            'credentials' => $credentials
        ]);
    }

    /**
     * @throws \Exception
     */
    final public function save(array $file, string $drive = 's3')
    {
        if ($drive == 's3') {
            return  $this->awsUpload($file);;
        }
        return true;
    }

    private function awsUpload(array $file)
    {
        try {
            $result = $this->s3->putObject([
                'Bucket' => AWS_BUCKET,
                'Key' => 'imagens/' . str_replace('=','',base64_encode(hash('md5',$file['name']))),
                'Body' => fopen($file['tmp_name'],'r')
            ]);

            return utf8_decode($result['ObjectURL']);
        } catch (S3Exception $e) {
            throw new \Exception($e);
        }

    }

    public function destroy(string $file)
    {

        $verify = $this->verify($file);
        if(!$verify)return;
        try{
            $result = $this->s3->deleteObject([
                'Bucket' => AWS_BUCKET,
                'Key' => $this->formatFile($file)
            ]);

           if($result['DeleteMarker']){
               return true;
           }else{
               return false;
           }
        }catch (S3Exception $e){
            throw new \Exception($e->getAwsErrorMessage);
        }
    }

    private function verify(string $file){
        try{

            $result = $this->s3->getObject([
                'Bucket' => AWS_BUCKET,
                'Key' => $this->formatFile($file)
            ]);
            return true;
        }catch (S3Exception $e){
            return false;
        }
    }

    private function formatFile(string $file):string {
        return utf8_decode(str_replace('https://lustore.s3.us-east-2.amazonaws.com/','',$file));
}

}