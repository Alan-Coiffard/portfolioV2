<?php
$auth = 0;
  include 'lib/includes.php';

  $title = "Présentation";

  include 'template/header.php';
?>

<div class="container">
  <div class="fond">
    <div class="starter-template">
      <h1><u><center>Qui suis-je ?</center></u></h1>
    </div>
    <hr>
    <!--------------------------------------------------------------------------------MES ETUDES----------------------------------------------------------------------------------------->
    <p class="textpres">
      Actuellement en première année de BTS SN (système numérique), je souhaite travailler dans le domaine de l’informatique. Plus précisément je voudrais me diriger dans le développement du côté du Front-End mais pourquoi pas un peu de Back-End. J’ai une approche plutôt artistique, en effet, j’aime bien que ce que je fais soit beau et ordonné.
    </p>
    <!--------------------------------------------------------------------------------LA PHOTOGRAPHIE----------------------------------------------------------------------------------------->
    <a href="<?= WEBROOT ?>" class="noLien">
      <div class="divLien-right">
        <h2><u><center>La photographie</center></u></h2>
        <div class="media hidden-xs hidden-sm">
          <img src="img/test/1(2).jpg" width="50%" class="align-self-center mr-3 image-icone-left">
          <div class="media-body">
            <p class="textpres">
              Comme vous pouvez le voir sur l’image de droite, je suis photographe amateur, il s’agit là de l’une de mes passions. Je suis dans ce milieu depuis quelques années maintenant, j’ai eu l’occasion de faire une bonne partie des différentes catégories qui existent, par exemple j’ai fais beaucoup de portraits, de l’animalier, du paysage, mais plus professionnellement, je suis le photographe, depuis le début de l’année 2019/2020, d’une équipe de basket qui évolue en National 3, et depuis maintenant 1 an je suis le photographe de l’association d’informatique de l’IUT de Lannion Alive. Je vais donc faire les photos de groupe des événement, comme par exemple les LAN, les soirées ou encore des activités comme du PaintBall.
            </p>
          </div>
        </div>
        <div class="hidden-md hidden-lg ">
          <div class="flex">
            <img src="img/test/1(2).jpg" width="100%" class="image-icone-left img-haut">
          </div>
          <div>
            <p class="textpres">
              Comme vous pouvez le voir sur l’image de droite, je suis photographe amateur, il s’agit là de l’une de mes passions. Je suis dans ce milieu depuis quelques années maintenant, j’ai eu l’occasion de faire une bonne partie des différentes catégories qui existent, par exemple j’ai fais beaucoup de portraits, de l’animalier, du paysage, mais plus professionnellement, je suis le photographe, depuis le début de l’année 2019/2020, d’une équipe de basket qui évolue en National 3, et depuis maintenant 1 an je suis le photographe de l’association d’informatique de l’IUT de Lannion Alive. Je vais donc faire les photos de groupe des événement, comme par exemple les LAN, les soirées ou encore des activités comme du PaintBall.
            </p>
          </div>
        </div>
      </div>

    </a>
    <!--------------------------------------------------------------------------------MES PASSIONS----------------------------------------------------------------------------------------->
    <h2><u><center>Mes passion</center></u></h2>
    <!--------------------------------------------------------------------------------LES JEUX VIDEOS----------------------------------------------------------------------------------------->
    <p class="textpres">
      J’aime aussi vraiment beaucoup les jeux vidéos, je trouve ça très relaxant et il s’agit d’une bonne façon de passer du bon temps avec des personnes que tu ne peux pas voir facilement. Mais pas que, il s’agit d’une solution très ludique pour forger des liens et un esprit d’équipe avec un groupe.
    </p>
    <!--------------------------------------------------------------------------------lE SPORT----------------------------------------------------------------------------------------->
    <p class="textpres">
      Le sport est aussi quelque chose d’important, j’aime particulièrement les sports en équipe pour la cohésion de groupe et l’esprit d’équipe. J’ai fais 8 ans de basket où je jouais de temps en temps meneur.
    </p>
  </div>
