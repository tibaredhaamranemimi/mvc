<SCRIPT LANGUAGE="JavaScript">
function PopupImage(img) {
	w=open("",'image','weigth=toolbar=no,scrollbars=no,resizable=yes, width=220, height=268');	
	w.document.write("<HTML><BODY onblur=\"window.close();\"><IMG src='"+img+"'>");
	w.document.write("</BODY></HTML>");
	w.document.close();
}
</script>
<?php


  
verifsession();	
lang(Session::get('lang'));
ob_start();
$data = array(
"DATE"       => '00-00-0000', 
"btn"        => 'inspection', 
"id"         => '', 
"butun"      => 'Inser New Structure', 
"photos"     => 'public/images/photos/msp.jpg',
"action"     => 'inspection/createstructure/',

"NATURE"  => array(      
                        "PUBLIC"=>"1",
					    "PRIVEE"=>"2"	   
					  ),					  
"SEXE"  => array(      
                       "Masculin"=>"M",
					   "Feminin"=>"F"					   			   
					  ),					  
"NOM"  => 'x' ,
"NOMAR"  => 'x' ,
"PRENOM"  => 'x' ,
"PRENOMAR"  => 'x' ,						  
"AGE"  => '0' ,
"WILAYAN1"  => '17000' ,
"WILAYAN2"  => 'DJELFA',
"COMMUNEN1" => '924' ,
"COMMUNEN2" => 'Ain-oussera',
"ADRESSE"  => 'x',
"ADRESSEAR"  => 'x',
"Mobile"    => '(00) 00-00-00-00',
"Fixe"      => '(000) 00-00-00',
"Email"    => 'Email',

"REALISATION"  => '00-00-0000',
"NREALISATION" => '0',
"OUVERTURE"    => '00-00-0000',
"NOUVERTURE"   => '0',

"PROPRIETAIRE"  => 'x',
"DEBUTCONTRAT"  => '00-00-0000',
"FINCONTRAT"    => '00-00-0000'

);
view::button($data['btn'],'');
echo "<h2>Structure Sanitaire</h2 ><hr /><br />";
$this->f0(URL.$data['action'],'post');
View::photosurl(1170,230,URL.$data['photos']);
$x=50;$y=10;

$this->label($x,$y+250,'Date');              $this->txts($x+100,$y+240,'DATE',0,$data['DATE'],'dateus');  
$this->label($x+350,$y+250,'Type');          $this->combostructure($x+450,$y+240,'STRUCTURE','structurebis','1','structure','class','id','structure');////$this->combov1($x+450,$y+240,'STRUCTURE',$data['STRUCTURE']);
$this->label($x+700,$y+250,'Nature');        $this->combov1($x+800,$y+240,'NATURE',$data['NATURE']);
$this->label($x,$y+280,'Nom');               $this->txt($x+100,$y+270,'NOM',0,$data['NOM'],'date');
$this->label($x+350,$y+280,'Prenom');        $this->txt($x+450,$y+270,'PRENOM',0,$data['PRENOM'],'date');
$this->label($x+700,$y+280,'Sexe');          $this->combov1($x+800,$y+270,'SEXE',$data['SEXE']);
$this->label($x,$y+310,'Wilaya');            $this->WILAYA($x+100,$y+300,'WILAYA','country','mvc','wil',$data['WILAYAN1'],$data['WILAYAN2']);
$this->label($x+350,$y+310,'Commune');       $this->COMMUNE($x+100+350,$y+300,'COMMUNE','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
$this->label($x+700,$y+310,'Adresse');       $this->txt($x+100+350+350,$y+300,'ADRESSE',0,$data['ADRESSE'],'date');

$this->label($x,$y+340,'Mobile');            $this->txts($x+100,$y+330,'Mobile',0,$data['Mobile'],'port');
$this->label($x+350,$y+340,'Fixe');          $this->txts($x+450,$y+330,'Fixe',0,$data['Fixe'],'phone');
$this->label($x+700,$y+340,'E-mail');        $this->txt($x+100+350+350,$y+330,'Email',0,$data['Email'],'date');

$x=50;$y=40;
$this->label($x,$y+370,'__________________________________________________________________________________________________________________');
$this->label($x,$y+400,'Propriétaire');           $this->txt($x+100,$y+390,'PROPRIETAIRE',0,$data['PROPRIETAIRE'],'date');
$this->label($x+350,$y+400,'Début contrat');      $this->txts($x+450,$y+390,'DEBUTCONTRAT',0,$data['DEBUTCONTRAT'],'dateus1');
$this->label($x+700,$y+400,'Fin contrat');        $this->txts($x+100+350+350,$y+390,'FINCONTRAT',0,$data['FINCONTRAT'],'dateus2');
$x=50;$y=40;
$this->label($x,$y+420,'__________________________________________________________________________________________________________________');
$this->label($x,$y+430+20,'Realisation');           $this->txts($x+100,$y+390+30+20,'REALISATION',0,$data['REALISATION'],'dateus3');
$this->label($x+350,$y+430+20,'N° Realisation');    $this->txt($x+450,$y+390+30+20,'NREALISATION',0,$data['NREALISATION'],'date');
$this->label($x,$y+460+30,'Ouverture');             $this->txts($x+100,$y+390+60+30,'OUVERTURE',0,$data['OUVERTURE'],'dateus4');
$this->label($x+350,$y+460+30,'N° Ouverture');      $this->txt($x+450,$y+390+60+30,'NOUVERTURE',0,$data['NOUVERTURE'],'date');
$x=50;$y=50;
$this->label($x,$y+470+30,'__________________________________________________________________________________________________________________');
$this->label($x+990,$y+500+30,'اللقب');            $this->txtar($x+690,$y+490+30,'NOMAR',0,$data['NOMAR'],'date');
$this->label($x+625,$y+500+30,'الاســـــــم');      $this->txtar($x+340,$y+490+30,'PRENOMAR',0,$data['PRENOMAR'],'date');
$this->label($x+290,$y+500+30,'العنوان');          $this->txtar($x,$y+490+30,'ADRESSEAR',0,$data['ADRESSEAR'],'date');
$x=50;$y=60;
$this->submit($x+800,$y+430+30,$data['butun']);
$this->f1();
view::sautligne(19);
ob_end_flush();

?>
<?php
// view::sautligne(5);
// $mois = mktime( 0, 0, 0, $m=date('m'), 1, $y=$m=date('Y') ); 
// echo "Le mois de ".date("F Y",$mois)." possède ".date("t",$mois)." jours";
// $nbr=date("t",$mois);
// echo '</Br>';
// for ($i = 1; $i <= $nbr; $i++) { 
	// echo $i;
	// echo '</Br>';
// }

?>