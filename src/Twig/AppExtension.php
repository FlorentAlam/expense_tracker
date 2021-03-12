<?php
namespace App\Twig;

use DateTime;
use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension{
    public function getFilters(){
        return [
            new TwigFilter('sign', [$this, 'getSign'])
        ];
    }
    // Return sum of all positive or negative values on the date range depending on $value parameter
    public function getSign($depenses, String $value, String $dateRange){
        $total = 0;
        foreach($depenses as $depense){
            if($depense->getDate() <= new DateTime() && $depense->getDate() >= new DateTime($dateRange)){
                if($value === 'pos' && $depense->getMontant() > 0){
                    $total = $total + $depense->getMontant();
                } else if($value === 'neg' && $depense->getMontant() < 0){
                    $total = $total + $depense->getMontant();
                }
            }
        }
        return $total;
    }
}

?>