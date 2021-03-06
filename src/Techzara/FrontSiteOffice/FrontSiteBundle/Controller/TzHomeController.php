<?php

namespace App\Techzara\FrontSiteOffice\FrontSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Techzara\Service\MetierManagerBundle\Utils\ServiceName;
/**
 * Class TzHomeController
 */
class TzHomeController extends Controller
{
    /**
     * Afficher la page accueil
     * @return string
     */
    public function indexAction()
    {
        // Récupérer manager
        $_membres_liste          = $this->get(ServiceName::SRV_METIER_MEMBRES);
        $_activite_manager       = $this->get(ServiceName::SRV_METIER_ACTIVITE);
        $_article_manager        = $this->get(ServiceName::SRV_METIER_ARTICLE);
        $_programme_manager      = $this->get(ServiceName::SRV_METIER_PROGRAMME);

        $_admin           = $_membres_liste->getAdmin();
        $_programme       = $_programme_manager->getAllProgramme();
        $_activite        = $_activite_manager->getAllActivite();
        $_article         = $_article_manager->getAllArticle();

        return $this->render('FrontSiteBundle:TzHome:index.html.twig', array(
            'users'           => $_admin,
            'programmes'      => $_programme,
            'activites'       => $_activite,
            'articles'         => $_article
        ));
    }
}
