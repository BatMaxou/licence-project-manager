<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    const UPLOADS_PATH = ['public', 'uploads'];

    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function delete(AdminContext $context)
    {
        $imagePath = self::UPLOADS_PATH[1] . '/' . $context->getEntity()->getInstance()->getImage();

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return parent::delete($context);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name'),
            ImageField::new('image')
                ->hideOnIndex()
                ->setBasePath(self::UPLOADS_PATH[1])
                ->setUploadDir(implode('/', self::UPLOADS_PATH))
                ->setUploadedFileNamePattern('[name]-[timestamp].[extension]')
                ->setRequired($pageName !== Crud::PAGE_EDIT)
                ->setFormTypeOptions($pageName == Crud::PAGE_EDIT ? ['allow_delete' => false] : []),
            TextEditorField::new('description')
                ->hideOnIndex(),
            TextField::new('link')
                ->hideOnIndex(),
            DateField::new('startDate'),
            DateField::new('endDate'),
            DateField::new('creationDate')
                ->onlyOnIndex(),
            DateField::new('lastModificationDate')
                ->onlyOnIndex(),
            AssociationField::new('category')
                ->autocomplete(),
            AssociationField::new('technologies')
                ->autocomplete()
                ->setRequired(true),
        ];
    }
}
