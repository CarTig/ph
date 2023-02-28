<?php

namespace App\Controller\Admin;

use App\Entity\Plante;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlanteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plante::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
