<?php
namespace App\Service;

use League\Csv\Reader;
use App\Entity\Produit;
use App\Validator\Designation;
use App\Repository\ProduitRepository;
use App\Validator\DesignationValidator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ImportCsvService
{
    private $errorCsv = 0;
    public function __construct(private ProduitRepository $produitRepository, private EntityManagerInterface $em, private ValidatorInterface $validator)
    {
        
    }
    public function importCsv(SymfonyStyle $io, ): void
    {
        $io->title('Importation CSV'); //Text on console

        $csv = $this->readCsvFile(); //
        
        $io->progressStart(count($csv)); //progress bar
        
        //for all ligne on the csv and persist
        foreach($csv as $cs){
            $io->progressAdvance();
            $product = $this->createOrUpdateProduct($cs);
            $this->em->persist($product);
        }
        // if 3 error copy the file on the folder erreur and delete this
        if($this->errorCsv > 3){
            if (copy("%kernel.root_dir%/../import/easy4d.csv","%kernel.root_dir%/../import/erreur/easy4d.csv")) {
                $io->error("Plus de 3 erreur, deplacement du fichier dans Import > Erreur");
                unlink("%kernel.root_dir%/../import/easy4d.csv");
            }
        }else {
            $this->em->flush(); //flush on the db
            $io->progressFinish();
            $io->success('Import Success Moins de 3 erreur...');
        }
    }
    private function readCsvFile(): Reader
    {
        $reader = Reader::createFromPath('%kernel.root_dir%/../import/easy4d.csv', 'r');
        $reader->setDelimiter(';');
        $reader->setHeaderOffset(0);
        
        return $reader;
    }
    private function createOrUpdateProduct(array $prod):Produit 
    {
        //check Repository if existe
        $product = $this->produitRepository->findOneBy(['Easy4D' => $prod['Easy4D Code']]);
        if(!$product){
            $product = new Produit();
        }
        //Validator check
        $error = $this->validator->validate($product); 
        if(count($error)>0){
            $this->errorCsv ++;
            //var_dump($this->errorCsv);
        };
        //Set product on the object
        $product->setEasy4D($prod['Easy4D Code'])
                ->setEANCode($prod['EAN Code'])
                ->setDesignation($prod['Designation'])
                ->setCategory($prod['Category  tyre name'])
                ->setBrandName($prod['Brand name'])
                ->setFamilyName($prod['Family name'])
                ->setWidth($prod['Width'])
                ->setHeight($prod['Height'])
                ->setDiameter($prod['diameter'])
                ->setConstruction($prod['Construction'])
                ->setLoadIndex($prod['Load index'])
                ->setSpeedIndex($prod['Speed index'])
                ->setSegment($prod['Segment']);
                return $product;
    }
}