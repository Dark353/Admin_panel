<?php
class YetkiKontrol
{
    const KPOST   = 1;
    const KDELETE = 2;
    const KUPDATE = 4;
    const KREAD   = 8;

    const UPOST   = 16;
    const UDELETE = 32;
    const UUPDATE = 64;
    const UREAD   = 128;

    const HPOST   = 256;
    const HDELETE = 512;
    const HUPDATE = 1024;
    const HREAD   = 2048;    

    const CPOST   = 4096;
    const CDELETE = 8192;
    const CUPDATE = 16384;
    const CREAD   = 32768; 
    
    const RPOST   = 65536;
    const RDELETE = 131072;
    const RUPDATE = 262144;
    const RREAD   = 524288;   

    public static function kullkont($userValue2, $requiredPermissions){
        if(!($userValue2 & $requiredPermissions) ){
            header("Location: ./403.php");
            exit();
        }
    }
    
    public static function kontrolEt($userValue)
    {
        $dizi = [];
        if ($userValue & self::KPOST) {
            array_push($dizi, self::KPOST);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::KDELETE) {
            array_push($dizi, self::KDELETE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::KUPDATE) {
            array_push($dizi, self::KUPDATE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::KREAD) {
            array_push($dizi, self::KREAD);

        }else{
            array_push($dizi,0);
        }


        if ($userValue & self::UPOST) {
            array_push($dizi, self::UPOST);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::UDELETE) {
            array_push($dizi, self::UDELETE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::UUPDATE) {
            array_push($dizi, self::UUPDATE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::UREAD) {
            array_push($dizi, self::UREAD);
        }else{
            array_push($dizi,0);
        }




        if ($userValue & self::HPOST) {
            array_push($dizi, self::HPOST);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::HDELETE) {
            array_push($dizi, self::HDELETE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::HUPDATE) {
            array_push($dizi, self::HUPDATE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::HREAD) {
            array_push($dizi, self::HREAD);
        }else{
            array_push($dizi,0);
        }



        if ($userValue & self::CPOST) {
            array_push($dizi, self::CPOST);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::CDELETE) {
            array_push($dizi, self::CDELETE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::CUPDATE) {
            array_push($dizi, self::CUPDATE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::CREAD) {
            array_push($dizi, self::CREAD);
        }else{
            array_push($dizi,0);
        }


        if ($userValue & self::RPOST) {
            array_push($dizi, self::RPOST);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::RDELETE) {
            array_push($dizi, self::RDELETE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::RUPDATE) {
            array_push($dizi, self::RUPDATE);
        }else{
            array_push($dizi,0);
        }
        if ($userValue & self::RREAD) {
            array_push($dizi, self::RREAD);
        }else{
            array_push($dizi,0);
        }


        return($dizi);
    }
}

// $userValue = 65535; // Bu değeri kullanıcının gerçek yetki değeriyle güncelleyin
// YetkiKontrol::kontrolEt($userValue);