	<? include "header.php" ?>


    <div id="valor" class="section">
        <div class="sectionBody">
            <?=$razoes['valor']?>
        </div>
        <i class="fa fa-envelope-o abc-text-teal abc-xlarge"></i>&nbsp;&nbsp;<a href="mailto:recrutamento@abclegal.com.pt">recrutamento@abclegal.com.pt</a>
    </div>


    <div id="reasons" class="section">
        <span class="sectionTitle"><?=$lang=='pt'?'Porquê escolher a ABC LEGAL?':'Why choose ABC LEGAL'?></span>
        <div class="sectionBody">
            <?=$razoes['razoes']?>
        </div>
    </div>


    <div id="testemunhos" class="section">
        <span class="sectionTitle"><?=$lang=='pt'?'Testemunhos':'Testimonials'?></span>
        <div class="sectionBody">


            <?
            $db = $data['db'];
            $sth = $db->prepare('SELECT id,name,description,caption FROM testemunhos');
            $sth->execute(array());
            $testemunhos = $sth->fetchAll();

            $first = true;
            foreach($testemunhos as $value){
?>

                <div class="personCard">
                    <div class="personPicture" style="background-image: url('/image/testemunhos/<?=$value['id']?>')"></div>
                    <div class="sectionTitle"><?=utf8_decode($value['name'])?></div>
                    <div class="sectionBody"><?=utf8_decode($value['description'])?></div>
                    <span class="sectionLink"><a href="/testemunhos/<?=$value['id']?>"><?=$lang=='pt'?'Ver mais':'Read more'?> </a></span>
                </div>

            <?}?>



        </div>
    </div>




    <!-- Testemunhos -->
	<? include "footer.php" ?>