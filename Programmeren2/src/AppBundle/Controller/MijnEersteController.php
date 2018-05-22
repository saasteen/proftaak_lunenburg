<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Klant;
use AppBundle\Form\Type\KlantType;
use AppBundle\Entity\product;
use AppBundle\Form\Type\productType;
use AppBundle\Entity\Productsoort;
use AppBundle\Form\Type\productSoortType;
use AppBundle\Entity\Goederenontvangst;
use AppBundle\Form\Type\GoederenOntvangstType;
use AppBundle\Entity\bestelOpdracht;
use AppBundle\Form\Type\bestelOpdrachtType;

class MijnEersteController extends Controller
{
		/**
		* @Route("/hallo/wereld", name= "hallo_wereld")
		*/
		public function halloWereld(Request $reguest){
				return new Response("Hallo wereld ik ben een Symfony applicatie!");
			}

			/**
			* @Route("/alle/klanten", name= "alleklanten")
			*/
			public function alleklanten(Request $request){
				$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findAll();

				return new Response($this->renderView('klanten.html.twig', array('klanten' => $klanten)));
		}		//alle klanten laten zien



			/**
			* @Route("/alle/producten", name= "alleproducten")
			*/
			public function alleProducten(Request $request){
				$producten = $this->getDoctrine()->getRepository("AppBundle:product")->findAll();

				return new Response($this->renderView('producten.html.twig', array('producten' => $producten)));
		}		//alle producten laten zien


		/**
		* @Route("/alle/soort/producten", name= "allesoortproducten")
		*/
		public function allesoortproducten(Request $request){
			$productsoorten = $this->getDoctrine()->getRepository("AppBundle:Productsoort")->findAll();
			$tekst= "";
			foreach($productsoorten as $productsoort) {
				$tekst = $tekst . $productsoort->gettid(). " " . $productsoort->getbeschrijving()."<br>";
			}
				return new Response($tekst);
	}		//alle soort producten laten zien


		/**
		* @Route("/klanten/{voornaam}", name= "klantopvoornaam")
		*/
		public function klantOpVoornaam(Request $request, $voornaam){
			$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findByVoornaam($voornaam);

			return new Response($this->renderView('klanten.html.twig', array('klanten' => $klanten)));
	}


	/**
	* @Route("/klanten/woonplaats/{woonplaats}", name= "klantopwoonplaats")
	*/
	public function klantOpWoonplaats(Request $request, $woonplaats){
		$klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findByWoonplaats($woonplaats);

		return new Response($this->renderView('klanten.html.twig', array('klanten' => $klanten)));
}

/**
* @Route("/klant/nieuw", name= "klantnieuw")
*/
public function nieuweKlant(Request $request){
	$nieuweKlant = new Klant();
	$form = $this->createForm(KlantType::class, $nieuweKlant);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweKlant);
			$em->flush();
			return $this->redirect($this->generateurl("klantnieuw"));
		}

		return new Response($this->renderView('formulierKlanten.html.twig', array('form' => $form->createView())));

}

/**
* @Route("/product/nieuw", name= "productnieuw")
*/
public function nieuweproduct(Request $request){
	$nieuweproduct = new product();
	$form = $this->createForm(productType::class, $nieuweproduct);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuweproduct);
			$em->flush();
			return $this->redirect($this->generateurl("productnieuw"));
		}

		return new Response($this->renderView('formulierProducten.html.twig', array('form' => $form->createView())));

}

/**
* @Route("/klant/wijzig/{Klantnummer}", name= "klantwijzigen")
*/
public function wijzigKlant(Request $request, $Klantnummer){
	$bestaandeklant = $this->getDoctrine()->getRepository("AppBundle:Klant")->find($Klantnummer);
	$form = $this->createForm(KlantType::class, $bestaandeklant);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandeklant);
			$em->flush();
			return $this->redirect($this->generateurl("alleklanten"));
		}

		return new Response($this->renderView('formulierKlanten.html.twig', array('form' => $form->createView())));

}

/**
* @Route("/product/wijzig/{barcode}", name= "productwijzigen")
*/
public function wijzigProduct(Request $request, $barcode){
	$bestaandeProduct = $this->getDoctrine()->getRepository("AppBundle:product")->find($barcode);
	$form = $this->createForm(ProductType::class, $bestaandeProduct);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandeProduct);
			$em->flush();
			return $this->redirect($this->generateurl("alleProducten"));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));

}

/**
* @Route("/goederen/ontvangst", name= "ontvangstgoederen")
*/
public function GoederenOntvangst(Request $request){
	$goederenontvangst = new Goederenontvangst();
	$form = $this->createForm(GoederenOntvangstType::class, $goederenontvangst);

	$form->handleRequest($request);
	if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($goederenontvangst);
			$em->flush();
			return $this->redirect($this->generateurl("ontvangstgoederen"));
		}

		return new Response($this->renderView('formuliergoederenontvangst.html.twig', array('form' => $form->createView())));

}

/**
 * @Route("/bestelopdracht/nieuw", name="nieuwbestelOpdracht")
 */
			 public function nieuwbestelOpdracht(Request $request) {
					$nieuwbestelOpdracht = new bestelOpdracht();
					$form = $this->createForm(bestelOpdrachtType::class, $nieuwbestelOpdracht);

					$form->handleRequest($request);

							if ($form->isSubmitted() && $form->isValid()) {
								$em = $this->getDoctrine()->getManager();
								$em->persist($nieuwbestelOpdracht);
								$em->flush();
								return $this->redirect($this->generateurl("nieuwbestelOpdracht"));
							}

					return new Response($this->renderView('formulierbestelopdracht.html.twig', array('form' => $form->createView())));
				}

				/**
				* @Route("/alle/goederen", name= "allesoortgoederen")
				*/
				public function alleGoederen(Request $request){
					$goederenontvangst = $this->getDoctrine()->getRepository("AppBundle:Goederenontvangst")->findAll();

					return new Response($this->renderView('goederen.html.twig', array('goederenontvangst' => $goederenontvangst)));
			}		//alle klanten laten zien


}

?>
