<?php

namespace App\Modele;

use App\Core\Modele\Modele;
use DateTime;

class PostModele extends Modele{

    private $nom;
    private $id;
    private $picture;
    private $names;
    private $name;
    private $content;
    private $price;
    private $create_at;
    private $id_category;
    private $id_size;

    public function getUrl()  
    {
        return 'index.php?page=posts.post&id=' . $this->id;
    }

    public function getExtract()  
    {
        $html = "<p>". substr($this->content, 0, 100) ."</p>";
       return $html;
    }

    public function getPrix()  
    {
        return number_format($this->price, 0, '', ',');
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPicture()
    {
        return   $this->picture;
    }

    public function setPicture($picture)
    {
        $dossier = dirname(__DIR__).'/../public/images' . DIRECTORY_SEPARATOR;
        
        if ((isset($_FILES['picture']) && $_FILES['picture']['error'] === 0)) {

            $picture = $_FILES['picture']['name'];
            $size = $_FILES['picture']['size'];
            $picture_folder = $dossier.$picture;
            $picture_tmp = $_FILES['picture']['tmp_name'];

            if ($size <= 3000000) {

                $extensions = array('.png','.PNG', '.gif', '.jpg', '.jpeg');
                $extension = strrchr( $picture, '.');
                if (in_array($extension, $extensions)) {
                 // On peut valider le fichier et le stocker définitivement
                    //move_uploaded_file($picture_tmp, $picture_folder);
                    move_uploaded_file( $picture_tmp, $picture_folder);
                   //echo "L'envoi a bien été effectué !";
                }
            }
    
        }
        $this->picture = $picture;
        return $this->picture ;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }
    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function setIdCategory($id_category)
    {
        $this->id_category = (int)$id_category;
        return $this;
    }
    public function getIdSize()
    {
        return $this->id_size;
    }

    public function setIdSize($id_size)
    {
        $this->id_size = (int)$id_size;
        return $this;
    }
    public function getCreateAt()
    {
        return new DateTime($this->create_at);
      
    }

    
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
        return $this;
    }

    
    public function getDateValue() : string{
       $dateNow = new DateTime();
       $dateNow = $dateNow->modify('-1 hour')->format('Y-m-d H:i:s');
       $dateCreate = $this->getCreateAt()->modify('-1 hour')->format('Y-m-d H:i:s');

       $dateValue = "il y'a ";
       $date1 = new DateTime($dateNow);
       $date2 = new DateTime($dateCreate);
       $diff = $date1->diff($date2);

       if($diff->y !== 0) {
         $dateValue .=  $diff->y . " ans";
       }else if($diff->m !== 0) {
         $dateValue .=  $diff->m ." mois";
       }else if($diff->d !== 0) {
         $dateValue .=  $diff->d . " jour " ;
       }else if ($diff->h !== 0) {
         $dateValue .=  $diff->h . " h " ;
       } else if ($diff->i !== 0) {
         $dateValue .=  $diff->i . " min " ;
       } else if($diff->s !== 0) {
         $dateValue .=  $diff->s . " s " ;
       }

       return $dateValue;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of names
     */ 
    public function getNames()
    {
        return $this->names;
    }

    /**
     * Set the value of names
     *
     * @return  self
     */ 
    public function setNames($names)
    {
        $this->names = $names;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}