<?php

function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}

function search(){

    $list = get_terms(array('taxonomy'=>'departements','orderby' => 'name','order' => 'ASC',));
    
    $list2 = get_terms(array('taxonomy'=>'fonctions','orderby' => 'name','order' => 'ASC',));
    ?>
<!--========================================Début du HTML=========================================-->

<!--======================================Liens Bootstrap 4=======================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!--===========================Javascript "Tout cocher - Tout décocher"===========================-->
    <script>
        function checkAll2() {
            var inputs = document.querySelectorAll('.check2');
            for(var i = 0; i < inputs.length; i++) {
                inputs[i].checked = true;
            }
        }

        function uncheckAll2() {
            var inputs = document.querySelectorAll('.check2');
            for(var i = 0; i < inputs.length; i++) {
                inputs[i].checked = false;
            }
        }

        window.onload = function() {
            window.addEventListener('load', checkAll2, false);
        }
    </script>
<!--==============================Titre "Recheche de collaborateurs"==============================-->
    <div class="row text-center">
        <div class="col-12">
            <h1>
                <u>
                    Recherche de collaborateurs
                </u>
            </h1>
        </div>
    </div>
<!--===================================Formulaire de recherche====================================-->
    <form method="get">
                
        <br>

        <div class="row">
        <!--Zone de recherche-->            
            <div class="col-lg-3 col-md-4 col-12">
                <input type="search" name="search" class="list-search mb-2 py-2 border border-dark" value="<?php echo $_GET['search']?>" placeholder="Rechercher... ">
            </div>
        <!--Bouton 'Dropdown' "Départements/Fonctions"-->
            <div class="col-lg-4 col-md-5 col-12 ">
                <label class="dropdown">
                    <div class="list-button btn btn-success btn-lg text-white px-4 py-2 d-inline-block border-dark rounded">
                        Départements / Fonctions 
                        <i class="fa fa-level-down"></i>
                    </div>

                    <input type="checkbox" class="dd-input">

                    <div class="dd-menu bg-info shadow-lg  mt-2 pt-2">
                        <div class="row">
                        <!--DÉPARTEMENTS CHECKBOX-->
                            <div class="col-6.5 offset-1">
                            <!--Titre "Tous les départements"-->
                                <label>
                                    <strong>
                                        Tous les départements
                                    </strong>
                                </label>

                                <br>

                            <!--Les checkboxs des départements-->
                                <?php
                                    foreach ($list as $sec){
                                        echo " <input type='checkbox'  name='departements[]' id='$sec->slug' class='check2'";
                                        
                                        // si slug présent dans les critères ($_GET)
                                        // alors ajouter 'checked'
                                        if (!empty($_GET['departements']) && in_array($sec->slug, $_GET['departements'])){
                                            echo 'checked';
                                        }

                                        echo " value='$sec->slug'>".
                                        " <label for='$sec->slug' class='liste-label-cursor'>$sec->name</label>"."<br>";
                                    }
                                ?>
                            </div>
                        <!--FONCTIONS CHECKBOX-->
                            <div class="col-5.5 offset-1">
                            <!--Titre "Toutes les fonctions"-->
                                <label>
                                    <strong>
                                        Toutes les fonctions
                                    </strong>
                                </label>

                                <br>

                            <!--Les checkboxs des fonctions-->
                                <?php
                                    foreach ($list2 as $sec){
                                        echo " <input type='checkbox'  name='fonctions[]' id='$sec->slug' class='check2'";
                                        
                                        //Si le slug est présent dans les critères ($_GET)
                                        //Alors ajouter 'checked'
                                        if (!empty($_GET['fonctions']) && in_array($sec->slug, $_GET['fonctions'])){
                                            echo 'checked';
                                        }

                                        echo " value='$sec->slug'>".
                                        " <label for='$sec->slug'>$sec->name</label>"."<br>";
                                    }
                                ?>
                            <!--Bouton de "Tout cocher - Tout décocher"-->
                                <div class="list-check my-3">
                                    <input type="button" onclick="checkAll2()" class="btn btn-link mr-3" value="Tout cocher">

                                    <input type="button" onclick="uncheckAll2()" class="btn btn-link ml-3" value="Tout décocher">
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        <!--Bouton de recherche-->
            <div class="col-lg-1 col-md-1 col-12">
                <button type="submit" class="list-submit py-2 px-3 border border-dark rounded" >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <br>

    </form>
<!--========================Ligne contenant "Résultat" et bouton Mail + PDF=======================-->
        <div class="row d-flex justify-content-between">
        <!--"Résultat de la recherche"-->
            <div class="col-12 col-md-4 col-lg-4">
                <h1>
                    <b>
                        <u>
                            Résultat de la recherche
                        </u>
                    </b>
                </h1>
            </div>
        <!--Bouton "Contacter le liste par email-->
            <div class="col-6 col-md-4 col-lg-4">
                <button type="button" class="btn btn-primary text-light border-dark rounded mt-4" id="secondaryButton" onclick="document.getElementById('primaryButton').click()">
                    <i class="fa fa-envelope fa-fw"></i>
                    <b>Contacter la liste par mail</b>
                </button>
            </div>
        <!--Bouton "Exporter la liste en PDF"-->
            <div class="col-6 col-md-4 col-lg-4">
                <a href="javascript: imageToPdf()" class="pdfprnt-button pdfprnt-button-pdf" target="_self">
                    <button type="button" class="btn btn-info text-light border-dark rounded mt-4" >
                        <i class="fa fa-file-pdf-o"></i>
                        <b>Exporter la liste en PDF</b>
                    </button>
                </a>
            </div>
        </div>
<!--====================================Javascript Bootstrap 4====================================-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--===============================Javascript hover "Envoyer un mail"=============================-->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
<!--=========================================Fin du HTML==========================================-->
<?php

    $search = isset($_GET['search']) ? $_GET['search'] : "";
    $metas = ['nom', 'prenom', 'telInterne', 'nPortable', 'nAbrege', 'courriel'];
    // les arguments que nous allons passer au WP_Query
    $arg = array(
        'post_type' => 'collaborateurs',
        'posts_per_page' => -1,
        'tax_query' => array('relation' => 'AND'),
        'meta_query'=>array('relation' => 'OR')
    );
    // les arguments que nous allons ajouter si on choisit un ou plusieurs departements
    if ($search != ""){
        foreach($metas as $meta){
            $arg ['meta_query'] [] = array(
                'key'     => $meta,
                'value'   => $search,
                'compare' => 'LIKE'
            );
        }
    }
    //var_dump($arg);
    if (!empty($_GET['departements'])){
        $terms_id = array();

        foreach ($_GET['departements'] as $dep){ 
            $terms_id [] = term_exists($dep);
        }

        $arg ['tax_query'] [] = array(
            'taxonomy' => 'departements',
            'field'    => 'term_id',
            'terms'    => $terms_id
        );
    }
    // les arguments que nous allons ajouter si on choisit un ou plusieurs fonctions
    if (!empty($_GET['fonctions'])){
        $terms_id = array();

        foreach ($_GET['fonctions'] as $dep){
            $terms_id [] = term_exists($dep);
        }

        $arg ['tax_query'] [] = array(
            'taxonomy' => 'fonctions',
            'field'    => 'term_id',
            'terms'    => $terms_id,
        );
    }

    $list = (new WP_Query($arg))->posts;
    //var_dump($list);
    $out = [];
    foreach($list as $post){
        $departement = get_the_terms($post->ID,'departements');
        //var_dump($departement);
        //$test = $departement[0]->name;
        //var_dump($test);
        $out[$departement[0]->name][] = $post;
    }
    //sort($out);
    $arrayKeys = array_keys($out);
    sort($arrayKeys);
    var_dump($arrayKeys);
    foreach($arrayKeys as $dep){
        $collabo = $out[$dep];
        echo "<h1>$dep</h1>";    
        var_dump($collabo);
        foreach($collabo as $colla){
            echo '<div class="col-11">'.
            '<a href="'.get_permalink($colla->ID).'">'.
                '<h2>'.
                    '<b>'.
                        get_post_meta($colla->ID,"nom",true).' '.
                        get_post_meta($colla->ID,"prenom",true).
                    '</b>'.
                '</h2>'.
            '</a>'.
        '</div>';

        }


    }
    die();
    $x = 0;
    echo '<div class="container-fluid">';
    $emails = [];
    $sendEmail = '';
    $output = '';
    $newOutput = [];
	if ( $list->have_posts() ) {
        $departement_name_prev="";
		while($list->have_posts()){
            $list->the_post();

            $metas = ['nom', 'prenom', 'telInterne', 'nPortable', 'nAbrege', 'courriel'];

            if($search != null){  

                $hasMatch = false;
                // une boucle pour vérifier si nous avons une match avec nos $metas
                foreach($metas as $meta){
                    if ( strpos(get_post_meta(get_the_ID(), $meta, true),$search) !== false ) {
                        $hasMatch = true;
                        break;
                    }
                
                }                
                if( $hasMatch ){
                    // nous prenons chaque email et l'enregistrons afin que nous puissions envoyer un email pour toute la liste
                    $emails [] = get_post_meta(get_the_ID(),"courriel",true);
                    $sendEmail = '<a " href="mailto:';
                    foreach($emails as $email){
                        $sendEmail .=   $email.";"; 
                    }
                    $sendEmail .= '">'. '<input type="hidden" id="primaryButton" onclick="ExistingLogic()">'. '</a>';

                    $departement = get_the_terms(get_the_ID(),'departements');
                    $departement_name = $departement[0]->name;
                    // nous allons vérifier si nous avons un nouveau département
                    if($departement_name != $departement_name_prev){
                        $to_next_departement = true;
                        // s'il y a un seule collabo dans le departement nous allons fermer le row
                        if ($x%2 != 0  ){
                            $output .= "</div>";
                            $x++;
                        }
                    }
                    // si nouveau département nous afficherons le nom de departement et une ligne
                    if($to_next_departement){
                        
                        $output .= '<div class = "single-collabo-title">'.
                                '<h2>'.'<b>'.$departement[0]->name.'</b>'.'</h2>'.
                             '</div>';
                        $to_next_departement = false;
                        $departement_name_prev = $departement_name;
                        
                    }
                    // nous allons créer un row pour avoir deux employeurs l'un à côté de l'autre
                    if ( $x%2 == 0){
                        $output .= '<div class="row">'; 
                    }
                          
                    $output .=        '<div class="col-6 border border-light">'.

                                    '<div class="row text-center">'; 

                    $nomCollabo =       '<div class="col-11">'.
                                            '<a href="'.get_permalink(get_the_ID()).'">'.
                                                '<h2>'.
                                                    '<b>'.
                                                        get_post_meta(get_the_ID(),"nom",true).' '.
                                                        get_post_meta(get_the_ID(),"prenom",true).
                                                    '</b>'.
                                                '</h2>'.
                                            '</a>'.
                                        '</div>';
                        //Nom du collaborateur menant à ses informations
                    $editIfAdmin = '';
                    // si l'user est admin nous afficherons le button Modifier
                    if(current_user_can( 'edit_post', get_the_ID() )){

                        $editIfAdmin = '<h2 data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </h2>';
                    }
                    
                    $modifCollabo =     $nomCollabo.'
                                        <a href="'.get_edit_post_link(get_the_ID()).'">                                           
                                            '.$editIfAdmin.'
                                        </a>
                                        <div class="col-1"></div>';
                    //Bouton menant à la page de modification de l'administrateur

                    $photoCollabo =     '<div class="col-lg-6 col-md-6 mt-3 content-collabo-pic">'.
                                            '<a href="'.get_permalink(get_the_ID()).'">'.
                                                get_the_post_thumbnail(get_the_ID()).
                                            '</a>'.
                                        '</div>';
                        //Photo du collaborateur menant à ses informations

                    $fonctionCollabo =   '<h3>'.
                                            '<b>'.
                                                'Fonctions : '.
                                            '</b>'.
                                            get_the_terms(get_the_ID(), 'fonctions', true)[0]->name.
                                        '</h3>';
                        //Fonction du collaborateur

                    $telIntCollabo =    '<h3>'.
                                            'Tél. interne: '. get_post_meta(get_the_ID(),"telInterne",true).
                                        '</h3>';
                        //Téléphone interne du collaborateurs

                    $mailCollabo =      '<h3 data-toggle="tooltip" data-placement="bottom" title="Envoyer un mail">'.
                                            '<a href=mailto:"'.get_post_meta(get_the_ID(),"courriel",true).'">'.
                                                '<i class="fa fa-envelope fa-fw text-muted">'.'</i>'.
                                                ": ".
                                                get_post_meta(get_the_ID(),'courriel',true).
                                            '</a>'.
                                        '</h3>';
                        //Adresse mail du collaborateur


                    $infosCollabo =     '<div class="col-lg-6 col-md-6">'.     
                                            $fonctionCollabo.

                                            $telIntCollabo.

                                            $mailCollabo.
                                        '</div>';
                        //Fonction + Téléphone interne + Adresse mail du collaborateur


                    $output .=                $modifCollabo.
                                    '</div>'.//Fin de '<div class="row text-center">'

                                    '<div class="row text-center">'.
                                        $photoCollabo.

                                        $infosCollabo.
                                    '</div>'.

                                '</div>';//Fin de '<div class="col-6 border border-light">'
                    // pour fermer le row si on a affiché deux collabo
                    if ($x%2 != 0 ){
                        
                        $output .=  '</div>';
                    }

                    $x++;  
                     
                }
                  
            }else{

                    $emails [] = get_post_meta(get_the_ID(),"courriel",true);
                    // nous prenons chaque email et l'enregistrons afin que nous puissions envoyer un email pour toute la liste
                    $sendEmail = '<a href="mailto:';
                    foreach($emails as $email){
                        $sendEmail .=   $email.';'; 
                    }
                    $sendEmail .= '">'. '<input type="hidden" id="primaryButton" onclick="ExistingLogic()">'. '</a>';

                    $departement = get_the_terms(get_the_ID(),'departements');
                    $departement_name = $departement[0]->name;
                    // nous allons vérifier si nous avons un nouveau département
                    if($departement_name != $departement_name_prev){
                        $to_next_departement = true;
                        // s'il y a un seule collabo dans le departement nous allons fermer le row
                        if ($x%2 != 0  ){
                            $output .= "</div>";
                            $x++;
                        }
                    }
                    // si nouveau département nous afficherons le nom de departement et une ligne
                    if($to_next_departement ){
                        
                        $output .=    '<div class = "single-collabo-title">'.
                                    '<h2>'.'<b>'.$departement[0]->name.'</b>'.'</h2>'.
                                '</div>';
            
                        $to_next_departement = false;
                        $departement_name_prev = $departement_name;
                        
                    }
                    // nous allons créer un row pour avoir deux employeurs l'un à côté de l'autre
                    if ( $x%2 == 0 ){
                        $output .= '<div class="row">';
                    }
                
                    $output .=          '<div class="col-6 border border-light">'.

                                            '<div class="row text-center">'; 

                    $nomCollabo =       '<div class="col-11">'.
                                            '<a href="'.get_permalink(get_the_ID()).'">'.
                                                '<h2>'.
                                                    '<b>'.
                                                        get_post_meta(get_the_ID(),"nom",true).' '.
                                                        get_post_meta(get_the_ID(),"prenom",true).
                                                    '</b>'.
                                                '</h2>'.
                                            '</a>'.
                                        '</div>';
                    //Nom du collaborateur menant à ses informations

                    $editIfAdmin = '';
                    // si l'user est admin nous afficherons le button Modifier
                    if(current_user_can( 'edit_post', get_the_ID() )){

                        $editIfAdmin = '<h2 data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </h2>';
                    }
                    //Si user est admin afficher le bouton pour modifier

                    $modifCollabo =     $nomCollabo.
                                        '<a href="'.get_edit_post_link(get_the_ID()).'">'
                                        .$editIfAdmin.
                                        '</a>'.
                                        '<div class="col-1"></div>';
                    //Bouton menant à la page de modification de l'administrateur

                    $photoCollabo =     '<div class="col-lg-5 col-md-5 mt-3 content-collabo-pic">'.
                                            '<a href="'.get_permalink(get_the_ID()).'">'.
                                                get_the_post_thumbnail(get_the_ID()).
                                            '</a>'.
                                        '</div>';
                    //Photo du collaborateur menant à ses informations

                    $fonctionCollabo =  '<h3>'.
                                            '<b>'.
                                                'Fonctions : '.
                                            '</b>'.
                                            get_the_terms(get_the_ID(), 'fonctions', true)[0]->name.
                                        '</h3>';
                    //Fonction du collaborateur

                    $telIntCollabo =    '<h3>'.
                                            '<b>'.
                                                'Tél. interne: '.
                                            '</b>'.
                                            get_post_meta(get_the_ID(),"telInterne",true).
                                        '</h3>';
                    //Téléphone interne du collaborateur

                    $mailCollabo =      '<h3 data-toggle="tooltip" data-placement="bottom" title="Envoyer un mail">'.
                                            '<a href=mailto:"'.get_post_meta(get_the_ID(),"courriel",true).'">'.
                                                '<i class="fa fa-envelope fa-fw text-muted">'.'</i>'.
                                                ": ".
                                                get_post_meta(get_the_ID(),'courriel',true).
                                            '</a>'.
                                        '</h3>';
                    //Adresse mail du collaborateur

                    $infosCollabo =     '<div class="col-lg-7 col-md-7 mt-4">'.     
                                            $fonctionCollabo.

                                            $telIntCollabo.
                                        '</div>';
                    //Fonction + Téléphone interne du collaborateur

                    $output .=                  $modifCollabo.
                                            '</div>'.//Fin de '<div class="row text-center">'

                                            '<div class="row text-center">'.
                                                $photoCollabo.

                                                $infosCollabo.
                                            '</div>'.

                                            '<div class="row text-center">'.
                                                '<div class="col-12">'.
                                                    $mailCollabo.
                                                '</div>'.
                                            '</div>'.

                                        '</div>';//Fin de '<div class="col-6 border border-light">'

                    // pour fermer le row si on a affiché deux collabo
                    if ($x%2 != 0  ){
                        $output .=  '</div>';
                    }  
                    $x++;
                } 
        }
        $output .= $sendEmail;
        $output .= '</div>';
    }
    // pour trier les departements par ordre alphabétique
    // nous explosons le output pour séparer les différents departements
    $outputExploded = explode('<div class = "single-collabo-title">', $output);
    // on cherche le nom du tous les departements
    for($x=0; $x < count($outputExploded);$x++){
        $depNames[$x] = getBetween($outputExploded[$x],'<h2><b>','</b></h2>');
        // s'il n'y a pas un nom on l'enlève du tableau
        if(empty($depNames[$x]) ){
            array_splice($depNames,$x,1);
        }

    }
    // trier les noms des departements
    sort($depNames);
    // nous prenons les noms triés et prenons les pièces que nous avons explosées et les comparons pour trouver le même, et maintenant nous trions les pièces
    foreach($depNames as $name){

        for($x=0; $x < count($outputExploded);$x++){
            $depNames2[$x] = getBetween($outputExploded[$x],'<h2><b>','</b></h2>');
            if ($name == $depNames2[$x]){
                $newOutput [$x] = $outputExploded[$x];
            }
        }

    }
    // nous implosons à nouveau les parties ensemble
    $output = implode('<div class = "single-collabo-title">', $newOutput);

    return $output;
    wp_reset_postdata();
}

add_shortcode('search', 'search');