<!--------------------------------------------------------------------------------MES PROJETS----------------------------------------------------------------------------------------->
  <div class="fond">
    <div class="starter-template">
      <h1 class="pad"><u><center>Mes projets</center></u></h1>
    </div>
    <hr>
    <div>  
  <!--------------------------------------------------------------------------------Mon site dynamique en anglais BTS----------------------------------------------------------------------------------------->
      <a href="http://alan-coiffard.ovh/" class="noLien">
        <div class="divLien-right">
          <h2><u><center>Blog en Anglais</center></u></h2>
          <div class="media hidden-xs hidden-sm">
            <img src="img/test/blogAnglais.png" width="25%" class="align-self-center mr-3 image-icone-left">
            <div class="media-body">
              <p class="textpres">
                Le projet du blog est notre deuxième projet web en BTS SN. Il nous a été demandé de créer un site dynamique en PHP avec un choix libre sur le contenue. J'ai donc réaliser ce site web, vous pouvez aller le visiter en cliquant ici.
              </p>
            </div>
          </div>
          <div class="hidden-md hidden-lg ">
            <div class="flex">
              <img src="img/test/blogAnglais.png" width="100%" class="image-icone-left img-haut">
            </div>
            <div>
              <p class="textpres">
                Le projet du blog est notre deuxième projet web en BTS SN. Il nous a été demandé de créer un site dynamique en PHP avec un choix libre sur le contenue. J'ai donc réaliser ce site web, vous pouvez aller le visiter en cliquant ici.
              </p>
            </div>
          </div>
        </div>
      </a>
  <!--------------------------------------------------------------------------------Mon site statique en anglais BTS----------------------------------------------------------------------------------------->
      <a href="http://alan-coiffard.ovh/" class="noLien">
        <div class="divLien-left">
          <h2><u><center>Site web personnel en Anglais</center></u></h2>
          <div class="media hidden-xs hidden-sm">
            <div class="media-body">
              <p class="textpres">
                Ce projet est celui que vous voyez ici, il s’agit d’une interface qui me permet de développer le contenu de mon CV. Nous avions déjà pour objectif de faire un site personnel à l’IUT mais en première année de BTS on nous demande de créer un site en anglais avec un sujet libre, j’ai donc décidé de refaire entièrement mon site car je n’étais pas satisfait de la première version.
              </p>
            </div>
            <img src="img/test/siteBTS.png" width="25%" class="align-self-center ml-3 image-icone-right">
          </div>
          <div class="hidden-md hidden-lg ">
            <div>
              <p class="textpres">
                Ce projet est celui que vous voyez ici, il s’agit d’une interface qui me permet de développer le contenu de mon CV. Nous avions déjà pour objectif de faire un site personnel à l’IUT mais en première année de BTS on nous demande de créer un site en anglais avec un sujet libre, j’ai donc décidé de refaire entièrement mon site car je n’étais pas satisfait de la première version.
              </p>
            </div>
            <div class="flex">
              <img src="img/test/siteBTS.png" width="100%" class="image-icone-left img-bas">
            </div>
          </div>
        </div>
      </a>
  <!--------------------------------------------------------------------------------Notre site en Anglais IUT----------------------------------------------------------------------------------------->
      <a href="" class="noLien">
        <div class="divLien-right">
          <h2><u><center>Site web en Anglais</center></u></h2>
          <div class="media hidden-xs hidden-sm">
            <img src="img/WIP-logo.png" width="25%" class="align-self-center mr-3 image-icone-left">
            <div class="media-body">
              <p class="textpres">
                Ce projet de site web en anglais était un projet de fin de première année à l’IUT Informatique de Lannion, nous avions un sujet, un site de photographe, et nous devions en quelques semaines créer un portail où les personnes intéressées pouvaient voir ce que le photographe proposait avec quelques photos, pour illustrer dans un carrousel. Et avec un peu plus de temps et de connaissance, nous avions pour idées de mettre en place un système de réservation de rendez-vous avec le photographe sur un agenda, une façon de réserver une séance photo en extérieur ou en studio.
              </p>
            </div>
          </div>
          <div class="hidden-md hidden-lg ">
            <div class="flex">
              <img src="img/WIP-logo.png" width="100%" class="image-icone-left img-haut">
            </div>
            <div>
              <p class="textpres">
                Ce projet de site web en anglais était un projet de fin de première année à l’IUT Informatique de Lannion, nous avions un sujet, un site de photographe, et nous devions en quelques semaines créer un portail où les personnes intéressées pouvaient voir ce que le photographe proposait avec quelques photos, pour illustrer dans un carrousel. Et avec un peu plus de temps et de connaissance, nous avions pour idées de mettre en place un système de réservation de rendez-vous avec le photographe sur un agenda, une façon de réserver une séance photo en extérieur ou en studio.
              </p>
            </div>
          </div>
        </div>
      </a>
  <!--------------------------------------------------------------------------------Le traducteur----------------------------------------------------------------------------------------->
      <a href="" class="noLien">
        <div class="divLien-left">
          <h2><u><center>Traducteur UML To Java</center></u></h2>
          <div class="media hidden-xs hidden-sm">
            <div class="media-body">
              <p class="textpres">
                Le principe de ce projet est beaucoup plus simple à expliquer qu’à mettre en place, il s’agit de créer une application où l’utilisateur peut créer un diagramme UML et le logiciel le traduit automatiquement. Le plus difficile a été de mettre en place la traduction, la solution que l’on a trouvé était de traduire le code et de l’afficher dans un onglet différent. Ainsi l’utilisateur peut copier le code et le mettre dans son compilateur.
              </p>
            </div>
            <img src="img/test/1(2).jpg" width="25%" class="align-self-center ml-3 image-icone-right">
          </div>
          <div class="hidden-md hidden-lg ">
            <div class="">
              <p class="textpres">
                Le principe de ce projet est beaucoup plus simple à expliquer qu’à mettre en place, il s’agit de créer une application où l’utilisateur peut créer un diagramme UML et le logiciel le traduit automatiquement. Le plus difficile a été de mettre en place la traduction, la solution que l’on a trouvé était de traduire le code et de l’afficher dans un onglet différent. Ainsi l’utilisateur peut copier le code et le mettre dans son compilateur.
              </p>
            </div>
            <div class="flex">
              <img src="img/test/1(2).jpg" width="100%" class="image-icone-left img-bas">
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

    
<?php require_once 'template/footer.php'; ?>